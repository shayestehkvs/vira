<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>@yield('title', 'پنل مدیریت') | ویرا</title>
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link href="https://fonts.bunny.net/css?family=vazirmatn:400,500,600,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="vira-admin-body">
    @auth
        <header class="vira-admin-topbar">
            <div class="container-fluid px-3 px-lg-4">
                <div class="d-flex align-items-center justify-content-between gap-3 py-3">
                    <div class="d-flex align-items-center gap-3">
                        <a class="vira-admin-brand" href="{{ route('admin.dashboard') }}">Vira <span>مدیریت</span></a>
                        <nav class="d-none d-md-flex gap-3">
                            <a class="vira-admin-nav-link" href="{{ route('admin.dashboard') }}">داشبورد</a>
                            <a class="vira-admin-nav-link" href="{{ route('admin.consultation-requests.index') }}">درخواست‌ها</a>
                        </nav>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="vira-admin-user d-none d-sm-inline">{{ auth()->user()->name }}</span>
                        <form method="post" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="vira-home-btn vira-home-btn-outline vira-admin-logout-btn">خروج</button>
                        </form>
                    </div>
                </div>
                <nav class="d-flex d-md-none gap-3 pb-3">
                    <a class="vira-admin-nav-link" href="{{ route('admin.dashboard') }}">داشبورد</a>
                    <a class="vira-admin-nav-link" href="{{ route('admin.consultation-requests.index') }}">درخواست‌ها</a>
                </nav>
            </div>
        </header>
    @endauth

    <main class="vira-admin-main">
        <div class="container-fluid px-3 px-lg-4 py-4">
            @if (session('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif
            @yield('content')
        </div>
    </main>
</body>
</html>
