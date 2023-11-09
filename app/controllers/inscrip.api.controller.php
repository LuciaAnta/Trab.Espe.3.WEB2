<?php
    require_once 'app/models/inscrip.model.php'
    require_once 'app/view/api.view.php'
class InscripApiController {
    private $model;
    private $view;
    public function __construct() {
        $this->model = new InscripModel();
        $this->view = new APIView();
    }

    function verInscripto {
        $inscriptos = $this->model->mostrar();
        $this->view->response($inscriptos, 200);
    }
}