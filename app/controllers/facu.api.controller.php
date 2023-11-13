<?php
    require_once 'app/controllers/api.controller.php';
    require_once 'app/models/facu.model.php';
    require_once 'app/view/api.view.php';

    class FacuApiController extends ApiController {
        private $model;
        public function __construct() {
            parent:: __construct();
            $this->model = new FacuModel();
        }

        function obtenerFacus($params = []) {
            $campoOrden = isset($_GET['sort']) ? $_GET['sort'] : null;
            $direccionOrden = isset($_GET['order']) ? $_GET['order'] : null;
    
            if (empty($params)) {
                $facultades = $this->model->mostrarFacus($campoOrden, $direccionOrden);
                $this->view->response($facultades, 200);
            } else {
                $facultad = $this->model->mostrarFacu($params[':ID']);
                if (!empty($facultad)) {
                    $this->view->response($facultad, 200);
                } else {
                    $this->view->response(['msg' => 'La facultad con el id=' . $params[':ID'] . ' no existe'], 404);
                }
            }
        }
        

        function borrarFacu($params = []) {
            $id = $params[':ID'];
            $facultad = $this->model->mostrarFacu($params[':ID']);

            if($facultad) {
                $this->model->eliminarFacu($id);
                $this->view->response('La facultad con id:'.$id.' ha sido elminada.', 200);
            } else {
                $this->view->response('La facultad con id:' .$id.' no existe', 404);
            }
        }

        function crearFacu($params = []) {
            $body = $this->getData();
        
            if (empty($body->nombre_facultad) || empty($body->descripcion) || empty($body->fundacion)) {
                $this->view->response("Datos incompletos. Se requieren nombre_facultad, descripcion y fundacion.", 400);
                return;
            }
        
            $nombre_facultad = $body->nombre_facultad;
            $descripcion = $body->descripcion;
            $fundacion = $body->fundacion;
        
            $id = $this->model->insertarFacu($nombre_facultad, $descripcion, $fundacion);
        
            $this->view->response("La facultad fue insertada con el id=".$id, 201);
        }
        
        function modificarFacu($params = []) {
            $id = $params[':ID'];
            $facultad = $this->model->mostrarFacu($id);

            if($facultad) {
                $body = $this->getData();

                $nombre_facultad = $body->nombre_facultad;
                $descripcion = $body->descripcion;
                $fundacion = $body->fundacion;
    
                $this->model->updateFacuData($id, $nombre_facultad, $descripcion, $fundacion);

                $this->view->response('La facultad con id:'.$id.' ha sido modificada.', 200);
            } else {
                $this->view->response('La facultad con id:'.$id.' no existe.', 404);
            }
        }
    }