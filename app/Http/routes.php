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



Route::get('/', "PagesController@inicio");
Route::get('/acerca', "PagesController@acerca");
Route::get('/iniciarSesion', "PagesController@iniciarSesion");

Route::auth();



//usuario rutas
Route::get('miPerfil', 'UserController@verPerfil');
Route::post('miperfil/updData','UserController@modificarDatos');

//Rutas Encuesta
Route::get('/crearEncuesta', "EncuestaController@verCrearEncuesta");