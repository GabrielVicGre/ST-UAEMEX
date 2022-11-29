<?php

require_once "../../Models/AlumnoCRUD.php";
require_once "../../Models/EntregaCRUD.php";
require_once "../../Models/TutorCRUD.php";

class estatusController {
    private $model_alumno;
    private $model_entrega;
    private $model_tutor;

    function __construct(){
        $this->model_alumno = new AlumnoCRUD();
        $this->model_entrega = new EntregaCRUD();
        $this->model_tutor = new TutorCRUD();
    }

    function getAlumnos() {
        $tutor = $this->model_tutor->getTutorByUserId($_SESSION['id_usuario']);
        $alumnos = $this->model_alumno->getAlumnosByTutor($tutor->id_tutor);

        return $alumnos;
    }
}