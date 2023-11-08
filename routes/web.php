<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
	if(auth()->user()){
		return redirect('/home');
	}else{
		return view('auth.login');
	}
   
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::post('user/store', ['uses' =>'App\Http\Controllers\UserController@store']);
	Route::get('user/delete/{id}', ['uses' =>'App\Http\Controllers\UserController@delete']);
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('user/create', 'App\Http\Controllers\UserController@create');

	Route::get('user/management', 'App\Http\Controllers\UserController@management');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	 
	Route::group(['prefix' => 'news'], function () {
		Route::get('/', ['uses' => 'App\Http\Controllers\NewPostController@index']);
		Route::get('/create', ['as' => 'news.create','uses' => 'App\Http\Controllers\NewPostController@create']);
		Route::post('/store', ['uses' => 'App\Http\Controllers\NewPostController@store']);
		Route::get('/{id}/edit', ['uses' => 'App\Http\Controllers\NewPostController@edit']);
		Route::put('/update/{id}', ['uses' => 'App\Http\Controllers\NewPostController@update']);
		Route::get('/{id}/delete/', ['uses' => 'App\Http\Controllers\NewPostController@delete']);
		Route::get('/{id}/visualizar', ['uses' => 'App\Http\Controllers\NewPostController@show']);
	});
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});




