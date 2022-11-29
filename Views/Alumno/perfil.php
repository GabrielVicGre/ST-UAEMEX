<?php

session_start();
if (empty($_SESSION['usuario']) || $_SESSION['tipo_usuario'] != "Alumno") {
    header("Location: ../../index.php");
} else {
    $_SESSION['seccion_menu'] = 'perfil';
}

require_once "../../Controllers/Alumno/alumnoController.php";

$id_usuario =  $_SESSION['id_usuario'];
$alumnoController = new alumnoController();
$datosUsuario = $alumnoController->getDatosUsuarioAlumno($id_usuario);

?>

<!DOCTYPE html>
<html>

<head>
    <?php include 'layouts/head-layout.php'; ?>
</head>

<body>
    <?php include "layouts/header-layout.php"; ?>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <?php include 'layouts/menu-layout.php'; ?>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4 class="h5">Perfil</h4>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                Share
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                Export
                            </button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar" class="align-text-bottom"></span>
                            This week
                        </button>
                    </div>
                </div>

                <div class="card p-5">
                    <h5 class="text-center">Bienvenido al sistema para Alumnos </h5>
                    <table class="mt-3 table table-bordered text-center table-responsive tabla_alumno_index">
                        <thead class="bg-light">
                            <th> Usuario</th>
                            <th> Correo </th>
                            <th> Nombre </th>
                            <th> No. Cuenta </th>
                            <th> Licenciatura </th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($datosUsuario as $datos) {
                            ?>
                                <tr>
                                    <td><?php echo $datos['tipo']; ?></td>
                                    <td>
                                        <p><?php echo $datos['email']; ?></p>
                                    </td>
                                    <td><?php echo $datos['nombre']; ?></td>
                                    <td><?php echo $datos['no_cuenta']; ?></td>
                                    <td><?php echo $datos['licenciatura']; ?></td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

</body>

</html>