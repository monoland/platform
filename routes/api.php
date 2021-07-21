<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyAccount\ProfileController;
use App\Http\Controllers\Account\AccountBaseController;
use Laravel\Fortify\Http\Controllers\PasswordController;
use App\Http\Controllers\MyAccount\AnnouncementController;
use App\Http\Controllers\MyAccount\NotificationController;
use App\Http\Controllers\MyAccount\MyAccountBaseController;
use Laravel\Fortify\Http\Controllers\RecoveryCodeController;
use Laravel\Fortify\Http\Controllers\TwoFactorQrCodeController;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;
use Laravel\Fortify\Http\Controllers\ConfirmablePasswordController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;

Route::prefix('account')->group(function () {
    // Authentication
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::post('two-factor-authentication', [TwoFactorAuthenticationController::class, 'store'])->middleware('password.confirm')->name('two-factor.enable');
    Route::delete('two-factor-authentication', [TwoFactorAuthenticationController::class, 'destroy'])->middleware('password.confirm')->name('two-factor.disable');
    Route::get('two-factor-qr-code', [TwoFactorQrCodeController::class, 'show'])->middleware('password.confirm')->name('two-factor.qr-code');
    Route::get('two-factor-recovery-codes', [RecoveryCodeController::class, 'index'])->middleware('password.confirm')->name('two-factor.recovery-codes');
    Route::post('two-factor-recovery-codes', [RecoveryCodeController::class, 'store'])->middleware('password.confirm');
    
    // Session
    Route::get('user-sessions', [ProfileController::class, 'userSessions']);
    Route::delete('destroy-other-sessions', [ProfileController::class, 'destroyOtherSessions']);
    
    // Token
    Route::get('user-tokens', [ProfileController::class, 'userTokens']);
    Route::delete('destroy-other-tokens', [ProfileController::class, 'destroyOtherTokens']);

    // Profile Information & Password
    Route::put('profile-information', [ProfileInformationController::class, 'update'])->name('user-profile-information.update');
    Route::put('password', [PasswordController::class, 'update'])->name('user-password.update');
    
    // Password Confirmation
    Route::get('confirmed-password-status', [ConfirmedPasswordStatusController::class, 'show'])->name('password.confirmation');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
});


Route::prefix('account/api')->group(function () {
    Route::get('ping-data', [AccountBaseController::class, 'fetchPingData']);
    Route::post('user-data', [AccountBaseController::class, 'fetchUserData']);

    // my-account
    Route::get('dashboard', [MyAccountBaseController::class, 'index']);

    // prifile
    Route::get('profile', [ProfileController::class, 'index']);

    Route::delete('announcement/{announcement}/destroy', [AnnouncementController::class, 'forceDelete']);
    Route::post('announcement/{announcement}/restore', [AnnouncementController::class, 'restore']);
    Route::resource('announcement', AnnouncementController::class);
    Route::resource('notification', NotificationController::class);
});
