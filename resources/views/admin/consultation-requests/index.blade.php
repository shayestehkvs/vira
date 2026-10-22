@extends('layouts.admin')

@section('title', 'مدیریت درخواست‌ها')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
        <h1 class="vira-admin-page-title mb-0">درخواست‌های مشاوره</h1>
    </div>

    <form method="get" class="vira-admin-panel mb-4">
        <div class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label" for="q">جست‌وجو</label>
                <input type="text" class="form-control" id="q" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="نام، موبایل یا شرکت">
            </div>
            <div class="col-md-3">
                <label class="form-label" for="status">وضعیت</label>
                <select class="form-select" id="status" name="status">
                    <option value="">همه</option>
                    @foreach ($statuses as $value => $label)
                        <option value="{{ $value }}" @selected(($filters['status'] ?? '') === $value)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="from">از تاریخ</label>
                <input type="date" class="form-control" id="from" name="from" value="{{ $filters['from'] ?? '' }}">
            </div>
            <div class="col-md-2">
                <label class="form-label" for="to">تا تاریخ</label>
                <input type="date" class="form-control" id="to" name="to" value="{{ $filters['to'] ?? '' }}">
            </div>
            <div class="col-md-1">
                <button type="submit" class="vira-home-btn vira-home-btn-gold w-100">اعمال</button>
            </div>
        </div>
    </form>

    <div class="vira-admin-panel">
        @if ($requests->isEmpty())
            <p class="vira-admin-muted mb-0">درخواستی با این فیلترها یافت نشد.</p>
        @else
            <div class="table-responsive">
                <table class="table vira-admin-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام</th>
                            <th>موبایل</th>
                            <th>شرکت</th>
                            <th>خدمت</th>
                            <th>وضعیت</th>
                            <th>تاریخ ثبت</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->full_name }}</td>
                                <td dir="ltr" class="text-start">{{ $item->phone }}</td>
                                <td>{{ $item->company_name ?: '—' }}</td>
                                <td>{{ $item->serviceTypeLabel() }}</td>
                                <td><span class="vira-admin-badge vira-admin-badge-{{ $item->status }}">{{ $item->statusLabel() }}</span></td>
                                <td>{{ $item->created_at?->timezone(config('app.timezone'))->format('Y/m/d H:i') }}</td>
                                <td><a href="{{ route('admin.consultation-requests.show', $item) }}">جزئیات</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $requests->links() }}
            </div>
        @endif
    </div>
@endsection
