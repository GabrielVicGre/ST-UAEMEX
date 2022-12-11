<?php

include('../Config/connectPOO.php');

/* CAPTCHA */
$ip= $_SERVER['REMOTE_ADDR'];
$captcha = $_POST['g-recaptcha-response'];
$secretkey = "6LdYZHAjAAAAAENeEpFGfuj2Xpao9KV50ymJMSv9"; 
$respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");
$atributos = json_decode($respuesta,TRUE);
$errors = array();
if( $atributos['success'] == true ){  
    header("Location: ../Views/Administrador/index.php");
}else{
    $errors[]='Verificar el captcha';
    header("Location: ../index.php");  
}
/*
$user = $_POST['user'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuario u INNER JOIN tipo_usuario tu ON
        u.id_tipo_usuario=tu.id_tipo_usuario WHERE 
        u.email like '".$user."' AND u.password like '".$password."'";

$data = $connection->query($sql);  // ejecuta query

if($data->num_rows == 1 && count($errors) == 0){  // Si encuentra algun registro entonces
    
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
*/

?>