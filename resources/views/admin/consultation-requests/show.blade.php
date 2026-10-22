@extends('layouts.admin')

@section('title', 'جزئیات درخواست')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
        <h1 class="vira-admin-page-title mb-0">درخواست #{{ $consultationRequest->id }}</h1>
        <a class="vira-home-btn vira-home-btn-outline" href="{{ route('admin.consultation-requests.index') }}">بازگشت به فهرست</a>
    </div>

    <div class="row g-4">
        <div class="col-lg-7">
            <div class="vira-admin-panel">
                <h2 class="h5 mb-3">اطلاعات درخواست</h2>
                <dl class="vira-admin-dl mb-0">
                    <div><dt>نام و نام خانوادگی</dt><dd>{{ $consultationRequest->full_name }}</dd></div>
                    <div><dt>شماره موبایل</dt><dd dir="ltr" class="text-start">{{ $consultationRequest->phone }}</dd></div>
                    <div><dt>شرکت / برند</dt><dd>{{ $consultationRequest->company_name ?: '—' }}</dd></div>
                    <div><dt>نوع خدمت</dt><dd>{{ $consultationRequest->serviceTypeLabel() }}</dd></div>
                    <div><dt>محدوده / مناطق</dt><dd>{{ $consultationRequest->target_area ?: '—' }}</dd></div>
                    <div><dt>مدت کمپین</dt><dd>{{ $consultationRequest->campaign_duration ?: '—' }}</dd></div>
                    <div><dt>توضیحات</dt><dd>{{ $consultationRequest->message ?: '—' }}</dd></div>
                    <div><dt>تاریخ ثبت</dt><dd>{{ $consultationRequest->created_at?->timezone(config('app.timezone'))->format('Y/m/d H:i') }}</dd></div>
                    <div><dt>وضعیت فعلی</dt><dd><span class="vira-admin-badge vira-admin-badge-{{ $consultationRequest->status }}">{{ $consultationRequest->statusLabel() }}</span></dd></div>
                </dl>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="vira-admin-panel">
                <h2 class="h5 mb-3">پیگیری داخلی</h2>
                <form method="post" action="{{ route('admin.consultation-requests.update', $consultationRequest) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="status">وضعیت</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            @foreach ($statuses as $value => $label)
                                <option value="{{ $value }}" @selected(old('status', $consultationRequest->status) === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="admin_notes">یادداشت مدیر (فقط داخلی)</label>
                        <textarea
                            class="form-control @error('admin_notes') is-invalid @enderror"
                            id="admin_notes"
                            name="admin_notes"
                            rows="8"
                            maxlength="5000"
                        >{{ old('admin_notes', $consultationRequest->admin_notes) }}</textarea>
                        @error('admin_notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="vira-home-btn vira-home-btn-gold">ذخیره تغییرات</button>
                </form>
            </div>
        </div>
    </div>
@endsection
