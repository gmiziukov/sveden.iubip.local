<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CateringController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\InterController;
use App\Http\Controllers\ManagersController;
use App\Http\Controllers\StructController;
use App\Http\Controllers\VacantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'sveden'], function () {
    Route::get('/common', function () {
        return view('common');
    });
    Route::get('/struct', [StructController::class, 'index']);

    Route::get('/document', [DocumentController::class, 'index']);
    
    Route::get('/education', function () {
        return view('education');
    });
    Route::get('/eduStandarts', function () {
        return view('edu-standarts');
    });
    Route::get('/managers', [ManagersController::class, 'index']);

    Route::get('/employees', function () {
        return view('employees');
    });
    Route::get('/objects', function () {
        return view('objects');
    });
    Route::get('/grants', function () {
        return view('grants');
    });
    Route::get('/paid_edu', function () {
        return view('paid-edu');
    });

    Route::get('/budget', [BudgetController::class, 'index']);
    
    Route::get('/vacant', [VacantController::class, 'index']);

    Route::get('/inter', [InterController::class, 'index']);
    
    Route::get('/catering', [CateringController::class, 'index']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
