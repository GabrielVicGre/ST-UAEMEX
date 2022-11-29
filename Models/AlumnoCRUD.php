<?php
require '../../Config/connectPOO.php';
require "../../Models/Alumno.php";

class AlumnoCRUD {
    // CREATE
    function createAlumno($alumno) {
        global $connection;

        $query = "INSERT INTO alumno VALUES (NULL, '$alumno->nombre', '$alumno->no_cuenta', $alumno->id_usuario, $alumno->id_licenciatura)";
        $connection->query($query);
    }

    // REPORT
    function getAlumnoById($id) {
        global $connection;

        $query = "SELECT * FROM alumno WHERE id_alumno = $id";
        $result = $connection->query($query);
        $alumno = $result->fetch_array(MYSQLI_ASSOC);

        $alu = new Alumno();
        $alu->id_alumno = $alumno['id_alumno'];
        $alu->nombre = $alumno['nombre'];
        $alu->no_cuenta = $alumno['no_cuenta'];
        $alu->id_usuario = $alumno['id_usuario'];
        $alu->id_licenciatura = $alumno['id_licenciatura'];

        return $alu;
    }

    function getAlumnos() {
        global $connection;

        $alumnos = array();

        $query = "SELECT * FROM alumno";
        $result = $connection->query($query);
        while($alumno = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($alumnos, $alumno);
        }

        return $alumnos;
    }

    function getAlumnoByUserId($id_usuario) {
        global $connection;

        $query = "SELECT * FROM alumno WHERE id_usuario = $id_usuario";
        $result = $connection->query($query);
        $alumno = $result->fetch_array(MYSQLI_ASSOC);

        $alu = new Alumno();
        $alu->id_alumno = $alumno['id_alumno'];
        $alu->nombre = $alumno['nombre'];
        $alu->no_cuenta = $alumno['no_cuenta'];
        $alu->id_usuario = $alumno['id_usuario'];
        $alu->id_licenciatura = $alumno['id_licenciatura'];

        return $alu;
    }

    function getAlumnosByTutor($id_tutor) {
        global $connection;
    
        $alumnos = array();
    
        $query = "SELECT * FROM alumno WHERE id_tutor = $id_tutor";
        $result = $connection->query($query);
        while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($alumnos, $this->getAlumnoById($row['id_alumno']));
        }
    
        return $alumnos;
    }

    // UPDATE

    // DELETE
}