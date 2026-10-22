@extends('layouts.admin')

@section('title', 'داشبورد')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
        <h1 class="vira-admin-page-title mb-0">داشبورد</h1>
        <a class="vira-home-btn vira-home-btn-gold" href="{{ route('admin.consultation-requests.index') }}">همه درخواست‌ها</a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-6 col-lg-3">
            <div class="vira-admin-stat">
                <span class="vira-admin-stat-label">کل درخواست‌ها</span>
                <strong class="vira-admin-stat-value">{{ $counts['total'] }}</strong>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="vira-admin-stat">
                <span class="vira-admin-stat-label">جدید</span>
                <strong class="vira-admin-stat-value">{{ $counts['new'] }}</strong>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="vira-admin-stat">
                <span class="vira-admin-stat-label">در حال پیگیری</span>
                <strong class="vira-admin-stat-value">{{ $counts['in_progress'] }}</strong>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="vira-admin-stat">
                <span class="vira-admin-stat-label">تکمیل‌شده</span>
                <strong class="vira-admin-stat-value">{{ $counts['completed'] }}</strong>
            </div>
        </div>
    </div>

    <div class="vira-admin-panel">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h2 class="h5 mb-0">درخواست‌های اخیر</h2>
        </div>

        @if ($recentRequests->isEmpty())
            <p class="vira-admin-muted mb-0">هنوز درخواستی ثبت نشده است.</p>
        @else
            <div class="table-responsive">
                <table class="table vira-admin-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>نام</th>
                            <th>موبایل</th>
                            <th>خدمت</th>
                            <th>وضعیت</th>
                            <th>تاریخ</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentRequests as $item)
                            <tr>
                                <td>{{ $item->full_name }}</td>
                                <td dir="ltr" class="text-start">{{ $item->phone }}</td>
                                <td>{{ $item->serviceTypeLabel() }}</td>
                                <td><span class="vira-admin-badge vira-admin-badge-{{ $item->status }}">{{ $item->statusLabel() }}</span></td>
                                <td>{{ $item->created_at?->timezone(config('app.timezone'))->format('Y/m/d H:i') }}</td>
                                <td><a href="{{ route('admin.consultation-requests.show', $item) }}">مشاهده</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
