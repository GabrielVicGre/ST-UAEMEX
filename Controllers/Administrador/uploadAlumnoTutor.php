<?php
session_start();

require "../../Models/AlumnoCRUD.php";
require "../../Models/TutorCRUD.php";

$csv = fopen($_FILES['csv_file']['tmp_name'], "r");

$model_alumno = new AlumnoCRUD();
$model_tutor = new TutorCRUD();

//Ignora encabezados
fgetcsv($csv, 1000, ",");

while (($row = fgetcsv($csv, 1000, ",")) !== FALSE) {
    $rfc = $row[5];
    $no_cuenta = $row[2];

    $alumno = $model_alumno->getAlumnoByNoCuenta($no_cuenta);
    $tutor = $model_tutor->getTutorByRfc($rfc);

    $alumno->id_tutor = $tutor->id_tutor;

    $model_alumno->updateAlumnoTutor($alumno->id_alumno, $alumno->id_tutor);
}

fclose($csv);

header("Location: ../../Views/Administrador/cargar_informacion.php?tab=alumno-tutor&error=0");