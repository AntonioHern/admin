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

Route::resource('/usuarios','UserController');

Route::resource('/pacientes','PacienteController');


Route::get('/ultimosTratamientos','TratamientoController@ultimosTratamientos');
Route::get('/listarStock','TratamientoController@listarStock');
Route::get('/stockBajo','TratamientoController@stockBajo');
Route::get('/recetas','TratamientoController@recetas');



Route::resource('/tratamientos', 'TratamientoController');












