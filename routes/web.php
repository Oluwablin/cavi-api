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
Route::post('add/project', 	'ProjectController@addProject');
Route::get('fetch/all/projects', 	'ProjectController@allProjects');
Route::get('fetch/one/project/{id}', 	'ProjectController@oneProjectById');
Route::put('update/project', 	'ProjectController@updateProject');
Route::delete('delete/project', 	'ProjectController@deleteProject');
Route::delete('delete/all/project', 	'ProjectController@deleteAllProject');
Route::get('fetch/project/projects', 	'ProjectController@projects');
Route::get('fetch/project/stacks', 	'ProjectController@stacks');
Route::get('fetch/project/proficiency', 	'ProjectController@proficiency');
