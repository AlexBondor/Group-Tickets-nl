<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/**
 * Welcome screen
 */
Route::get('/', 'WelcomeController@index');
Route::post('/', 'WelcomeController@index');

/**
 * Admin handling
 */
Route::get('admin/message', 'AdminController@composeMessage');
Route::post('admin/message', 'AdminController@sendMessage');

Route::get('updates', 'AdminController@showUpdates');
// FB
Route::post('updates', 'AdminController@showUpdates');

/**
 * Groups handling
 */
Route::get('groups', 'GroupController@index');
// FB
Route::post('groups', 'GroupController@index');

Route::post('groups/comment', 'GroupController@addComment');
Route::post('groups/create', 'GroupController@createGroup');
Route::post('groups/update', 'GroupController@updateGroup');
Route::post('groups/join', 'GroupController@joinGroup');
Route::post('groups/leave', 'GroupController@leaveGroup');
Route::post('groups/notify', 'GroupController@notifyUsers');
Route::get('groups/{slug}', 'GroupController@show');
// FB
Route::post('groups/{slug}', 'GroupController@show');

/**
 * Search handling
 */
Route::get('search', 'SearchController@index');
// FB
Route::post('search', 'SearchController@index');

Route::post('search/results', 'SearchController@show');

Route::get('faq', 'SearchController@faq');
// FB
Route::post('faq', 'SearchController@faq');

/**
 * Social authentication
 */
Route::get('login', 'AuthController@login');
// FB
Route::post('login', 'AuthController@login');

Route::get('confirm', 'AuthController@confirm');
Route::post('confirm', 'AuthController@confirmed');

Route::get('thankyou', 'AuthController@thankyou');
// FB
Route::post('thankyou', 'AuthController@thankyou');

Route::get('logout', 'AuthController@logout');
// FB
Route::post('logout', 'AuthController@logout');
