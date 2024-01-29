<?php

use App\Http\Controllers\ArticleController;
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

Route::controller(ArticleController::class)->group(function () {
    Route::get('/','index')->name('articles.index');
    Route::get('/articles/{id}','show') ->name('article.show');
    Route::get('/articles/{id}/edit','edit')->name('articles.edit');
    Route::put('/articles/{id}','update')->name('articles.update');
    Route::delete('/articles/{id}','delete')->name('articles.delete');
});