<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('/posts', function () {
    return view('posts/index');
});*/

Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index')->middleware(['auth']);
Route::get('/posts/create',[App\Http\Controllers\PostController::class, 'create'])->name('posts.create')->middleware(['auth']);  //auth is middleware name defined in kernel.php
Route::delete('/posts/{post}',[App\Http\Controllers\PostController::class, 'delete'])->name('posts.delete')->middleware(['auth']);
Route::get('/posts/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show')->middleware(['auth']);
Route::get('/posts/{post}/edit',[App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit')->middleware(['auth']);
Route::post('/posts',[App\Http\Controllers\PostController::class, 'store'])->name('posts.store')->middleware(['auth']);
Route::put('/posts/{post}',[App\Http\Controllers\PostController::class, 'update'])->name('posts.update')->middleware(['auth']);



/*
Route::get('/test', function () {
    return view('test1');
});
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
