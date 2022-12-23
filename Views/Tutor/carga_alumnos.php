<?php

session_start();
if (empty($_SESSION['usuario']) || $_SESSION['tipo_usuario'] != "Tutor") {
    header("Location: ../../index.php");
} else {
    $_SESSION['seccion_menu'] = 'carga_alumnos';
}

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
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4 class="h5">Carga de alumnos</h4>
                    <?php include "layouts/user-layout.php"; ?>

                </div>
                <div class="container p-4">
                    <?php $id = 0; ?>
                    <form id="drag-and-drop-form-<?php echo $id; ?>" enctype="multipart/form-data"
                        action="Controllers/Tutor/uploadAlumnosMateria.php" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-2">
                                        <label class="form-label">Clave de materia</label>
                                        <input class="form-control" type="text" name="cve_materia" maxlength="10" required>
                                    </div>
                                    <div class="col-8">
                                        <label class="form-label">Nombre de la materia</label>
                                        <input class="form-control" type="text" name="materia" required>
                                    </div>
                                    <div class="col-2">
                                        <label class="form-label">Grupo</label>
                                        <input class="form-control" type="text" name="grupo" maxlength="5" req>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php
                                include "layouts/drag_and_drop_csv.php";
                                ?>
                            </div>
                        </div>
                    </form>
                    <br><a href="Views/Alumno/actividades.php" class="mt-3 btn btn-sm btn-success"><i
                            class="bi bi-arrow-left-circle mx-1"></i>Regresar </a>
                </div>
                <br><br><br>
                <?php include "layouts/footer-layout.php"; ?>
            </main>
        </div>
    </div>
</body>

<script src="Assets/Scripts/drag_and_drop_csv.js"></script>
<script>
    new DragAndDrop(0);
</script>

</html>