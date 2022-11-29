<?php

require '../../Config/connectPOO.php';
require "../../Models/Tutor.php";

class TutorCRUD {

    //CREATE
  /*  function createUsuario($usuario) {
        global $connection;

        $query = "INSERT INTO usuario VALUES (NULL, '$usuario->email', '$usuario->password', $usuario->id_tipo_usuario)";
        $connection->query($query);

        return $connection->insert_id;
    }
*/
    //REPORT
    function getTutorByUserId($id) {
        global $connection;

        $query = "SELECT * FROM tutor WHERE id_usuario = $id";
        $result = $connection->query($query);
        $tutor = $result->fetch_array(MYSQLI_ASSOC);

        $tu = new Tutor();
        $tu->id_tutor = $tutor['id_tutor'];
        $tu->nombre = $tutor['nombre'];
        $tu->rfc = $tutor['rfc'];
        $tu->id_usuario = $tutor['id_usuario'];
        $tu->id_licenciatura = $tutor['id_licenciatura'];
        return $tu;
    }

    //UPDATE

    //DELETE
}