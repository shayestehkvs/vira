@php
    use App\Models\ConsultationRequest;
@endphp

<section class="vira-home-section vira-home-consultation" id="consultation" aria-labelledby="consultation-title">
    <div class="container">
        <div class="vira-home-section-head text-center mx-auto" style="max-width: 40rem;">
            <h2 class="vira-home-section-title" id="consultation-title">درخواست مشاوره</h2>
            <p class="vira-home-section-lead mx-auto">
                فرم را تکمیل کنید تا برای برنامه‌ریزی کمپین تبلیغات متحرک با شما هماهنگ شویم.
            </p>
        </div>

        <div class="vira-home-consultation-panel mx-auto">
            @if (session('consultation_success'))
                <div class="alert alert-success vira-home-alert" role="alert">
                    {{ session('consultation_success') }}
                </div>
            @endif

            @if ($errors->has('form_token'))
                <div class="alert alert-danger vira-home-alert" role="alert">
                    {{ $errors->first('form_token') }}
                </div>
            @endif

            <form method="post" action="{{ route('consultation-requests.store') }}" novalidate>
                @csrf
                <input type="hidden" name="form_token" value="{{ session('consultation_form_token') }}">

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="full_name">نام و نام خانوادگی <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            class="form-control @error('full_name') is-invalid @enderror"
                            id="full_name"
                            name="full_name"
                            value="{{ old('full_name') }}"
                            maxlength="120"
                            required
                            autocomplete="name"
                        >
                        @error('full_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="phone">شماره موبایل <span class="text-danger">*</span></label>
                        <input
                            type="tel"
                            class="form-control @error('phone') is-invalid @enderror"
                            id="phone"
                            name="phone"
                            value="{{ old('phone') }}"
                            maxlength="20"
                            inputmode="numeric"
                            placeholder="09123456789"
                            required
                            autocomplete="tel"
                        >
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="company_name">نام شرکت یا برند</label>
                        <input
                            type="text"
                            class="form-control @error('company_name') is-invalid @enderror"
                            id="company_name"
                            name="company_name"
                            value="{{ old('company_name') }}"
                            maxlength="160"
                        >
                        @error('company_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="service_type">نوع خدمات موردنظر <span class="text-danger">*</span></label>
                        <select
                            class="form-select @error('service_type') is-invalid @enderror"
                            id="service_type"
                            name="service_type"
                            required
                        >
                            <option value="" disabled @selected(old('service_type') === null)>انتخاب کنید</option>
                            @foreach (ConsultationRequest::serviceTypes() as $value => $label)
                                <option value="{{ $value }}" @selected(old('service_type') === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('service_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="target_area">محدوده یا مناطق موردنظر در تهران</label>
                        <input
                            type="text"
                            class="form-control @error('target_area') is-invalid @enderror"
                            id="target_area"
                            name="target_area"
                            value="{{ old('target_area') }}"
                            maxlength="255"
                            placeholder="مثلاً مناطق مرکزی تهران"
                        >
                        @error('target_area')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="campaign_duration">زمان یا مدت کمپین</label>
                        <input
                            type="text"
                            class="form-control @error('campaign_duration') is-invalid @enderror"
                            id="campaign_duration"
                            name="campaign_duration"
                            value="{{ old('campaign_duration') }}"
                            maxlength="120"
                            placeholder="مثلاً یک هفته"
                        >
                        @error('campaign_duration')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label" for="message">توضیحات</label>
                        <textarea
                            class="form-control @error('message') is-invalid @enderror"
                            id="message"
                            name="message"
                            rows="4"
                            maxlength="2000"
                        >{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 text-center pt-2">
                        <button type="submit" class="vira-home-btn vira-home-btn-gold">ثبت درخواست مشاوره</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
