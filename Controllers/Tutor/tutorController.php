<?php
$ruta =  $_SERVER['DOCUMENT_ROOT'];

include_once ($ruta."/Models/UsuarioIniciar.php");

class tutorController {
    private $model;
    private $model_Usuario;

    function __construct() {
        $this->model_Usuario = new UsuarioIniciar();
    }

    function getDatosUsuarioTutor($id_user) {
        return $this->model_Usuario->getDatosDeUsuarioTutor($id_user);
    }
}