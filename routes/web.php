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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index');
Route::get('/top/create', 'PostsController@index');
Route::post('/top/create','PostsController@create');
Route::post('/top/delete','PostsController@delete');
Route::post('/top/update','PostsController@update');



Route::get('/home', 'HomeController@index');

Route::get('/followlist','UsersController@followlist');
Route::get('/followerlist','UsersController@followerlist');


Route::get('/profile','UsersController@Userprofile');

Route::get('/search','UsersController@index');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');
