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



Auth::routes();

Route::resource('/', 'HomeController');

Route::resource('/mensajes', 'MensajeController');

Route::get('usuarios/destroy/{id}', 'UserController@destroy');

Route::resource('/usuarios','UserController');

Route::get('pacientes/destroy/{id}', 'PacienteController@destroy');
Route::resource('/pacientes','PacienteController');

Route::get('tratamientos/destroy/{id}', 'TratamientoController@destroy');
Route::get('/ultimosTratamientos','TratamientoController@ultimosTratamientos');
Route::get('/listarStock','TratamientoController@listarStock');
Route::get('/stockBajo','TratamientoController@stockBajo');
Route::get('/recetas','TratamientoController@recetas');



Route::resource('/tratamientos', 'TratamientoController');












