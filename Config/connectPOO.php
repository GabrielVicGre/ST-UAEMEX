<?php

/*$host = "localhost";
$user = "root";
$pass = "";
$db = "bd_sistematutoria";

$connection = new mysqli($host,$user,$pass,$db);

if($connection->connect_errno) {
    echo "Fallo de conexion a la base de datos";
}

*/
$ruta =  $_SERVER['DOCUMENT_ROOT'];

$connection = mysqli_init();
mysqli_ssl_set($connection, NULL, NULL, $ruta.'/Assets/SSL/BaltimoreCyberTrustRoot.crt.pem', NULL, NULL);
mysqli_real_connect($connection, 'sbd1-tutoria.mysql.database.azure.com', 'Administrador@sbd1-tutoria', '3Fl760wnL8b', 'bd_sistematutoria', 3306, MYSQLI_CLIENT_SSL);
if (mysqli_connect_errno()) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}





