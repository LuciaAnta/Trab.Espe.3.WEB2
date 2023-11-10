<?php
<<<<<<< HEAD
    require_once 'app/models/inscrip.model.php';
    require_once 'app/view/api.view.php';
class InscripApiController {
=======
require_once 'app/models/inscrip.model.php';
require_once 'app/view/api.view.php';
class InscripApiController
{
>>>>>>> 32af6421dee1b62c9c9a51260e15e6098accbc60
    private $model;
    private $view;
    public function __construct()
    {
        $this->model = new InscripModel();
        $this->view = new APIView();
    }

<<<<<<< HEAD
    function verInscripto($params = []) {
        $equipos = $this->model->mostrar();
        $this->view->response($equipos, 200);
=======
    function verInscripto()
    {
        $inscriptos = $this->model->mostrar();
        $this->view->response($inscriptos, 200);
>>>>>>> 32af6421dee1b62c9c9a51260e15e6098accbc60
    }
}
