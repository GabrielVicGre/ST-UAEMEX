<?php

include_once ("../../Config/connectPOO.php");

class Materia {
    public $id_materia;
    public $cve_materia;
    public $materia;
    public $grupo;
}

class MateriaCRUD {
    //CREATE
    function createMateria($materia) {
        global $connection;
    
        $query = "INSERT INTO materia VALUES (NULL,'$materia->cve_materia', '$materia->materia', '$materia->grupo')";
        $connection->query($query);

        return $connection->insert_id;
    }

    //REPORT
    function getMateriaById($id) {
        global $connection;
    
        $query = "SELECT * FROM materia WHERE id_materia = $id";
        $result = $connection->query($query);
        $materia = $result->fetch_array(MYSQLI_ASSOC);

        $mat = new Materia;
        $mat->id_materia = $materia['id_materia'];
        $mat->cve_materia = $materia['cve_materia'];
        $mat->materia = $materia['materia'];
        $mat->grupo = $materia['grupo'];

        return $mat;
    }

    //UPDATE

    //DELETE
}