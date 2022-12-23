<?php

include_once("../../Models/AlumnoProfesor.php");
include_once ("../../Models/AlumnoCRUD.php");
include_once ("../../Models/EntregaCRUD.php");
include_once ("../../Models/TutorCRUD.php");

class estatusAlumnosController {
    private $model_alumno_profesor;
    private $model_alumno;
    private $model_entrega;
    private $model_tutor;

    function __construct(){
        $this->model_alumno_profesor = new AlumnoProfesorCRUD();
        $this->model_alumno = new AlumnoCRUD();
        $this->model_entrega = new EntregaCRUD();
        $this->model_tutor = new TutorCRUD();
    }

    function getAlumnos() {
        try{
            $tutor = $this->model_tutor->getTutorByUserId($_SESSION['id_usuario']);
            $alumnos = $this->model_alumno_profesor->getAlumnosByProfesor($tutor->id_tutor);

            return $alumnos;
        } catch(Exception $e) {
            return array();
        }
    }
}