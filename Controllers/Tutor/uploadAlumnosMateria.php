<?php
session_start();

include_once("../../Models/Materia.php");
include_once("../../Models/AlumnoCRUD.php");
include_once("../../Models/TutorCRUD.php");
include_once("../../Models/AlumnoProfesor.php");

$csv = fopen($_FILES['csv_file']['tmp_name'], "r");

$model_materia = new MateriaCRUD();
$model_tutor = new TutorCRUD();
$model_alumno = new AlumnoCRUD();
$model_alumno_profesor = new AlumnoProfesorCRUD();

$materia = new Materia();
$materia->cve_materia = $_POST['cve_materia'];
$materia->materia = $_POST['materia'];
$materia->grupo = $_POST['grupo'];

$id_materia = $model_materia->createMateria($materia);

$tutor = $model_tutor->getTutorByUserId($_SESSION['id_usuario']);

//Ignora encabezados
fgetcsv($csv, 1000, ",");

while (($row = fgetcsv($csv, 1000, ",")) !== FALSE) {
    $no_cuenta = $row[2];

    try {
        $alumno = $model_alumno->getAlumnoByNoCuenta($no_cuenta);

        $model_alumno_profesor->createAlumnoProfesor($alumno->id_alumno, $tutor->id_tutor, $id_materia);
    } catch(Exception $e) {
        
    }
}

fclose($csv);

header("Location: ../../Views/Tutor/carga_alumnos.php?error=0");