<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(StoreContactMessageRequest $request)
    {
        $data = $request->validated();

        ContactMessage::query()->create($data);

        $mailBody = "New website contact message\n\n"
            ."Name: {$data['name']}\n"
            ."Email: {$data['email']}\n"
            ."Phone: {$data['phone']}\n"
            ."Subject: {$data['subject']}\n\n"
            ."Message:\n{$data['message']}";

        try {
            Mail::raw($mailBody, function ($message): void {
                $message->to(config('regal.email'))
                    ->subject('New contact form submission - Regal Website');
            });
        } catch (\Throwable) {
            // Failing mail delivery should not block form submission.
        }

        return redirect()->route('contact')->with('success', __('site.contact_success'));
    }
}
