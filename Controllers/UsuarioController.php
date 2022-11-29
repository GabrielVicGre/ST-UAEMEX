<?php

require "../Models/UsuarioCRUD.php";

class  UsuarioController{
    private $model_usuario;

    function __construct() {
        $this->model_usuario = new UsuarioCRUD();
    }

    function getUsuarioById($id) {

    }

    function getTipoUsuario($usuario) {
        return $this->model_usuario->getTipoUsuarioById($usuario->id_tipo_usuario);
    }
}

