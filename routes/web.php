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

Route::get('/', function () {  return view('welcome');});

Route::any('loginn', 'LoginController@index')->name('loginn');

//Route::resource('threads','ThreadController');//相当于👇
//Route::get('/threads', 'threadsController@index')->name('threads.index');
//Route::get('/threads/create', 'threadsController@create')->name('threads.create');
//Route::get('/threads/{thread}', 'threadsController@show')->name('threads.show');
//Route::post('/threads', 'threadsController@store')->name('threads.store');
//Route::get('/threads/{thread}/edit', 'threadsController@edit')->name('threads.edit');
//Route::patch('/threads/{thread}', 'threadsController@update')->name('threads.update');
//Route::delete('/threads/{thread}', 'threadsController@destroy')->name('threads.destroy');
Route::get('/threads', 'ThreadController@index');
Route::post('/threads', 'ThreadController@store');
Route::get('/threads/create', 'ThreadController@create');
//这个要在下面
Route::get('/threads/{channel}', 'ThreadController@index');
Route::get('/threads/{channel}/{thread}','ThreadController@show');
Route::delete('threads/{channel}/{thread}', 'ThreadController@destroy');
Route::get('/threads/{channel}/{thread}/replies','ReplyController@index');
Route::post('/threads/{channel}/{thread}/replies', 'ReplyController@store');

Route::post('/threads/{channel}/{thread}/subscriptions','ThreadSubscriptionsController@store')
->middleware('auth');
Route::delete('/threads/{channel}/{thread}/subscriptions','ThreadSubscriptionsController@destroy')
->middleware('auth');



Route::patch('/replies/{reply}','ReplyController@update');
Route::delete('/replies/{reply}','ReplyController@destroy');
Route::post('/replies/{reply}/favorites', 'FavoritesController@store');
Route::delete('/replies/{reply}/favorites','FavoritesController@destroy');

Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');
Route::get('/profiles/{user}/notifications','UserNotificationsController@index');
Route::delete('/profiles/{user}/notifications/{notification}','UserNotificationsController@destroy');







Route::get('/colors','ColorController@index');
Route::get('/yuansu','YuansuController@index');
Route::get('maotou', 'maotouController@index');


Route::get('/armies', 'ArmyController@index');
Route::get('/armies/{num}', 'ArmyController@show');

Route::get('/five/{num}', 'FiveController@show');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
