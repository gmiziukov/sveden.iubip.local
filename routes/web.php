<?php
use App\Http\Controllers;
use Illuminate\Support\Facades\Route;


include("dop_route.php");

// Route::get('/education', [EducationController::class, "index"])->name("education");
Route::get('/sveden', [Controllers\PageViewController::class, "index"])->name("sveden");
Route::get('/sveden/{data}', [Controllers\PageViewController::class, "index"])->name("sveden");


// Route::group(['prefix' => 'sveden'], function () {

//     Route::get('/common', [CommonController::class, 'index']);

//     Route::get('/struct', [StructController::class, 'index']);

//     Route::get('/document', [DocumentController::class, 'index']);
    
//     Route::get('/education', [EducationController::class, 'index']);

//     Route::get('/eduStandarts',[EduStandartsController::class, 'index']);
    
//     Route::get('/managers', [ManagersController::class, 'index']);

//     Route::get('/employees', [EmployeesController::class, 'index']);

//     Route::get('/objects', [ObjectsController::class, 'index']);

//     Route::get('/grants', [GrantsController::class, 'index']);
    
//     Route::get('/paid_edu', [PaidEduController::class, 'index']);

//     Route::get('/budget', [BudgetController::class, 'index']);
    
//     Route::get('/vacant', [VacantController::class, 'index']);

//     Route::get('/inter', [InterController::class, 'index']);
    
//     Route::get('/catering', [CateringController::class, 'index']);
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

