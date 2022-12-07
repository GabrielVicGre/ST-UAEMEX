<?php

require "../../Models/AlumnoCRUD.php";
require "../../Models/TutorCRUD.php";

class consultarController {
    private $model_alumno;
    private $model_tutor;

    function __construct() {
        $this->model_alumno = new AlumnoCRUD();
        $this->model_tutor = new TutorCRUD();
    }

    function listaAlumnos($match) {
        if($match == "") {
            $alumnos = $this->model_alumno->getAlumnos();
        } else {
            $alumnos = $this->model_alumno->getAlumnosMatch($match);
        }

        ?>
        <table class="table table-hover mt-3 table-bordered" >
            <thead class="text-white" style="background-color: #1ABC9C;">
                <th class="col-4">UNIP</th>
                <th class="col-8">Nombre del Alumno</th>
            </thead>
            <tbody>
                <?php
                foreach($alumnos as $alumno) {
                    ?>
                    <tr>
                        <td class="col-4"><?php echo $alumno->no_cuenta; ?></td>
                        <td class="col-8 text-center"><?php echo $alumno->nombre; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    }

    function listaTutores($match) {
        if($match == "") {
            $tutores = $this->model_tutor->getTutores();
        } else {
            $tutores = $this->model_tutor->getTutoresMatch($match);
        }

        ?>
        <table class="table table-hover table-bordered mt-3">
            <thead class="text-white" style="background-color: #1ABC9C;">
                <th class="col-4">RFC</th>
                <th class="col-8">Nombre del Tutor</th>
            </thead>
            <tbody>
                <?php
                foreach($tutores as $tutor) {
                    ?>
                    <tr>
                        <td class="col-4"><?php echo $tutor->rfc; ?></td>
                        <td class="col-8 text-center"><?php echo $tutor->nombre; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    }
}

?>