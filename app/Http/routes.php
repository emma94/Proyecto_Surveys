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
Route::get('cambioContrasena', 'UserController@verPagContrasena');
Route::post('cambioContrasena/updDataPassword','UserController@modificarContrasena');

//Rutas Encuesta
Route::get('/crearNuevaEncuesta', "EncuestaController@crearNuevaEncuestaPage");
Route::post('/crearEncuesta/guardar', "EncuestaController@crearEncuesta");
Route::get('/crearEncuesta', "EncuestaController@verCrearEncuesta");
Route::get('/miPerfil/{encuesta}/cambiarEstado', "EncuestaController@cambiarEstado");
Route::get('crearEncuesta/{encuesta}/preguntas', "EncuestaController@store");
Route::get('crearEncuesta/{encuesta}/opciones', "EncuestaController@storeOpciones");
Route::get('crearEncuesta/{encuesta}/eliminar', "EncuestaController@deletePregunta");
Route::post('crearEncuesta/{encuesta}/guardar', "EncuestaController@saveEncuesta");

//rutas envio
Route::get('/enviarEncuesta', "EnvioController@verPagEnvio");

Route::post('/enviarEncuesta/correo', "EnvioController@enviarCorreos");

//rutas llenarCuestionario
Route::get('/cuestionario/{codigo}',"CuestionarioController@verCuestionario");
Route::post('/cuestionario/{encuesta}/cambiarPagina', "CuestionarioController@cambiarPagina");

//rutas resultados
Route::get('/resultados/{encuesta}', "EncuestaController@verResultados");

//Rutas buscar historicos
Route::post('/buscar', "BuscarController@buscar");