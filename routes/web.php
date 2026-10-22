<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\ConsultationRequestController as AdminConsultationRequestController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ConsultationRequestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/', function () {
    if (! session()->has('consultation_form_token')) {
        session()->put('consultation_form_token', Str::random(40));
    }

    return view('home');
})->name('home');

Route::post('/consultation-requests', [ConsultationRequestController::class, 'store'])
    ->middleware('throttle:consultation')
    ->name('consultation-requests.store');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'create'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'store'])
            ->middleware('throttle:admin-login')
            ->name('login.store');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'destroy'])->name('logout');

        Route::get('/consultation-requests', [AdminConsultationRequestController::class, 'index'])
            ->name('consultation-requests.index');
        Route::get('/consultation-requests/{consultationRequest}', [AdminConsultationRequestController::class, 'show'])
            ->name('consultation-requests.show');
        Route::put('/consultation-requests/{consultationRequest}', [AdminConsultationRequestController::class, 'update'])
            ->name('consultation-requests.update');
    });
});
