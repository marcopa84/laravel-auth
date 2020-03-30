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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/{slug}', 'PostController@show')->name('posts.show');
Route::post('/comment', 'CommentController@store')->name('comment.store');

// redirect to posts list after login
Route::get('/registred', 'Registred\PostController@index');

Route::name('registred.')
    ->prefix('registred')
    ->namespace('Registred')
    ->middleware('auth')
    ->group(function () {
        Route::resource('posts', 'PostController');
        //rotta commenti admin
    });