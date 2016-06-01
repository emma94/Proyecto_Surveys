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

//login facebook rutas
//Route::get('/registerRedirect', 'SocialAuthController@registerRedirect');
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');


//usuario rutas
Route::get('miPerfil', 'UserController@verPerfil');
Route::post('miperfil/updData','UserController@modificarDatos');
Route::get('cambioContrasena', 'UserController@verPagContraseña');
Route::post('cambioContrasena/updDataPassword','UserController@modificarContraseña');

//Rutas Encuesta
Route::get('/crearNuevaEncuesta', "EncuestaController@crearNuevaEncuesta");
Route::get('/crearEncuesta', "EncuestaController@verCrearEncuesta");
Route::get('crearEncuesta/{encuesta}/preguntas', "EncuestaController@store");
Route::get('crearEncuesta/{encuesta}/opciones', "EncuestaController@storeOpciones");
Route::get('crearEncuesta/{encuesta}/eliminar', "EncuestaController@deletePregunta");
Route::post('crearEncuesta/{encuesta}/guardar', "EncuestaController@saveEncuesta");

//rutas envio
Route::get('/enviarEncuesta', "EnvioController@verPagEnvio");
