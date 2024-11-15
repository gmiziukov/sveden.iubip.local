<?php

use App\Http\Controllers\EducationController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CateringController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EduStandartsController;
use App\Http\Controllers\GrantsController;
use App\Http\Controllers\InterController;
use App\Http\Controllers\ManagersController;
use App\Http\Controllers\PaidEduController;
use App\Http\Controllers\StructController;
use App\Http\Controllers\VacantController;
use App\Http\Controllers\EmployeesController;
use App\Models\EduStandartFile;
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
Route::get('/education', [EducationController::class, "index"])->name("education");

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

    Route::get('/eduStandarts', function () {
        return view('edu-standarts');
    });
    Route::get('/managers', function () {
        return view('managers');
    });

    Route::get('/struct', [StructController::class, 'index']);

    Route::get('/document', [DocumentController::class, 'index']);
    
    Route::get('/education', function () {
        return view('education');
    });
    Route::get('/eduStandarts',[EduStandartsController::class, 'index']);
    
    Route::get('/managers', [ManagersController::class, 'index']);

    Route::get('/employees', [EmployeesController::class, 'index']);

    Route::get('/objects', function () {
        return view('objects');
    });
    Route::get('/grants', [GrantsController::class, 'index']);
    
    Route::get('/paid_edu', [PaidEduController::class, 'index']);

    Route::get('/budget', [BudgetController::class, 'index']);
    
    Route::get('/vacant', [VacantController::class, 'index']);

    Route::get('/inter', [InterController::class, 'index']);
    
    Route::get('/catering', [CateringController::class, 'index']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

