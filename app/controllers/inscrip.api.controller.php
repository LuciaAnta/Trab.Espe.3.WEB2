<?php
    require_once 'app/controllers/api.controller.php';
    require_once 'app/models/inscrip.model.php';
    require_once 'app/view/api.view.php';

    class InscripApiController extends ApiController {
        private $model;
        public function __construct() {
            parent:: __construct();
            $this->model = new InscripModel();
        }

        function obtenerEquipos($params = []) {
            if (empty($params)) {
            $equipos = $this->model->mostrarEquipos();
            $this->view->response($equipos, 200);
            } else {
               $equipo = $this->model->mostrarEquipo($params[':ID']);
                if(!empty($equipo)) {
                    $this->view->response($equipo, 200);
                } else {
                    $this->view->response(['msg' => 'El equipo con el id=' .$params[':ID'].' no existe'], 404);
                }
            }
        }

        function borrarEquipo($params = []) {
            $id = $params[':ID'];
            $equipo = $this->model->mostrarEquipo($params[':ID']);

            if($equipo) {
                $this->model->eliminarEquipo($id);
                $this->view->response('El equipo con id:'.$id.' ha sido elminado.', 200);
            } else {
                $this->view->response('El equipo con id:' .$id.' no existe', 404);
            }
        }

        function crearEquipo($params = []) {
            $body = $this->getData();

            $nombre_del_equipo = $body->nombre_del_equipo;
            $id_facultad = $body->id_facultad;
            $deportes = $body->deportes;

            $id = $this->model->insertarEquipo($nombre_del_equipo, $id_facultad, $deportes);

            $this->view->response("El equipo fue insertado con el id=".$id, 201);
        }
        
        function modificarEquipo($params = []) {
            $id = $params[':ID'];
            $equipo = $this->model->mostrarEquipo($id);

            if($equipo) {
                $body = $this->getData();

                $nombre_del_equipo = $body->nombre_del_equipo;
                $id_facultad = $body->id_facultad;
                $deportes = $body->deportes;
    
                $this->model->updateInscriptoData($id, $nombre_del_equipo, $id_facultad, $deportes);

                $this->view->response('El equipo con id:'.$id.' ha sido modificado.', 200);
            } else {
                $this->view->response('El equipo con id:'.$id.' no existe.', 404);
            }
        }
    }
