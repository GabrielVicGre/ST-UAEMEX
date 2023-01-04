<?php
session_start();

include_once("../../Models/GrupoCRUD.php");
include_once("../../Models/TutorCRUD.php");
include_once("../../Models/AlumnoCRUD.php");
include_once("../../Models/AlumnosInscritosCRUD.php");


$model_grupo = new GrupoCRUD();
$model_tutor = new TutorCRUD();
$model_alumno = new AlumnoCRUD();
$model_alumnos_inscritos = new AlumnosInscritosCRUD();

/*


*/
/*
include_once("../../Models/Materia.php");
$model_materia = new MateriaCRUD();

$materia = new Materia();
$materia->cve_materia = $_POST['cve_materia'];
$materia->materia = $_POST['materia'];
$materia->grupo = $_POST['grupo'];

$id_materia = $model_materia->createMateria($materia);


*/

$csv = fopen($_FILES['csv_file']['tmp_name'], "r");


$tutor = $model_tutor->getTutorByUserId($_SESSION['id_usuario']);
$id_materia = $_POST['id_materia'];
$grupo = $_POST['grupo'];

$id_grupo = $model_grupo->createNewGroupAndReturnId($grupo,$tutor->id_tutor,$id_materia);

//Ignora encabezados
fgetcsv($csv, 1000, ",");

while (($row = fgetcsv($csv, 1000, ",")) !== FALSE) {
    $no_cuenta = $row[0];
    //try {
        $alumno = $model_alumno->getAlumnoByNoCuenta($no_cuenta);
        $model_alumnos_inscritos->createNewgroupRegistration($alumno->id_alumno,$id_grupo);
    /*} catch(Exception $e) {
        
    }*/
}

fclose($csv);

header("Location: ../../Views/Tutor/nuevo_grupo.php?msg=0");