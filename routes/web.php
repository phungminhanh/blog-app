<?php

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
// routes/web.php
Route::middleware(['admin'])->group(function () {
    Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('index');
    Route::get('/search', [\App\Http\Controllers\PostController::class, 'search'])->name('search');
    Route::get('/{id}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [\App\Http\Controllers\PostController::class, 'update'])->name('update');
    Route::get('/{id}/delete', [\App\Http\Controllers\PostController::class, 'delete'])->name('delete');
    Route::get('/add', [\App\Http\Controllers\PostController::class, 'add'])->name('add');
    Route::post('/store', [\App\Http\Controllers\PostController::class, 'store'])->name('store');
    Route::get('/histories', [\App\Http\Controllers\PostController::class, 'histories'])->name('histories');
    Route::get('/yourpost', [\App\Http\Controllers\PostController::class, 'PostbyAuthor'])->name('yourpost');
});



// routes/web.php
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

