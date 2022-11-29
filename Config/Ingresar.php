<?php

include('../Config/connectPOO.php');

$user = $_POST['user'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuario u INNER JOIN tipo_usuario tu ON
        u.id_tipo_usuario=tu.id_tipo_usuario WHERE 
        u.email like '".$user."' AND u.password like '".$password."'";

$data = $connection->query($sql);  // ejecuta query

if($data->num_rows == 1){  // Si encuentra algun registro entonces
    
    $usuario = mysqli_fetch_array($data);
    if(isset($_POST["Ingresar"])){
        session_start();
        $_SESSION['usuario'] = $user;
        $_SESSION['password'] = $password;
        $_SESSION['tipo_usuario'] = $usuario["tipo"]; // Recupera el tipo de ususario 
        $_SESSION['id_usuario'] = $usuario["id_usuario"];
    }  

    $tipoUsuario = $usuario["tipo"];
    switch ($tipoUsuario) {
        case "Administrador":
            header("Location: ../Views/Administrador/index.php");
            break;
        case "Tutor":
            header("Location: ../Views/Tutor/index.php");
            break;
        case "Alumno":
            header("Location: ../Views/Alumno/index.php");
            break;
    }

}else{  // No encuentra el registro
    header("Location: ../index.php?e");     
}


?>