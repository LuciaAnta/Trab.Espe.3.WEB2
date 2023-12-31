<?php
    require_once("libs/router.php");
    require_once("app/controllers/inscrip.api.controller.php");
    require_once("app/controllers/facu.api.controller.php");

    // instancia el router
    $router = new router();

    //tabla de ruteo
    $router->addRoute("equipos", "GET", "InscripApiController", "obtenerEquipos");
    $router->addRoute("equipos", "POST", "InscripApiController", "crearEquipo");
    $router->addRoute("equipos/:ID", "GET", "InscripApiController", "obtenerEquipos");
    $router->addRoute("equipos/:ID", "PUT", "InscripApiController", "modificarEquipo");
    $router->addRoute("equipos/:ID", "DELETE", "InscripApiController", "borrarEquipo");

    $router->addRoute("facultades", "GET", "FacuApiController", "obtenerFacus");
    $router->addRoute("facultades", "POST", "FacuApiController", "crearFacu");
    $router->addRoute("facultades/:ID", "GET", "FacuApiController", "obtenerFacus");
    $router->addRoute("facultades/:ID", "PUT", "FacuApiController", "modificarFacu");
    $router->addRoute("facultades/:ID", "DELETE", "FacuApiController", "borrarFacu");

    // rutea
    $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>