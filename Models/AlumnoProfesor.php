<?php

include_once ("../../Config/connectPOO.php");
include_once("../../Models/Alumno.php");

class AlumnoProfesorCRUD {
    //CREATE
    function createAlumnoProfesor($id_alumno, $id_tutor, $id_materia) {
        global $connection;
    
        $query = "INSERT INTO alumno_profesor VALUES ($id_alumno, $id_tutor, $id_materia)";
        $connection->query($query);
    }

    //REPORT
    function getAlumnosByProfesor($id_tutor) {
        global $connection;

        $alumnos = array();

        $query = "SELECT * FROM alumno INNER JOIN alumno_profesor ON alumno.id_alumno = alumno_profesor.id_alumno WHERE alumno_profesor.id_tutor = $id_tutor";
        $result = $connection->query($query);

        if($result->num_rows == 0) {
            throw new Exception();
        }

        while ($alumno = $result->fetch_array(MYSQLI_ASSOC)) {
            $alu = new Alumno();
            $alu->id_alumno = $alumno['id_alumno'];
            $alu->nombre = $alumno['nombre'];
            $alu->no_cuenta = $alumno['no_cuenta'];
            $alu->id_usuario = $alumno['id_usuario'];
            $alu->id_licenciatura = $alumno['id_licenciatura'];
            $alu->id_tutor = $alumno['id_tutor'];
            array_push($alumnos, $alu);
        }

        return $alumnos;
    }

    //UPDATE
    //DELETE
}