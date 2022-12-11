<?php
session_start();
if (empty($_SESSION['usuario']) || $_SESSION['tipo_usuario'] != "Tutor") {
    header("Location: ../../index.php");
} else {
    $_SESSION['seccion_menu'] = 'perfil';
}
$ruta =  $_SERVER['DOCUMENT_ROOT'];

include_once ($ruta."/Controllers/Tutor/tutorController.php");
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
                    <?php include "layouts/user-layout.php"; ?>
                </div>



                <div class="container" style="background-image: url('../../Assets/Images/tapiz.png'); background-size: 100%;">
                    <div class="px-sm-1 p-2 p-lg-5">
                        <div class="container-fluid col-lg-8 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="text-center text-secondary"> Datos de tutor </h5>
                                </div>
                                <div class="card-body">
                                    <div class="contaner">
                                        <div class="row">
                                            <div class="mb-3 row">
                                                <div class="container text-center">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/1177/1177568.png" style="width: 70px" class="img-fluid" alt="...">
                                                </div>
                                            </div>
                                            <?php
                                            foreach ($datosUsuario as $datos) {
                                            ?>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Usuario: </label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" value="<?php echo $datos['tipo']; ?>" aria-label="Disabled input example" disabled readonly>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nombre: </label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" value="<?php echo $datos['nombre']; ?>" aria-label="Disabled input example" disabled readonly>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Correo: </label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" value="<?php echo $datos['email']; ?>" aria-label="Disabled input example" disabled readonly>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">RFC: </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly class="form-control-plaintext" value="LEEF996919HMC">
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>

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