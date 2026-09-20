<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreJobApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email', 'max:150'],
            'position' => ['required', 'string', 'max:150'],
            'address' => ['required', 'string', 'max:255'],
            'has_sales_experience' => ['required', 'in:yes,no'],
            'years_experience' => ['nullable', 'string', 'max:50', 'required_if:has_sales_experience,yes'],
            'software_experience' => ['nullable', 'string', 'max:255'],
            'work_type' => ['required', 'in:full_time,part_time'],
            'work_from_home' => ['required', 'in:yes,no'],
            'home_address' => ['nullable', 'string', 'max:255', 'required_if:work_from_home,yes'],
            'commission_based' => ['required', 'in:yes,no'],
            'expected_salary' => ['nullable', 'string', 'max:50', 'required_if:commission_based,no'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }
}
