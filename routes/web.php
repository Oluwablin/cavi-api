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


Route::resource('project', 'ProjectController');

// TODO: modify the route to match what ever you want on your frontend.
Route::post('/add/project', 			'ProjectController@addProject');
Route::get('fetch/project/list', 	'ProjectController@allProjects');
Route::get('/this/can/be/anything', 	'ProjectController@oneProjectById');
Route::put('/this/can/be/anything', 	'ProjectController@updateProject');
Route::delete('/this/can/be/anything', 	'ProjectController@deleteProject');
Route::delete('/this/can/be/anything', 	'ProjectController@deleteAllProject');
Route::get('/fetch/project/list', 		'ProjectController@projects');
Route::get('/fetch/stack/list', 		'ProjectController@stacks');
Route::get('/fetch/proficiency/list', 	'ProjectController@proficiency');
