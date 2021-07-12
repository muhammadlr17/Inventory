<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\InventarisController;
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


// Route untuk fitur Ruang
Route::get('ruang/trash',                   [RuangController::class,'trash']);
Route::get('ruang/restore/{id?}',           [RuangController::class,'restore']);
Route::delete('ruang/delete/{id?}',         [RuangController::class,'delete']);
Route::resource('ruang',                    RuangController::class);

// Route untuk fitur Inventaris
Route::get('inventaris/trash',              [InventarisController::class,'trash']);
Route::get('inventaris/restore/{id?}',      [InventarisController::class,'restore']);
Route::delete('inventaris/delete/{id?}',    [InventarisController::class,'delete']);
Route::resource('inventaris',               InventarisController::class);

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
