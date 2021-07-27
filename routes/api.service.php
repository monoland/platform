<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyService\DivorceController;
use App\Http\Controllers\MyService\PensionController;
use App\Http\Controllers\MyService\InclusionController;
use App\Http\Controllers\MyService\PaidleaveController;
use App\Http\Controllers\MyService\PromotionController;
use App\Http\Controllers\MyService\CouplecardController;
use App\Http\Controllers\MyService\PersoncardController;
use App\Http\Controllers\MyService\PayincreaseController;

Route::prefix('myservice/api')->group(function () {
    Route::delete('paidleave/{paidleave}/destroy', [PaidleaveController::class, 'forceDelete']);
    Route::post('paidleave/{paidleave}/restore', [PaidleaveController::class, 'restore']);
    Route::resource('paidleave', PaidleaveController::class);

    Route::delete('pension/{pension}/destroy', [PensionController::class, 'forceDelete']);
    Route::post('pension/{pension}/restore', [PensionController::class, 'restore']);
    Route::resource('pension', PensionController::class);

    Route::delete('promotion/{promotion}/destroy', [PromotionController::class, 'forceDelete']);
    Route::post('promotion/{promotion}/restore', [PromotionController::class, 'restore']);
    Route::resource('promotion', PromotionController::class);

    Route::delete('payincrease/{payincrease}/destroy', [PayincreaseController::class, 'forceDelete']);
    Route::post('payincrease/{payincrease}/restore', [PayincreaseController::class, 'restore']);
    Route::resource('payincrease', PayincreaseController::class);

    Route::delete('divorce/{divorce}/destroy', [DivorceController::class, 'forceDelete']);
    Route::post('divorce/{divorce}/restore', [DivorceController::class, 'restore']);
    Route::resource('divorce', DivorceController::class);

    Route::delete('inclusion/{inclusion}/destroy', [InclusionController::class, 'forceDelete']);
    Route::post('inclusion/{inclusion}/restore', [InclusionController::class, 'restore']);
    Route::resource('inclusion', InclusionController::class);

    Route::delete('personcard/{personcard}/destroy', [PersoncardController::class, 'forceDelete']);
    Route::post('personcard/{personcard}/restore', [PersoncardController::class, 'restore']);
    Route::resource('personcard', PersoncardController::class);

    Route::delete('couplecard/{couplecard}/destroy', [CouplecardController::class, 'forceDelete']);
    Route::post('couplecard/{couplecard}/restore', [CouplecardController::class, 'restore']);
    Route::resource('couplecard', CouplecardController::class);
});
