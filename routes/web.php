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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/add', function(){
	return App\User::first()->addFriend(2);
});

Route::get('/accept', function(){
	return App\User::find(2)->acceptFriend(1);
});

Route::get('/friends', function(){
	return App\User::find(1)->friends();
});


Route::group(['middleware'=>'auth'], function()
{
	Route::get('/profile/{slug}', 'ProfilesController@overview');

	Route::resource('/profile', 'ProfilesController', ['parameters' => [
		'profile' => 'slug'
	]]);

	Route::get('/check_relationship_status/{id}', 'FriendshipController@check');

	Route::get('/add_friend/{id}', 'FriendshipController@addFriend');

	Route::get('/accept_friend/{id}', 'FriendshipController@acceptFriend');





});




Auth::routes();
