<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConsultationRequest;
use App\Models\ConsultationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ConsultationRequestController extends Controller
{
    public function store(StoreConsultationRequest $request): RedirectResponse
    {
        $sessionToken = (string) $request->session()->get('consultation_form_token', '');
        $submittedToken = (string) $request->validated('form_token');

        if ($sessionToken === '' || ! hash_equals($sessionToken, $submittedToken)) {
            return redirect()
                ->to(route('home').'#consultation')
                ->withInput($request->safe()->except(['form_token']))
                ->withErrors(['form_token' => 'ارسال فرم منقضی یا تکراری است. لطفاً دوباره ارسال کنید.']);
        }

        $phone = $request->validated('phone');

        $recentDuplicate = ConsultationRequest::query()
            ->where('phone', $phone)
            ->where('created_at', '>=', now()->subMinute())
            ->exists();

        if ($recentDuplicate) {
            return redirect()
                ->to(route('home').'#consultation')
                ->withInput($request->safe()->except(['form_token']))
                ->withErrors(['phone' => 'درخواست مشابهی به‌تازگی ثبت شده است. لطفاً کمی بعد دوباره تلاش کنید.']);
        }

        DB::transaction(function () use ($request): void {
            ConsultationRequest::query()->create([
                'full_name' => $request->validated('full_name'),
                'phone' => $request->validated('phone'),
                'company_name' => $request->validated('company_name'),
                'service_type' => $request->validated('service_type'),
                'target_area' => $request->validated('target_area'),
                'campaign_duration' => $request->validated('campaign_duration'),
                'message' => $request->validated('message'),
            ]);
        });

        $request->session()->forget('consultation_form_token');
        $request->session()->put('consultation_form_token', Str::random(40));

        return redirect()
            ->to(route('home').'#consultation')
            ->with('consultation_success', 'درخواست مشاوره شما با موفقیت ثبت شد. به‌زودی با شما تماس می‌گیریم.');
    }
}
