<?php
session_start();
if (empty($_SESSION['usuario']) || $_SESSION['tipo_usuario'] != "Administrador" ) {
    header("Location: ../../index.php");
}else{
    $_SESSION['seccion_menu'] = 'cargar_informacion';
}
?>

<!DOCTYPE html>
<html>

<head>
    <?php include 'layouts/head-layout.php'; ?>
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
                    <h4 class="h5">Cargar Información</h4>
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

                <div class="pt-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" id="myTab">
                                <li class="nav-item">
                                    <a href="#home" style="border-radius: 5px 5px 0px 0px !important; color: gray;" class="nav-link active" data-bs-toggle="tab">Alumnos inscritos</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile" style="border-radius: 5px 5px 0px 0px !important; color: gray;" class="nav-link" data-bs-toggle="tab">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#messages" style="border-radius: 5px 5px 0px 0px !important; color: gray;" class="nav-link" data-bs-toggle="tab">Messages</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="home">
                                    <h5 class="card-title">Alumnos Inscritos</h5>
                                    <p class="card-text">Asegurate que el archivo que subas tenga la extención .csv</p>
                                    <div>
                                        <form enctype="multipart/form-data" action="Controllers/Administrador/uploadAlumnosInscritos.php" method="POST">
                                            <input type="file" name="csv_file"> <br>
                                            <button type="submit" class="mt-4 btn btn-secondary">Cargar archivo <i class="bi bi-cloud-arrow-up-fill mx-2"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <h5 class="card-title">Profile tab content</h5>
                                    <p class="card-text">Asegurate que el archivo que subas tenga la extención .csv</p>
                                    <a href="#" class="btn btn-secondary">Cargar archivo <i class="bi bi-cloud-arrow-up-fill mx-2"></i></a>
                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <h5 class="card-title">Messages tab content</h5>
                                    <p class="card-text">Asegurate que el archivo que subas tenga la extención .csv</p>
                                    <a href="#" class="btn btn-secondary">Cargar archivo <i class="bi bi-cloud-arrow-up-fill mx-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </main>

        </div>
    </div>

</body>



</html>