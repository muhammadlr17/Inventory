<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('ruang/trash', [RuangController::class,'trash'])->name('ruang.trash');
Route::get('ruang/restore/{id?}', [RuangController::class,'restore']);
Route::delete('ruang/delete/{id?}', [RuangController::class,'delete']);
Route::resource('ruang',RuangController::class);

Route::view('inventaris','inventaris');
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
