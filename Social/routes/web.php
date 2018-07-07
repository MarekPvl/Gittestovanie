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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get( '/home', 'HomeController@index' );
Route::get( '/', 'HomeController@index' );
Route::get( 'user/profile', 'PageController@profile' );
Route::get( 'Users', 'PageController@users' );
Route::get( 'user/{name}', 'PageController@view' )->name( 'user.view' );
Route::get( 'Friendsrequests', 'FriendsController@Friendsrequestslist' );

Route::post( 'update', 'UpdateController@update' );
Route::post( 'image', 'UpdateController@image' );
Route::post( 'newstatus', 'StatusController@status' );
Route::post( 'newcomment', 'CommentsController@comment' );
Route::post( 'like', 'LikesController@like' );
Route::post( 'dislike', 'LikesController@dislike' );
Route::post( 'Addfriend', 'FriendsController@Addfriend' );
Route::post( 'Deleterequest', 'FriendsController@Deleterequest' );
Route::post( 'Deletefriend', 'FriendsController@Deletefriend' );
Route::post( 'Acceptfriend', 'FriendsController@Acceptfriend' );
Route::post( 'Rejectfriend', 'FriendsController@Rejectfriend' );
