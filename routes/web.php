<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account\AccountBaseController;
use App\Http\Controllers\Account\AuthenticationController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;

Route::get('/', [AccountBaseController::class, 'index'])->name('login');
Route::get('/apps-info', [AccountBaseController::class, 'information']);

Route::prefix('asset')->group(function () {
    Route::get('{slug}', [AccountBaseController::class, 'asset']);
});

Route::prefix('account')->group(function () {
    // Authentication
    Route::middleware('guest:web')->group(function () {
        // Authentication
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('throttle:login');
        Route::post('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'store'])->middleware('throttle:two-factor');
    });

    // Mail Checker
    Route::post('email-check', [AuthenticationController::class, 'validateEmailAddress']);
});
