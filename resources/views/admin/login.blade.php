@extends('layouts.admin')

@section('title', 'ورود مدیر')

@section('content')
    <div class="vira-admin-login-wrap">
        <div class="vira-admin-login-card">
            <h1 class="vira-admin-page-title mb-2">ورود به پنل ویرا</h1>
            <p class="vira-admin-muted mb-4">فقط حساب مدیر احراز هویت‌شده به این بخش دسترسی دارد.</p>

            <form method="post" action="{{ route('admin.login.store') }}" novalidate>
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="email">ایمیل</label>
                    <input
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="username"
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label" for="password">رمز عبور</label>
                    <input
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        id="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="vira-home-btn vira-home-btn-gold w-100">ورود</button>
            </form>
        </div>
    </div>
@endsection
