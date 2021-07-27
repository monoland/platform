<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyHistory\GoalController;
use App\Http\Controllers\MyHistory\AwardController;
use App\Http\Controllers\MyHistory\ChildController;
use App\Http\Controllers\MyHistory\CoupleController;
use App\Http\Controllers\MyHistory\CourseController;
use App\Http\Controllers\MyHistory\ReviewController;
use App\Http\Controllers\MyHistory\ParentsController;
use App\Http\Controllers\MyHistory\SectionController;
use App\Http\Controllers\MyHistory\PositionController;
use App\Http\Controllers\MyHistory\EducationController;
use App\Http\Controllers\MyHistory\PaidleaveController;
use App\Http\Controllers\MyHistory\OrganizationController;

Route::prefix('myhistory/api')->group(function () {
    Route::delete('section/{section}/destroy', [SectionController::class, 'forceDelete']);
    Route::post('section/{section}/restore', [SectionController::class, 'restore']);
    Route::resource('section', SectionController::class);

    Route::delete('education/{education}/destroy', [EducationController::class, 'forceDelete']);
    Route::post('education/{education}/restore', [EducationController::class, 'restore']);
    Route::resource('education', EducationController::class);

    Route::delete('position/{position}/destroy', [PositionController::class, 'forceDelete']);
    Route::post('position/{position}/restore', [PositionController::class, 'restore']);
    Route::resource('position', PositionController::class);

    Route::delete('review/{review}/destroy', [ReviewController::class, 'forceDelete']);
    Route::post('review/{review}/restore', [ReviewController::class, 'restore']);
    Route::resource('review', ReviewController::class);

    Route::delete('course/{course}/destroy', [CourseController::class, 'forceDelete']);
    Route::post('course/{course}/restore', [CourseController::class, 'restore']);
    Route::resource('course', CourseController::class);

    Route::delete('parents/{parents}/destroy', [ParentsController::class, 'forceDelete']);
    Route::post('parents/{parents}/restore', [ParentsController::class, 'restore']);
    Route::resource('parents', ParentsController::class);

    Route::delete('couple/{couple}/destroy', [CoupleController::class, 'forceDelete']);
    Route::post('couple/{couple}/restore', [CoupleController::class, 'restore']);
    Route::resource('couple', CoupleController::class);

    Route::delete('child/{child}/destroy', [ChildController::class, 'forceDelete']);
    Route::post('child/{child}/restore', [ChildController::class, 'restore']);
    Route::resource('child', ChildController::class);

    Route::delete('goals/{goals}/destroy', [GoalController::class, 'forceDelete']);
    Route::post('goals/{goals}/restore', [GoalController::class, 'restore']);
    Route::resource('goals', GoalController::class);

    Route::delete('award/{award}/destroy', [AwardController::class, 'forceDelete']);
    Route::post('award/{award}/restore', [AwardController::class, 'restore']);
    Route::resource('award', AwardController::class);

    Route::delete('organization/{organization}/destroy', [OrganizationController::class, 'forceDelete']);
    Route::post('organization/{organization}/restore', [OrganizationController::class, 'restore']);
    Route::resource('organization', OrganizationController::class);

    Route::delete('cltn/{cltn}/destroy', [PaidleaveController::class, 'forceDelete']);
    Route::post('cltn/{cltn}/restore', [PaidleaveController::class, 'restore']);
    Route::resource('cltn', PaidleaveController::class);
});
