<?php

include_once ("../../Models/TutorCRUD.php");
include_once ("../../Models/UsuarioIniciar.php");

class tutorController {
    private $model_tutor;
    private $model_Usuario;

    function __construct() {
        $this->model_Usuario = new UsuarioIniciar();
        $this->model_tutor = new TutorCRUD();
    }

    function getDatosUsuarioTutor($id_user) {
        //return $this->model_Usuario->getDatosDeUsuarioTutor($id_user);
        return $this->model_tutor->getTutorByUserId($id_user);
    }


}