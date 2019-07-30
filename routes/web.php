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

use App\Http\Controllers\Blog\PostController;

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/blog/{post}', [PostController::class,'show'])->name('blog.show');
Route::get('/blog/category/{category}', [PostController::class,'category'])->name('blog.category');
Route::get('/blog/tag/{tag}', [PostController::class,'tag'])->name('blog.tag');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/users', 'UsersController');
    Route::put('/make-admin/{user}', 'UsersController@makeAdmin')->name('make.admin');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/tags', 'TagsController');
    Route::resource('/posts', 'PostsController');
    Route::get('/trashed/posts', 'PostsController@trashed')->name('trashed.posts.index');
    Route::put('/restore/posts/{post}', 'PostsController@restorePost')->name('restore.posts.index');
});

