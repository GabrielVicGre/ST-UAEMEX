<?php
$ruta =  $_SERVER['DOCUMENT_ROOT'];

include_once ($ruta."/Models/AlumnoCRUD.php");
include_once ($ruta."/Models/UsuarioIniciar.php");

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