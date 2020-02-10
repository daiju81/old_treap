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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/posts', 'PostController');
Route::get('/posts/{group_id}', 'PostController@index');
// Route::get('/posts/create/{group_id}', 'PostController@create');
Route::get('/groups/search', function() {
  return view('groups.search');
});
Route::post('/groups/search', function() {
  return view('groups.search');
});
Route::get('Search', 'SearchController@index')->name('search');
Route::get('Search/{id}', function($group_id) {
  return View::make('search.search', compact('group_id'));
});
Route::get('/', 'WelcomeController@index')->name('top');
Route::resource('/groups', 'GroupController');
Route::get('/groups/done', 'GroupController@done');
Route::get('/groupmembers/add', 'GroupMemberController@add');
Route::get('/groupmembers/add/{group_id}', 'GroupMemberController@store');
