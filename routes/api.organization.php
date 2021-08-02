<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Organization\ExcessController;
use App\Http\Controllers\Organization\AnomalyController;
use App\Http\Controllers\Organization\ExecutorController;
use App\Http\Controllers\Organization\EmptinessController;
use App\Http\Controllers\Organization\EchelonmapController;
use App\Http\Controllers\Organization\StructuralController;
use App\Http\Controllers\Organization\PositionmapController;
use App\Http\Controllers\Organization\WorkunitypeController;
use App\Http\Controllers\Organization\PositionkindController;
use App\Http\Controllers\Organization\PositiontypeController;
use App\Http\Controllers\Organization\WorkunitreadController;
use App\Http\Controllers\Organization\FunctionalmapController;
use App\Http\Controllers\Organization\FunctionalreadController;
use App\Http\Controllers\Organization\FunctionalgradeController;
use App\Http\Controllers\Organization\FunctionalstageController;

Route::prefix('organization/api')->group(function () {
    Route::delete('positionmap/{positionmap}/destroy', [PositionmapController::class, 'forceDelete']);
    Route::post('positionmap/{positionmap}/restore', [PositionmapController::class, 'restore']);
    Route::resource('positionmap', PositionmapController::class);

    Route::delete('positionmap/{positionmap}/positiontype/{positiontype}/destroy', [PositiontypeController::class, 'forceDelete']);
    Route::post('positionmap/{positionmap}/positiontype/{positiontype}/restore', [PositiontypeController::class, 'restore']);
    Route::resource('positionmap.positiontype', PositiontypeController::class);

    Route::delete('positionkind/{positionkind}/destroy', [PositionkindController::class, 'forceDelete']);
    Route::post('positionkind/{positionkind}/restore', [PositionkindController::class, 'restore']);
    Route::resource('positionkind', PositionkindController::class);

    Route::delete('functionalstage/{functionalstage}/destroy', [FunctionalstageController::class, 'forceDelete']);
    Route::post('functionalstage/{functionalstage}/restore', [FunctionalstageController::class, 'restore']);
    Route::resource('functionalstage', FunctionalstageController::class);

    Route::delete('functionalstage/{functionalstage}/functionalgrade/{functionalgrade}/destroy', [FunctionalgradeController::class, 'forceDelete']);
    Route::post('functionalstage/{functionalstage}/functionalgrade/{functionalgrade}/restore', [FunctionalgradeController::class, 'restore']);
    Route::resource('functionalstage.functionalgrade', FunctionalgradeController::class);

    Route::delete('functionalmap/{functionalmap}/destroy', [FunctionalmapController::class, 'forceDelete']);
    Route::post('functionalmap/{functionalmap}/restore', [FunctionalmapController::class, 'restore']);
    Route::resource('functionalmap', FunctionalmapController::class);

    Route::delete('functionalread/{functionalread}/destroy', [FunctionalreadController::class, 'forceDelete']);
    Route::post('functionalread/{functionalread}/restore', [FunctionalreadController::class, 'restore']);
    Route::resource('functionalread', FunctionalreadController::class);

    Route::delete('executor/{executor}/destroy', [ExecutorController::class, 'forceDelete']);
    Route::post('executor/{executor}/restore', [ExecutorController::class, 'restore']);
    Route::resource('executor', ExecutorController::class);

    Route::delete('echelonmap/{echelonmap}/destroy', [EchelonmapController::class, 'forceDelete']);
    Route::post('echelonmap/{echelonmap}/restore', [EchelonmapController::class, 'restore']);
    Route::resource('echelonmap', EchelonmapController::class);

    Route::delete('structural/{structural}/destroy', [StructuralController::class, 'forceDelete']);
    Route::post('structural/{structural}/restore', [StructuralController::class, 'restore']);
    Route::resource('structural', StructuralController::class);

    Route::delete('workunitype/{workunitype}/destroy', [WorkunitypeController::class, 'forceDelete']);
    Route::post('workunitype/{workunitype}/restore', [WorkunitypeController::class, 'restore']);
    Route::resource('workunitype', WorkunitypeController::class);

    Route::delete('workunitread/{workunitread}/destroy', [WorkunitreadController::class, 'forceDelete']);
    Route::post('workunitread/{workunitread}/restore', [WorkunitreadController::class, 'restore']);
    Route::resource('workunitread', WorkunitreadController::class);

    Route::resource('emptiness', EmptinessController::class);
    Route::resource('anomaly', AnomalyController::class);
    Route::resource('excess', ExcessController::class);
});
