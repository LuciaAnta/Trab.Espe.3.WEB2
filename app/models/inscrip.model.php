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
    function insertarInscripto($nombre_del_equipo, $facultad, $deporte)
    {
        $query = $this->db->prepare('INSERT INTO equipos(`nombre_del_equipo`, `id_facultad`, `deportes`) VALUES (?,?,?)');
        $query->execute([$nombre_del_equipo, $facultad, $deporte]);

        //se inserta id para mostrar el ultimo id cargado.
        return $this->db->lastInsertId();
    }

    /* Elimina inscripto segun su ID */
    function eliminarInscripto($id)
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
}
