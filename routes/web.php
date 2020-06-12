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
    return view('Paciente');
});

Route::get('pacientes','PacienteController@index');
Route::post('pacientes','PacienteController@store');
Route::get('pacientes/{id}','PacienteController@show');
Route::post('/edita_pacientes','PacienteController@update');
Route::post('paciente/{id}','PacienteController@inativar');

Route::get('/pesquisar_paciente','ControllerUsuario@search');

