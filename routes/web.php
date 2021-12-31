<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\Authenticate;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class,'index'])->name('/');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/mydata', [App\Http\Controllers\MydataController::class, 'mydata'])->name('mydata')->middleware('auth');

Route::post('/mydata', [App\Http\Controllers\MydataController::class, 'uploadImage'])->name('mydata')->middleware('auth');

Route::put('/mydata', [App\Http\Controllers\MydataController::class, 'updateData'])->name('mydata.update')->middleware('auth');

Route::get('/publish', [App\Http\Controllers\PublishController::class, 'publish'])->name('publish')->middleware('auth');

Route::post('/publish', [App\Http\Controllers\PublishController::class, 'publishArticle'])->name('publish')->middleware('auth');

Route::get('/article/{id}', [App\Http\Controllers\ArticleController::class, 'article'])->name('article');