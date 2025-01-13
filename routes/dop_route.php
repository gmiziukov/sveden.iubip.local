<?php
use App\Http\Controllers;
// use App\Http\Controllers\RedactorController;
// use App\Http\Controllers\RedactorPageController;
use App\Http\Controllers\Redactor\View\MainPage\GetDataMainPageController;
use App\Http\Controllers\Redactor\View\OtherPage\GetDataOtherPageController;
use App\Http\Controllers\Redactor\SortDataController;

Route::get('/redactor/', [GetDataMainPageController::class, "index"])->name("redactor")->middleware('auth');
Route::get('/redactor/{data}/', [GetDataOtherPageController::class, "index"] )->name("redactor");

Route::post('/sort', [SortDataController::class, "sort",['data']])->name("sort");
// Route::get('/sort_update', [SortDataController::class, "sort_update",['data']])->name("update");
// Route::get('/sort_delete', [SortDataController::class, "sort_delete",['data']])->name("delete");

// Route::get('page/{data}', [Controllers\RedactorPageController::class, "index",['data']])->name("page");

// Route::get('/update', [Controllers\ToolController::class, "update_db"])->name("update");

// Route::get('/redactor/{data}', "RedactorController@RedirectToPage");
// Route::get('/redactor/{data}', [Controllers\RedactorController::class, "index"]);

?>
