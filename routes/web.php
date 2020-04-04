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
<<<<<<< HEAD
Route::get('/fetch/all/added/project', 	'ProjectController@allProjects');
Route::get('/this/can/be/anything', 	'ProjectController@oneProjectById');
Route::put('/this/can/be/anything', 	'ProjectController@updateProject');
Route::delete('/this/can/be/anything', 	'ProjectController@deleteProject');
Route::delete('/this/can/be/anything', 	'ProjectController@deleteAllProject');
=======
Route::get('/fetch/all/projects', 	'ProjectController@allProjects');
Route::get('/fetch/one/project/by/id/{id}', 	'ProjectController@oneProjectById');
Route::put('/update/project', 	'ProjectController@updateProject');
Route::delete('/delete/project', 	'ProjectController@deleteProject');
Route::delete('/delete/all/projects', 	'ProjectController@deleteAllProject');
>>>>>>> dev
Route::get('/fetch/project/list', 		'ProjectController@projects');
Route::get('/fetch/stack/list', 		'ProjectController@stacks');
Route::get('/fetch/proficiency/list', 	'ProjectController@proficiency');
