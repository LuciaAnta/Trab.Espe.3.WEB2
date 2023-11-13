<?php

class FacuModel
{
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe;charset=utf8', 'root', '');
    }

    //Lista de facultades por orden

    function mostrarFacus($campoOrden = null, $direccionOrden = null) {
        $query = 'SELECT * FROM facultades';

        if ($campoOrden && $direccionOrden) {
            $query .= ' ORDER BY ' . $campoOrden . ' ' . $direccionOrden;
        }

        $statement = $this->db->prepare($query);
        $statement->execute();

        $facultades = $statement->fetchAll(PDO::FETCH_OBJ);

        return $facultades;
    }

    function mostrarFacu($id) {
        $query = $this->db->prepare('SELECT * FROM facultades WHERE id_facultades = ?');
        $query->execute([$id]);

        // equipo es un equipo solo
        $facultad = $query->fetch(PDO::FETCH_OBJ);

        return $facultad;
    }

    // Inserta equipos en la base de datos
    function insertarFacu($nombre_facultad, $descripcion, $fundacion)
    {
        $query = $this->db->prepare('INSERT INTO facultades(`nombre_facultad`, `descripcion`, `fundacion`) VALUES (?,?,?)');
        $query->execute([$nombre_facultad, $descripcion, $fundacion]);

        //se inserta id para mostrar el ultimo id cargado.
        return $this->db->lastInsertId();
    }

    /* Elimina equipo segun su ID */
    function eliminarFacu($id)
    {
        $query = $this->db->prepare('DELETE FROM facultades WHERE id_facultades = ?');
        $query->execute([$id]);
    }
    /* Modifica un equipo dado su ID*/
    function updateFacu($id)
    {
        $query = $this->db->prepare('UPDATE facultades SET finalizada = 1 WHERE id_facultad = ?');
        $query->execute([$id]);
    }
    
    function updateFacuData($id, $nombre_facultad, $descripcion, $fundacion) {
        $query = $this->db->prepare('UPDATE facultades SET nombre_facultad = ?, descripcion = ?, fundacion = ? WHERE id_facultades = ?');
        $query->execute([$nombre_facultad, $descripcion, $fundacion, $id]);
    }


}