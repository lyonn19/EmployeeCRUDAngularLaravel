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
Route::get('/', function () {
    return view('index');
    //return "Hello";
});


Route::get('/api/v1/employees/{id?}', 'Employees@index');
Route::post('/api/v1/employees', 'Employees@store');
Route::post('/api/v1/employees/{id}', 'Employees@update');
Route::delete('/api/v1/employees/{id}', 'Employees@destroy');

Route::get('/api/v1/cargoseq', 'Cargos@sequence');
Route::get('/api/v1/cargos/{id?}', 'Cargos@index');
Route::post('/api/v1/cargos', 'Cargos@store');
Route::post('/api/v1/cargos/{id}', 'Cargos@update');
Route::delete('/api/v1/cargos/{id}', 'Cargos@destroy');


