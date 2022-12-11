<?php
$ruta =  $_SERVER['DOCUMENT_ROOT'];

include_once ($ruta."/Config/connectPOO.php");
include_once ($ruta."/Models/Tutor.php");

class TutorCRUD {

    //CREATE
    function createTutor($tutor) {
        global $connection;

        $query = "INSERT INTO tutor VALUES(NULL, '$tutor->nombre', '$tutor->rfc', $tutor->id_usuario, $tutor->id_licenciatura)";
        $connection->query($query);
    }

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

    function getTutorByRfc($rfc) {
        global $connection;

        $query = "SELECT * FROM tutor WHERE rfc = '$rfc'";
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

    function getTutores() {
        global $connection;

        $tutores = array();

        $query = "SELECT * FROM tutor";
        $result = $connection->query($query);
        while($tutor = $result->fetch_array(MYSQLI_ASSOC)) {
            $tu = new Tutor();
            $tu->id_tutor = $tutor['id_tutor'];
            $tu->nombre = $tutor['nombre'];
            $tu->rfc = $tutor['rfc'];
            $tu->id_usuario = $tutor['id_usuario'];
            $tu->id_licenciatura = $tutor['id_licenciatura'];
            array_push($tutores, $tu);
        }

        return $tutores;
    }

    function getTutoresMatch($match) {
        global $connection;

        $tutores = array();

        $query = "SELECT * FROM tutor WHERE nombre LIKE '%$match%' OR rfc LIKE '%$match%'";
        $result = $connection->query($query);
        while($tutor = $result->fetch_array(MYSQLI_ASSOC)) {
            $tu = new Tutor();
            $tu->id_tutor = $tutor['id_tutor'];
            $tu->nombre = $tutor['nombre'];
            $tu->rfc = $tutor['rfc'];
            $tu->id_usuario = $tutor['id_usuario'];
            $tu->id_licenciatura = $tutor['id_licenciatura'];
            array_push($tutores, $tu);
        }

        return $tutores;
    }

    function getTutoresByLicenciatura($id_lic) {
        global $connection;

        $tutores = array();

        $query = "SELECT * FROM tutor WHERE id_licenciatura = $id_lic";
        $result = $connection->query($query);
        while($tutor = $result->fetch_array(MYSQLI_ASSOC)) {
            $tu = new Tutor();
            $tu->id_tutor = $tutor['id_tutor'];
            $tu->nombre = $tutor['nombre'];
            $tu->rfc = $tutor['rfc'];
            $tu->id_usuario = $tutor['id_usuario'];
            $tu->id_licenciatura = $tutor['id_licenciatura'];
            array_push($tutores, $tu);
        }

        return $tutores;
    }

    //UPDATE

    //DELETE
}