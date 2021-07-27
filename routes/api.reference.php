<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reference\FaithController;
use App\Http\Controllers\Reference\EchelonController;
use App\Http\Controllers\Reference\EchelonmapController;

Route::prefix('reference/api')->group(function () {
    Route::delete('faith/{faith}/destroy', [FaithController::class, 'forceDelete']);
    Route::post('faith/{faith}/restore', [FaithController::class, 'restore']);
    Route::resource('faith', FaithController::class);

    Route::delete('echelonmap/{echelonmap}/destroy', [EchelonmapController::class, 'forceDelete']);
    Route::post('echelonmap/{echelonmap}/restore', [EchelonmapController::class, 'restore']);
    Route::resource('echelonmap', EchelonmapController::class);

    Route::delete('echelonmap/{echelonmap}/echelon/{echelon}/destroy', [EchelonController::class, 'forceDelete']);
    Route::post('echelonmap/{echelonmap}/echelon/{echelon}/restore', [EchelonController::class, 'restore']);
    Route::resource('echelonmap.echelon', EchelonController::class);
});
