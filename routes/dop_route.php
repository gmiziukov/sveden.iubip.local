<?php
use App\Http\Controllers;
use App\Http\Controllers\RedactorController;
use App\Http\Controllers\RedactorPageController;


Route::get('/redactor/', [Controllers\RedactorController::class, "index"])->name("redactor");
Route::get('/redactor/{data}/{data2}', [Controllers\RedactorPageController::class, "index"] )->name("redactor");
Route::get('page/{data}', [Controllers\RedactorPageController::class, "index",['data']])->name("page");
// Route::get('/redactor/{data}', "RedactorController@RedirectToPage");
// Route::get('/redactor/{data}', [Controllers\RedactorController::class, "index"]);

?>