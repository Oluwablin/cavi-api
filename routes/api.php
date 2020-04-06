<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - PROJECT SECTION
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/add/project', 			        'ProjectController@addProject');
Route::get('/fetch/all/added/project', 	        'ProjectController@allProjects');
Route::get('/view/project/{id}', 	            'ProjectController@oneProjectById');
Route::put('/update/project/{id}', 	            'ProjectController@updateProject');
Route::delete('/delete/project/{project_id}', 	'ProjectController@deleteProject');
Route::delete('/delete/all/projects', 	        'ProjectController@deleteAllProject');
Route::get('/fetch/project/list', 		        'ProjectController@projects');
Route::get('/fetch/stack/list', 		        'ProjectController@stacks');
Route::get('/fetch/proficiency/list', 	        'ProjectController@proficiency');

// Route::apiResource('projects', 'ProjectController');
// Route::get('projects', 'ProjectController@index');
// Route::get('projects/{project}', 'ProjectController@show');
// Route::post('projects', 'ProjectController@store');
// Route::put('projects/{project}', 'ProjectController@update');
// Route::delete('projects/{project}', 'ProjectController@delete');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
