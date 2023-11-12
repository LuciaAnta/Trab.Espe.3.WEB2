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
            // Obtener parámetros de orden y dirección de la solicitud
            $orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'id_equipos';
            $orderDir = isset($_GET['orderDir']) ? $_GET['orderDir'] : 'asc';
        
            // Validar que el campo de orden sea válido para prevenir SQL injection
            $allowedFields = ['id_equipos', 'nombre_del_equipo', 'id_facultad', 'deportes'];
            if (!in_array($orderBy, $allowedFields)) {
                $this->view->response("Campo de orden no válido.", 400);
                return;
            }
        
            // Validar que la dirección sea ascendente o descendente
            if ($orderDir !== 'asc' && $orderDir !== 'desc') {
                $this->view->response("Dirección de orden no válida. Use 'asc' o 'desc'.", 400);
                return;
            }
        
            if (empty($params)) {
                // Obtener la lista de equipos ordenada
                $equipos = $this->model->obtenerEquiposOrdenados($orderBy, $orderDir);
                $this->view->response($equipos, 200);
            } else {
                $equipo = $this->model->mostrarEquipo($params[':ID']);
                if (!empty($equipo)) {
                    $this->view->response($equipo, 200);
                } else {
                    $this->view->response(['msg' => 'El equipo con el id=' . $params[':ID'] . ' no existe'], 404);
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

            if (empty($_POST['nombre_del_equipo']) || empty($_POST['id_facultad']) || empty($_POST['deportes'])) {
                $this->view->response("Datos incompletos. Se requieren nombre_del_equipo, id_facultad y deportes.", 400);
                return;
            }

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
