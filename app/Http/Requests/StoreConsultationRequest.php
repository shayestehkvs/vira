<?php

namespace App\Http\Requests;

use App\Models\ConsultationRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreConsultationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:20', 'regex:/^09\d{9}$/'],
            'company_name' => ['nullable', 'string', 'max:160'],
            'service_type' => ['required', 'string', Rule::in(array_keys(ConsultationRequest::serviceTypes()))],
            'target_area' => ['nullable', 'string', 'max:255'],
            'campaign_duration' => ['nullable', 'string', 'max:120'],
            'message' => ['nullable', 'string', 'max:2000'],
            'form_token' => ['required', 'string'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'full_name' => 'نام و نام خانوادگی',
            'phone' => 'شماره موبایل',
            'company_name' => 'نام شرکت یا برند',
            'service_type' => 'نوع خدمات',
            'target_area' => 'محدوده یا مناطق',
            'campaign_duration' => 'زمان یا مدت کمپین',
            'message' => 'توضیحات',
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'phone.regex' => 'شماره موبایل باید ۱۱ رقم و با ۰۹ شروع شود.',
            'form_token.required' => 'ارسال فرم نامعتبر است. لطفاً دوباره تلاش کنید.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $phone = str_replace([' ', '-', '_'], '', (string) $this->input('phone', ''));

        $this->merge([
            'full_name' => trim((string) $this->input('full_name', '')),
            'phone' => $phone,
            'company_name' => $this->filled('company_name') ? trim((string) $this->input('company_name')) : null,
            'target_area' => $this->filled('target_area') ? trim((string) $this->input('target_area')) : null,
            'campaign_duration' => $this->filled('campaign_duration') ? trim((string) $this->input('campaign_duration')) : null,
            'message' => $this->filled('message') ? trim((string) $this->input('message')) : null,
        ]);
    }

    protected function getRedirectUrl(): string
    {
        return route('home').'#consultation';
    }
}
