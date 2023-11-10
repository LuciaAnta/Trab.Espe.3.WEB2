<?php
require_once 'libs/Router.php';
require_once 'app/controllers/inscrip.api.controller.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('equipo', 'GET', 'InscripApiController', 'verInscripto');
$router->addRoute('equipo', 'POST', 'InscripApiController', 'agregarInscripto');
$router->addRoute('equipo/:ID', 'PUT', 'InscripApiController', 'editarInscripto');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);