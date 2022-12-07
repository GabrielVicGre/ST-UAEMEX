<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "bd_sistematutoria";

$connection = new mysqli($host,$user,$pass,$db);

if($connection->connect_errno) {
    echo "Fallo de conexion a la base de datos";
}

