<?php

require_once "../../Models/AlumnoCRUD.php";
require_once "../../Models/UsuarioIniciar.php";

class alumnoController {
    private $model;
    private $model_Usuario;

    function __construct() {
        $this->model = new AlumnoCRUD();
        $this->model_Usuario = new UsuarioIniciar();

    }

    function getAlumnoData() {
        $id_usuario = $_SESSION['id_usuario'];
        return $this->model->getAlumnoByUserId($id_usuario);
    }

    function getDatosUsuarioAlumno($id_user) {
        return $this->model_Usuario->getDatosDeUsuarioAlumno($id_user);
    }

    function getDatosTutorDeAlumno($id_user){
        return $this->model_Usuario->getDatosTutorDeAlumno($id_user);
    }
}