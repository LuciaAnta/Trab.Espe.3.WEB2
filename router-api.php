<?php
    require_once("libs/router.php");
    require_once("app/controllers/inscrip.api.controller.php");

    // instancia el router
    $router = new router();

    // arma la tabla de ruteo
    $router->addRoute("equipos", "GET", "InscripApiController", "verEquipos");
    $router->addRoute("equipos/:ID", "GET", "InscripApiController", "verEquipos");

    // rutea
    $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>