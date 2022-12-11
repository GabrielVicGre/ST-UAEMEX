<?php
    $ruta =  $_SERVER['DOCUMENT_ROOT'];
    $user = "Administrador@sbd1-tutoria";
    $password = "3Fl760wnL8b";
    $server = "sbd1-tutoria.mysql.database.azure.com";
    $database = "bd_sistematutoria";
    $options = array(
        PDO::MYSQL_ATTR_SSL_CA => $ruta . '/Assets/SSL/BaltimoreCyberTrustRoot.crt.pem'
    );
    $conexion = new PDO('mysql:host='.$server.';port=3306;dbname='.$database,$user,$password,$options);

/*
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "bd_sistematutoria";

    $connection = new mysqli($host, $user, $pass, $db);

    if ($connection->connect_errno) {
        echo "Fallo de conexion a la base de datos";
    }
*/

?>