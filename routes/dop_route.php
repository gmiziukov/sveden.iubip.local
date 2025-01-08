<?php
use App\Http\Controllers;
use App\Http\Controllers\RedactorController;
use App\Http\Controllers\RedactorPageController;
use App\Http\Controllers\Redactor\View\MainPage\GetDataMainPageController;
use App\Http\Controllers\Redactor\View\OtherPage\GetDataOtherPageController;
use App\Http\Controllers\Redactor\SortDataController;

Route::get('/redactor/', [GetDataMainPageController::class, "index"])->name("redactor")->middleware('auth');
Route::get('/redactor/{data}/', [GetDataOtherPageController::class, "index"] )->name("redactor");
Route::get('page/{data}', [Controllers\RedactorPageController::class, "index",['data']])->name("page");

Route::get('/update', [Controllers\ToolController::class, "update_db"])->name("update");

Route::get('/sort', [SortDataController::class, "sort",['data']])->name("sort");

// Route::get('/redactor/{data}', "RedactorController@RedirectToPage");
// Route::get('/redactor/{data}', [Controllers\RedactorController::class, "index"]);

?>
