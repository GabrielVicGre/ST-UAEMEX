<?php
session_start();
if (empty($_SESSION['usuario']) || $_SESSION['tipo_usuario'] != "Tutor") {
    header("Location: ../../index.php");
} else {
    $_SESSION['seccion_menu'] = 'status';
}
$ruta =  $_SERVER['DOCUMENT_ROOT'];
require_once $ruta."/Controllers/Tutor/estatusController.php";
require_once $ruta."/Controllers/Alumno/actividadesController.php";
require_once $ruta."/Controllers/Alumno/entregaController.php";
require_once $ruta."/Views/Graphics/PercentBar.php";

$controller_estatus = new estatusController();
$controller_actividades = new actividadesController();
$controller_entrega = new entregaController();

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
                    <h4 class="h5">Status</h4>
                    <?php include "layouts/user-layout.php"; ?>

                </div>
                <div class="p-5" id="accordion">
                    <?php
                    $alumnos = $controller_estatus->getAlumnos();

                    $count = 0;
                    foreach ($alumnos as $alumno) {
                    ?>
                        <div class="card">
                            <div class="card-header" id="heading<?php echo $count; ?>">
                                <h5 class="mb-0">
                                    <button class="btn container" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $count; ?>" aria-expanded="false" aria-controls="collapse<?php echo $count; ?>">
                                        <div class=row>
                                            <div class="col-3"><?php echo $alumno->no_cuenta; ?></div>
                                            <div class="col-3"><?php echo $alumno->nombre; ?></div>
                                            <div class="col-6">
                                                <?php
                                                $progress = new PercentBar($controller_actividades->getEntregaRate($alumno->id_alumno));
                                                $progress->display();
                                                ?>
                                            </div>
                                        </div>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse<?php echo $count; ?>" class="collapse" aria-labelledby="heading<?php echo $count; ?>">
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <?php
                                        $actividades = $controller_actividades->getActividadesByAlumno($alumno->id_alumno);

                                        foreach ($actividades as $actividad) {
                                        ?>
                                            <tr>
                                                <td><?php echo $actividad->clave_actividad; ?></td>
                                                <td class="text-truncate">
                                                    <?php echo $actividad->desc_actividad; ?>
                                                </td>
                                                <td class="col-1">
                                                    <?php
                                                    $status = $controller_actividades->getStatus($actividad->id_actividad, $alumno->id_alumno);

                                                    if ($status == true) {
                                                    ?>
                                                        <i class="bi bi-check-square"></i>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <i class="bi bi-square"></i>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        <?php
                        $count++;
                    }
                        ?>
                        </div>
            </main>
        </div>
    </div>



</body>

</html>