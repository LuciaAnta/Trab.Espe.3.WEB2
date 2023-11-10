<?php
require_once 'libs/Router.php';
require_once 'app/controllers/inscrip.api.controller.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('inscripto', 'GET', 'InscripApiController', 'verInscripto');
$router->addRoute('inscripto', 'POST', 'InscripApiController', 'agregarInscripto');
$router->addRoute('inscripto/:ID', 'PUT', 'InscripApiController', 'editarInscripto');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
