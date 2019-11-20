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


Route::get('about', function () {
    return "about";
});

Route::get('newhome',function() { return view('newhome')->with('word','welcome to NEW home'); } );

Route::get('form',function() { return view('form'); } );

Route::post('process', 'TasksController@process');

Route::get('home', 'TasksController@home');
//Route::get('object', 'object@index')->middleware('can:check_rights,"admin"');
//Route::get('object.php', 'object@index')->middleware('can:check_rights,"admin"');
//Route::post('object.php', 'object@index')->middleware('can:check_rights,"admin"');


Route::group(['middleware' => 'myauth:admin'], function () {
    Route::get('object.php', 'object@index');
	Route::post('object.php', 'object@index');
    Route::get('object', 'object@index');
	});
	
Route::get('tasks/create', 'TasksController@create');
Route::post('tasks', 'TasksController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
