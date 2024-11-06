<?php

use App\Http\Controllers\Catering;
use App\Models\InternationalDogovor;
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


Route::get('/catering', [Catering::class, 'index'])->name('catering');
Route::get('/inter', [InternationalDogovor::class, 'index'])->name('inter');