<?php

class InscripModel
{
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe;charset=utf8', 'root', '');
    }

    //Lista de equipos por orden

    function mostrarEquipos($campoOrden = null, $direccionOrden = null) {
        $query = 'SELECT * FROM equipos';

        if ($campoOrden && $direccionOrden) {
            $query .= ' ORDER BY ' . $campoOrden . ' ' . $direccionOrden;
        }

        $statement = $this->db->prepare($query);
        $statement->execute();

        $equipos = $statement->fetchAll(PDO::FETCH_OBJ);

        return $equipos;
    }

    function mostrarEquipo($id) {
        $query = $this->db->prepare('SELECT * FROM equipos WHERE id_equipos = ?');
        $query->execute([$id]);

        // equipo es un equipo solo
        $equipo = $query->fetch(PDO::FETCH_OBJ);

        return $equipo;
    }

    // Inserta equipos en la base de datos
    function insertarEquipo($nombre_del_equipo, $facultad, $deporte)
    {
        $query = $this->db->prepare('INSERT INTO equipos(`nombre_del_equipo`, `id_facultad`, `deportes`) VALUES (?,?,?)');
        $query->execute([$nombre_del_equipo, $facultad, $deporte]);

        //se inserta id para mostrar el ultimo id cargado.
        return $this->db->lastInsertId();
    }

    /* Elimina equipo segun su ID */
    function eliminarEquipo($id)
    {
        $query = $this->db->prepare('DELETE FROM equipos WHERE id_equipos = ?');
        $query->execute([$id]);
    }
    /* Modifica un equipo dado su ID*/
    function updateInscripto($id)
    {
        $query = $this->db->prepare('UPDATE equipos SET finalizada = 1 WHERE id_equipos = ?');
        $query->execute([$id]);
    }
    
    function updateInscriptoData($id, $nombre_del_equipo, $id_facultad, $deportes) {
        $query = $this->db->prepare('UPDATE equipos SET nombre_del_equipo = ?, id_facultad = ?, deportes = ? WHERE id_equipos = ?');
        $query->execute([$nombre_del_equipo, $id_facultad, $deportes, $id]);
    }


}
