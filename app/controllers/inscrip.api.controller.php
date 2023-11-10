<?php
    require_once 'app/models/inscrip.model.php';
    require_once 'app/view/api.view.php';
    class InscripApiController {
        private $model;
        private $view;
        public function __construct() {
            $this->model = new InscripModel();
            $this->view = new APIView();
        }

        function verEquipos($params = []) {
            if (empty($params)) {
            $equipos = $this->model->mostrarEquipos();
            $this->view->response($equipos, 200);
            } else {
               $equipo = $this->model->mostrarEquipo($params[':ID']);
                if(!empty($equipo)) {
                    $this->view->response($equipo, 200);
                }
            }
        }
    }
