<?php

class InscripModel
{
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe;charset=utf8', 'root', '');
    }

    //Obtiene la lista de Inscriptos y la muestra. 

    function mostrarEquipos() {
        $query = $this->db->prepare('SELECT * FROM  equipos');
        $query->execute();

        // equipos es un arreglo de Equipos
        $equipos = $query->fetchAll(PDO::FETCH_OBJ);

        return $equipos;
    }
    function mostrarEquipo($id) {
        $query = $this->db->prepare('SELECT * FROM equipos WHERE id_equipos = ?');
        $query->execute([$id]);

        // equipo es un equipo solo
        $equipo = $query->fetch(PDO::FETCH_OBJ);

        return $equipo;
    }

    // Inserta inscriptos en la base de datos
    function insertarEquipo($nombre_del_equipo, $facultad, $deporte)
    {
        $query = $this->db->prepare('INSERT INTO equipos(`nombre_del_equipo`, `id_facultad`, `deportes`) VALUES (?,?,?)');
        $query->execute([$nombre_del_equipo, $facultad, $deporte]);

        //se inserta id para mostrar el ultimo id cargado.
        return $this->db->lastInsertId();
    }

    /* Elimina inscripto segun su ID */
    function eliminarEquipo($id)
    {
        $query = $this->db->prepare('DELETE FROM equipos WHERE id_equipos = ?');
        $query->execute([$id]);
    }
    /* Modifica un inscripto dado su ID*/
    function updateInscripto($id)
    {
        $query = $this->db->prepare('UPDATE equipos SET finalizada = 1 WHERE id_equipos = ?');
        $query->execute([$id]);
    }
    function updateInscriptoData($id, $nombre_del_equipo, $id_facultad, $deportes) {
        $query = $this->db->prepare('UPDATE equipos SET nombre_del_equipo = ?, id_facultad = ?, deportes = ? WHERE id_equipos = ?');
        $query->execute([$nombre_del_equipo, $id_facultad, $deportes, $id]);
    }

    // En tu modelo (por ejemplo, InscripModel.php)
function obtenerEquiposOrdenados($orderBy, $orderDir) {
    // Validar que el campo de orden sea válido para prevenir SQL injection
    $allowedFields = ['id_equipos', 'nombre_del_equipo', 'id_facultad', 'deportes'];
    if (!in_array($orderBy, $allowedFields)) {
        // Puedes decidir si lanzar una excepción, registrar un mensaje de error, o manejarlo de alguna otra manera
        return [];
    }

    // Validar que la dirección sea ascendente o descendente
    if ($orderDir !== 'asc' && $orderDir !== 'desc') {
        // Puedes decidir cómo manejar esta situación de dirección no válida
        return [];
    }

    $query = $this->db->prepare("SELECT * FROM equipos ORDER BY $orderBy $orderDir");
    $query->execute();

    // Obtener los equipos ordenados
    $equipos = $query->fetchAll(PDO::FETCH_OBJ);

    return $equipos;
}

}
