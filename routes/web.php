<?php
use Illuminate\Support\Facades\Storage;
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
Route::middleware(['admin','auth','checkUrlParameters'])->group(function () {
    Route::get('/admin', [\App\Http\Controllers\PostController::class, 'index'])->name('index');
    Route::get('/search', [\App\Http\Controllers\PostController::class, 'search'])->name('search');
    Route::get('/{id}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [\App\Http\Controllers\PostController::class, 'update'])->name('update');
    Route::get('/{id}/delete', [\App\Http\Controllers\PostController::class, 'delete'])->name('delete');
    Route::get('/add', [\App\Http\Controllers\PostController::class, 'add'])->name('add');
    Route::post('/store', [\App\Http\Controllers\PostController::class, 'store'])->name('store');
    Route::get('/histories', [\App\Http\Controllers\PostController::class, 'histories'])->name('histories');
    Route::get('/yourpost', [\App\Http\Controllers\PostController::class, 'PostbyAuthor'])->name('yourpost');
    Route::post('/deleteSelected', [\App\Http\Controllers\PostController::class, 'deleteSelected'])->name('deleteSelected');
    Route::get('/post/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('show');
    Route::get('/listcomment', [\App\Http\Controllers\PostController::class, 'listcomment'])->name('listcomment');
    Route::get('/banuser/{id}', [\App\Http\Controllers\UserController::class, 'banuser'])->name('banuser');
});
Route::middleware(['ADMIN','auth'])->group(function () {
    Route::get('/listuser', [\App\Http\Controllers\UserController::class, 'listuser'])->name('listuser');
    Route::get('/user/filter', [\App\Http\Controllers\UserController::class, 'filter'])->name('user.filter');
    Route::get('/users/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');
    Route::get('/yourpost', [\App\Http\Controllers\PostController::class, 'PostbyAuthor'])->name('yourpost');
    Route::get('/{id}/publish', [\App\Http\Controllers\PostController::class, 'publish'])->name('publish');
    Route::patch('/users/{id}/update-role', [\App\Http\Controllers\UserController::class, 'updateRole'])->name('update.role');
    Route::get('/{id}/unpublish', [\App\Http\Controllers\PostController::class, 'unpublish'])->name('unpublish');
    Route::get('/createuser', [\App\Http\Controllers\UserController::class, 'create'])->name('createuser');
    Route::post('/users', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/edituser/{id}', [\App\Http\Controllers\UserController::class, 'edit'])->name('edituser');
    Route::put('/updateuser/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    
    


});
Route::get('/delete-account/{id}', [\App\Http\Controllers\UserController::class, 'confirmDelete'])->name('delete.account');
Route::post('image-upload', [\App\Http\Controllers\ImageUploadController::class, 'storeImage'])->name('image.upload');


Route::get('/', [\App\Http\Controllers\UserController::class, 'getPost'])->name('blog');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('article/{id}', [\App\Http\Controllers\UserController::class, 'article'])->name('article');
Route::get('article1/{id1}/{id2}', [\App\Http\Controllers\UserController::class, 'article1'])->name('article1');
// routes/web.php
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/addcomment/{id}', [\App\Http\Controllers\UserController::class, 'addComment'])->name('addcomment');
Route::post('/register', [\App\Http\Controllers\UserController::class, 'createuser'])->name('register');
Route::get('/deletecomment/{id}', [\App\Http\Controllers\UserController::class, 'deletecomment'])->name('deletecomment');
Route::post('/editcomment/{id}', [\App\Http\Controllers\UserController::class, 'editcomment'])->name('editcomment');

Route::get('restore/{id}', [\App\Http\Controllers\UserController::class, 'restoreComment'])->name('restoreComment');
Route::get('/forceDelete/{id}', [\App\Http\Controllers\UserController::class, 'forceDelete'])->name('forceDelete');


Route::get('/user/profile', [\App\Http\Controllers\UserController::class, 'showProfile'])->name('user.profile');
Route::post('/user/profiles', [\App\Http\Controllers\UserController::class, 'updateProfile'])->name('user.profile.update');
Route::post('/user/profilee', [\App\Http\Controllers\UserController::class, 'updatePassword'])->name('password.update');
Route::get('forgot-password', [App\Http\Controllers\ResetPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [App\Http\Controllers\ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [App\Http\Controllers\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [App\Http\Controllers\ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('repcomment/{id}', [App\Http\Controllers\UserController::class, 'repComment'])->name('repcomment');
Route::post('rep/{idUser}/{idPost}', [App\Http\Controllers\UserController::class, 'rep'])->name('rep');
Route::get('create', [App\Http\Controllers\DocumentController::class, 'create']);
Route::get('upload-file', function() {
    Storage::disk('google')->put('google-drive.txt', 'Google Drive As Filesystem In Laravel (ManhDanBlogs)');
    dd('Đã upload file lên google drive thành công!');
});
Route::get('list-document', function(){
   
   $driveService = Storage::disk('google');
   $file = $driveService->files->get();

    return $file;
});




