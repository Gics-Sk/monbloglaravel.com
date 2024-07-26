<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionsController;

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

// Route::get('/', [PagesController::class, 'index']);

// Route::get('/contact-us',function (){
//     return view('layouts.contact');
// });

Route::controller(PagesController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/contact-us', 'contact');
        Route::get('/about', 'about');
    });

Route::controller(ArticleController::class)
    ->group(function () {
        Route::get('/articles', 'index')->name('articles.index');
        Route::post('/articles','store')->name('articles.store');
        Route::get('/articles/create','create')->name('articles.create');
        Route::get('/articles/{article}', 'show')->name('articles.show');
        Route::get('/articles/{article}/edit', 'edit')->name('articles.edit');
        Route::patch('/articles/{article}', 'update')->name('articles.update');
        Route::delete('/articles/{article}', 'destroy')->name('articles.destroy');
        Route::get('/articles/search','search')->name('articles.search');
    });

    //Route d'authentification
    Route::get('/register',[RegisterController::class,'index'])->name('register');
    Route::post('/register',[RegisterController::class,'store']);
    Route::get('/login',[SessionsController::class,'index'])->name('login');
    Route::post('/login',[SessionsController::class,'login']);