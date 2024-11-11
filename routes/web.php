<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CateringController;
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
    Route::get('/struct', function () {
        return view('struct');
    });
    Route::get('/document', function () {
        return view('document');
    });
    Route::get('/education', function () {
        return view('education');
    });
    Route::get('/eduStandarts', function () {
        return view('edu-standarts');
    });
    Route::get('/managers', function () {
        return view('managers');
    });
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
    
    Route::get('/vacant', function () {
        return view('vacant');
    });
    Route::get('/inter', function () {
        return view('inter');
    });
    Route::get('/catering', [CateringController::class, 'index']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
