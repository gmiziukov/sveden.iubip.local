<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\Catering;
use App\Http\Controllers\InternationalDogovorController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\StructureController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('sveden/catering', [Catering::class, 'index'])->name('catering');
Route::get('sveden/inter', [InternationalDogovorController::class, 'index'])->name('inter');
Route::get('sveden/budget', [BudgetController::class, 'index'])->name('budget');
Route::get('sveden/struct', [StructureController::class, 'index'])->name('struct');
Route::get('sveden/vacant', [VacantController::class, 'index'])->name('vacant');
Route::get('sveden/manager', [ManagerController::class, 'index'])->name('manager');