<?php
session_start();
if (empty($_SESSION['usuario']) || $_SESSION['tipo_usuario'] != "Tutor") {
    header("Location: ../../index.php");
} else {
    $_SESSION['seccion_menu'] = 'perfil';
}

require_once "../../Controllers/Tutor/tutorController.php";

$id_usuario =  $_SESSION['id_usuario'];
$tutorController = new tutorController();
$datosUsuario = $tutorController->getDatosUsuarioTutor($id_usuario);

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

                <br>
                <h3 style="text-align:center;">Bienvenido al sistema tutores </h3> <br>
                <table class="table table-bordered text-center table-responsive">
                    <thead>
                        <th> Usuario</th>
                        <th> Correo </th>
                        <th> Nombre </th>
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

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>


            </main>
        </div>
    </div>


</body>

</html>