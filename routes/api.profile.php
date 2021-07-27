<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyProfile\DocumentController;

Route::prefix('myprofile/api')->group(function () {
    Route::delete('document/{document}/destroy', [DocumentController::class, 'forceDelete']);
    Route::post('document/{document}/restore', [DocumentController::class, 'restore']);
    Route::resource('document', DocumentController::class);
});
