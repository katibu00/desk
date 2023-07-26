<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TopicsController;
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
    return view('user.pages.home');
})->name('home');

Route::get('/system-admin', [LoginController::class, 'index'])->name('system-admin');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::group(['prefix' => 'settings', 'middleware' => ['auth']], function () {
   
    Route::get('/subjects', [SubjectsController::class, 'index'])->name('subjects');
    Route::post('/subjects', [SubjectsController::class, 'store']);
    Route::post('/subjects/update', [SubjectsController::class, 'update'])->name('subjects.update');

    Route::get('/articles', [ArticlesController::class, 'index'])->name('articles');
    Route::post('/articles/store', [ArticlesController::class, 'store'])->name('articles.store');
    Route::get('/articles/create', [ArticlesController::class, 'create'])->name('articles.create');
    Route::get('articles/{article}/edit', [ArticlesController::class, 'edit'])->name('articles.edit');
    Route::delete('articles/{article}', [ArticlesController::class, 'destroy'])->name('articles.destroy');
    Route::put('/articles/{article}', [ArticlesController::class, 'update'])->name('articles.update');

});


Route::get('/articles/{slug}',[ArticlesController::class, 'show'])->name('articles.show');
Route::get('/subjects/{slug}',[SubjectsController::class, 'showSubjectArticles'])->name('subjects.show');


Route::get('/search-topics', [ArticlesController::class, 'searchTopics']);

