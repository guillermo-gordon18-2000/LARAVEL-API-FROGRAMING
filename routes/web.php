<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/Login',['uses'=>'FrogramingController@Loguear']);

$router->get('/Principal/{usuarioid}',['uses'=>'FrogramingController@UltimaSesion']);

$router->get('/EliminarUsuario/{usuarioid}',['uses'=>'FrogramingController@EliminarUsuario']);

$router->post('/Registro',['uses'=>'FrogramingController@Registro']);

$router->get('/Perfil/{usuarioid}',['uses'=>'FrogramingController@ObtenerPerfil']);

$router->put('/Perfil',['uses'=>'FrogramingController@GuardarPerfil']);

$router->get('/Leccion/{temaid}',['uses'=>'FrogramingController@Leccion']);

$router->get('/LeccionCuentos/{temaid}',['uses'=>'FrogramingController@LeccionCuento']);

$router->get('/Tema',['uses'=>'FrogramingController@SeleccionTema']);

$router->get('/Preguntas/{temaid}',['uses'=>'FrogramingController@ObtenerPreguntas']);

$router->get('PreguntasPareo/{temaid}',['uses'=>'FrogramingController@ObtenerPareo']);

$router->post('/Partida', ['uses'=>'FrogramingController@GuardarPartida']);

$router->get('/Ranking/{temaid}/{tipo}',['uses'=>'FrogramingController@ObtenerRanking']);
