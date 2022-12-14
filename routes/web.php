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
Route::get('/top/create', 'PostsController@create');
Route::post('/top/create','PostsController@create');
Route::get('/top/{id}/delete','PostsController@delete');
Route::get('/top/update','PostsController@update');
Route::post('/top/update','PostsController@update');



Route::get('/home', 'HomeController@index');

Route::get('/followlist','FollowsController@followlist');
Route::get('/followerlist','FollowsController@followerlist');


Route::get('/profile','UsersController@profile');
Route::post('/profile/profile_edit','UsersController@profileEdit');


Route::get('/followlist/{id}/user','UsersController@other_user_profile');
Route::get('/followerlist/{id}/user','UsersController@other_user_profile');



Route::get('/search','FollowsController@search');
Route::get('/search/{id}/follow', 'FollowsController@follow');
Route::get('/search/{id}/unfollow', 'FollowsController@unfollow');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');
