<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once 'vendor/autoload.php';
require_once 'clases/AccesoDatos.php';
require_once 'clases/productoApi.php';



$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

/*
¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/

$app = new \Slim\App(["settings" => $config]);
$app->add(function($request, $response, $next){
  $response = $next($request, $response);

  return $response
              ->withHeader('Access-Control-Allow-Origin', '*')
              ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
              ->withHeader('Access-Control-Allow-Methods', 'GET, POST, DELETE');
});


$app->get('/', function (Request $request, Response $response) {    
  $response->getBody()->write("Bienvenido al sistema de Helados!!!");
  return $response;

});

$app->group('/productos', function () {

     
     $this->post('/alta', \productoApi::class . ':CargarUno');
     $this->get('/', \productoApi::class . ':traerTodos');
     $this->get('/busqueda/{descripcion}', \productoApi::class . ':traerUno');
     $this->delete('/borrar/{id}', \productoApi::class . ':BorrarUno');
     $this->post('/modificar', \productoApi::class . ':modificarUno');

 });

$app->run();