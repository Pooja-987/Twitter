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

Route::post('/tweets','TweetController@store');
Route::delete('/tweets/{tweet}','TweetController@destroy');

Route::post('/tweets/{tweet}/comment','CommentsController@store');

Route::post('/tweets/{tweet}/like','TweetLikeController@store');
Route::delete('/tweets/{tweet}/like','TweetLikeController@destroy');

Route::get('/profiles/{user}','ProfileController@show')->name('profile');
Route::post('/profiles/{user}/follow','FollowController@store')->name('follow');

Route::get('/profiles/{user}/edit','ProfileController@edit')->middleware('can:edit,user');
Route::patch('/profiles/{user}','ProfileController@update')->middleware('can:edit,user');

Route::get('/explore','ExploreController@index')->middleware('auth');

Route::post('/search','ExploreController@search');

Route::get('/explore/search',function(){
    return view('search');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
