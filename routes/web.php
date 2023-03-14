<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
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

Route::get('/', [BookController::class, 'index']);



Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home'); 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::delete('/home/{id}', [App\Http\Controllers\BookController::class, 'destroy'])->name('home.destroy');
    Route::get('/home', [App\Http\Controllers\BookController::class, 'search'])->name('search');
    Route::resource('/add', BookController::class);
    Route::put('/add/{id}/update', [BookController::class, 'update'])->name('add.update');
    Route::get('/add/{id}/edit', [BookController::class, 'edit'])->name('add.edit');
    Route::get('/add/{id}/show', [BookController::class, 'show'])->name('add.show');
});