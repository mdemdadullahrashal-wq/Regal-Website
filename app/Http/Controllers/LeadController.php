<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        // Honeypot: bots fill this hidden field; humans never see it.
        if (! empty($request->input('website'))) {
            // Pretend success so bots don't learn the trap.
            return redirect()->back()->with('success', __('site.lead_success'));
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:150'],
            'product_id' => ['nullable', 'integer', 'exists:products,id'],
            'message' => ['nullable', 'string', 'max:2000'],
        ], [], [
            'name' => __('site.name'),
            'phone' => __('site.phone'),
            'email' => __('site.email'),
            'product_id' => __('site.product'),
            'message' => __('site.message'),
        ]);

        // Optional reCAPTCHA (env-driven).
        if (config('regal.recaptcha_enabled') && config('regal.recaptcha_secret_key')) {
            $this->verifyRecaptcha($request);
        }

        $lead = Lead::query()->create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'product_id' => $validated['product_id'] ?? null,
            'source' => 'website',
            'message' => $validated['message'] ?? null,
            'status' => 'new',
        ]);

        $product = isset($validated['product_id'])
            ? Product::query()->find($validated['product_id'])
            : null;

        // 1. Push to CRM (optional, env-driven).
        $this->pushToCrm($lead, $product);

        // 2. SMS auto-reply to the lead (optional, env-driven).
        $this->sendSmsAutoReply($lead, $product);

        // 3. Notify Rasel (optional, env-driven).
        $this->notifyOwner($lead, $product);

        return redirect()->back()->with('success', __('site.lead_success'));
    }

    private function verifyRecaptcha(Request $request): void
    {
        $token = $request->input('g-recaptcha-response');
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('regal.recaptcha_secret_key'),
            'response' => $token,
            'remoteip' => $request->ip(),
        ]);

        $success = $response->successful() && $response->json('success') === true;

        abort_unless($success, 422, __('site.lead_recaptcha_failed'));
    }

    private function pushToCrm(Lead $lead, ?Product $product): void
    {
        $url = config('regal.crm_leads_api_url');
        if (! $url) {
            Log::info('CRM lead push skipped — CRM_LEADS_API_URL not configured.', [
                'lead_id' => $lead->id,
            ]);

            return;
        }

        try {
            $response = Http::withToken((string) config('regal.crm_leads_api_token', ''))
                ->timeout(10)
                ->acceptJson()
                ->post($url, [
                    'name' => $lead->name,
                    'phone' => $lead->phone,
                    'email' => $lead->email,
                    'product' => $product?->slug,
                    'source' => $lead->source,
                    'message' => $lead->message,
                ]);

            Log::info('CRM lead push completed.', [
                'lead_id' => $lead->id,
                'status' => $response->status(),
            ]);
        } catch (\Throwable $e) {
            Log::error('CRM lead push failed.', [
                'lead_id' => $lead->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    private function sendSmsAutoReply(Lead $lead, ?Product $product): void
    {
        $apiKey = config('regal.bulksmsbd_api_key');
        $baseUrl = config('regal.bulksmsbd_base_url');

        if (! $apiKey || ! $baseUrl) {
            Log::info('SMS auto-reply skipped — BULKSMSBD_API_KEY/BASE_URL not configured. Placeholder only.', [
                'lead_id' => $lead->id,
                'to' => $lead->phone,
                'message' => __('site.lead_sms_reply'),
            ]);

            return;
        }

        try {
            $response = Http::timeout(10)->post($baseUrl, [
                'api_key' => $apiKey,
                'senderid' => config('regal.bulksmsbd_sender_id', 'RegalSol'),
                'number' => $lead->phone,
                'message' => __('site.lead_sms_reply'),
            ]);

            Log::info('SMS auto-reply sent.', [
                'lead_id' => $lead->id,
                'status' => $response->status(),
            ]);
        } catch (\Throwable $e) {
            Log::error('SMS auto-reply failed.', [
                'lead_id' => $lead->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    private function notifyOwner(Lead $lead, ?Product $product): void
    {
        // Placeholder: real SMS/email channel wiring is env-driven and not yet configured.
        $notifyPhone = config('regal.notify_phone');

        if (! $notifyPhone) {
            Log::info('Owner notification skipped — NOTIFY_PHONE not configured.', [
                'lead_id' => $lead->id,
            ]);

            return;
        }

        Log::info('Owner notification placeholder.', [
            'lead_id' => $lead->id,
            'to' => $notifyPhone,
            'name' => $lead->name,
            'phone' => $lead->phone,
            'product' => $product?->slug,
        ]);
    }
}
