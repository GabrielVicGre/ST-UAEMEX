<?php

session_start();
if (empty($_SESSION['usuario']) || $_SESSION['tipo_usuario'] != "Administrador") {
    header("Location: ../../index.php");
} else {
    $_SESSION['seccion_menu'] = 'plan_trabajo';
}

require "../../Controllers/Administrador/actividadesController.php";
$controller = new actividadesController();
if (isset($_POST['add'])) {
    $controller->addActividad();
}
if (isset($_POST['update'])) {
    $controller->editActividad();
}
if (isset($_GET['delete'])) {
    $controller->deleteActividad();
}

?>

<!DOCTYPE html>
<html>

<head>
    <?php include 'layouts/head-layout.php'; ?>
    <style>
        .btn-editar,.btn-guardar {
            background-color: #BEA52A;
            border-radius: 10px;
            color: white;
            border: none;
        }
        .btn-editar:hover, .btn-guardar:hover {
            background-color: #AA934C;
            color: white;          
        }
        .btn-borrar {
            background-color: #839192;
            border-radius: 10px;
            color: white;
            border: none;
        }
        .btn-borrar:hover {
            background-color: #99A3A4;
            color: white;          
        }

    </style>
</head>

<body>
    <?php include 'layouts/header-layout.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <?php include 'layouts/menu-layout.php'; ?>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4 class="h5">Actividades</h4>
                    <?php include "layouts/user-layout.php"; ?>

                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-4 col-lg-3">
                            <?php
                            $action = isset($_GET['action']) ? $_GET['action'] : "new";

                            switch ($action) {
                                case "new":
                                    include "forms/new_actividad_form.php";
                                    break;
                                case "edit":
                                    include "forms/edit_actividad_form.php";
                                    break;
                                case "cancel":
                                default:
                                    header("Location: ../../Views/Administrador/actividades.php?action=new");
                            }
                            ?>
                        </div>

                        <div class="col-12 col-sm-8 col-lg-9">
                            <div class="p-3 bg-light">
                                <h6 class="pb-4">Actividades Registradas</h6>
                                <table class="table table-bordered text-center table-responsive">
                                    <thead class="bg-secondary text-white">
                                        <th> Clave</th>
                                        <th> Descripción </th>
                                        <th> Fecha </th>
                                        <th colspan="2"> Opciones</th>
                                    </thead>
                                    <?php
                                    $acts = $controller->listActividades();

                                    foreach ($acts as &$act) {
                                    ?>
                                        <tr>
                                            <form action="Views/Administrador/actividades.php" method="GET">
                                                <td><?php echo $act['clave_actividad']; ?></td>
                                                <td class="long">
                                                    <p class="clamp"><?php echo $act['desc_actividad']; ?></p>
                                                </td>
                                                <td><?php echo date_format(date_create($act['fecha_alta']), "d-m-Y"); ?></td>
                                                <td colspan="2">
                                                    <button class="btn btn-editar btn-sm submit-btn" type="submit" name="action" value="edit">
                                                        Editar <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </button>

                                                    <button class="btn btn-borrar btn-sm submit-btn" type="submit" name="delete" value="delete">
                                                        Borrar<i class="fa fa-times" aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                                <input type="hidden" name="id_actividad" value="<?php echo $act['id_actividad']; ?>">
                                            </form>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                                <a class="btn btn-sm btn-success mt-1" href="Views/Administrador/plan_trabajo.php?id_licenciatura=1">Regresar <i class="bi bi-arrow-left-circle mx-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </main>

        </div>
    </div>

</body>


</html>