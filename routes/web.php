<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
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

Route::get('/', [ArticleController::class, 'index'])->name('articles.index');

Route::resource('/articles', ArticleController::class)->except(['index', 'show'])->middleware(['auth']);
Route::resource('/articles', ArticleController::class)->only(['show']);
Route::prefix('articles')->name('articles.')->middleware('auth')->group(function () {
    Route::put('/{article}/like', [ArticleController::class, 'like'])->name('like');
    Route::delete('/{article}/like', [ArticleController::class, 'unlike'])->name('unlike');
});

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}', [UserController::class, 'show'])->name('show');
    Route::middleware('auth')->group(function () {
        Route::put('/{name}/follow', [UserController::class, 'follow'])->name('follow');
        Route::delete('/{name}/follow', [UserController::class, 'unfollow'])->name('unfollow');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
