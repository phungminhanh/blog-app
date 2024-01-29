<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ResetPasswordController;
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
Route::middleware(['admin','auth'])->group(function () {
    Route::get('/admin', [\App\Http\Controllers\PostController::class, 'index'])->name('index');
    Route::get('/search', [\App\Http\Controllers\PostController::class, 'search'])->name('search');
    Route::get('/{id}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [\App\Http\Controllers\PostController::class, 'update'])->name('update');
    Route::get('/{id}/delete', [\App\Http\Controllers\PostController::class, 'delete'])->name('delete');
    Route::get('/add', [\App\Http\Controllers\PostController::class, 'add'])->name('add');
    Route::post('/store', [\App\Http\Controllers\PostController::class, 'store'])->name('store');
    Route::get('/histories', [\App\Http\Controllers\PostController::class, 'histories'])->name('histories');
    Route::get('/yourpost', [\App\Http\Controllers\PostController::class, 'PostbyAuthor'])->name('yourpost');
});
Route::get('/', [\App\Http\Controllers\UserController::class, 'getPost'])->name('blog');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('article/{id}', [\App\Http\Controllers\UserController::class, 'article'])->name('article');
// routes/web.php
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/addcomment/{id}', [\App\Http\Controllers\UserController::class, 'addComment'])->name('addcomment');
Route::post('/register', [\App\Http\Controllers\UserController::class, 'createuser'])->name('register');
Route::get('/deletecomment/{id}', [\App\Http\Controllers\UserController::class, 'deletecomment'])->name('deletecomment');
Route::post('/editcomment/{id}', [\App\Http\Controllers\UserController::class, 'editcomment'])->name('editcomment');

Route::get('restore/{id}', [\App\Http\Controllers\UserController::class, 'restoreComment'])->name('restoreComment');
Route::get('/forceDelete/{id}', [\App\Http\Controllers\UserController::class, 'forceDelete'])->name('forceDelete');


Route::get('forgot-password', [App\Http\Controllers\ResetPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [App\Http\Controllers\ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [App\Http\Controllers\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [App\Http\Controllers\ResetPasswordController::class, 'reset'])->name('password.update');


