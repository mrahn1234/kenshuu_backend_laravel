<?php

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

// Home

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@home')->name('homes.home');

// Article
Route::get('/articles/new', 'ArticleController@new')->name('articles.new');
Route::post('/articles/create', 'ArticleController@create')->name('articles.create');
Route::get('/articles/{id}', 'ArticleController@show')->name('articles.show');
Route::get('/articles/{id}/edit', 'ArticleController@edit')->name("articles.edit");
Route::patch('/articles/{id}', 'ArticleController@update')->name("articles.update");
Route::delete('/articles/{id}', 'ArticleController@delete')->name('articles.delete');

//Author
Route::get('/authors/register', 'AuthorController@register')->name('authors.register');
Route::get('/authors/login', 'AuthorController@login')->name('authors.login');
Route::post('/authors/login_process', 'AuthorController@login_process')->name('authors.login_process');
Route::post('/authors/register_process', 'AuthorController@register_process')->name('authors.register_process');
Route::get('/authors/logout', 'AuthorController@logout')->name('authors.logout');
Route::get('/authors/profile/{id}', 'AuthorController@profile')->name('authors.profile');
Route::post('/authors/update_avatar', 'AuthorController@update_avatar')->name('authors.update_avatar');

//404
Route::get('/404-not-found', 'NotFoundController@not_found')->name('notfounds.not_found');
