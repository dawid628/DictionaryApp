<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordController;
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

Route::get('/', [WordController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/add', [WordController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [WordController::class, 'edit']);
    Route::get('/destroy/{id}', [WordController::class, 'destroy']);
    Route::post('/store', [WordController::class, 'store'])->name('store-word');
    Route::post('/update', [WordController::class, 'update'])->name('update-word');
});