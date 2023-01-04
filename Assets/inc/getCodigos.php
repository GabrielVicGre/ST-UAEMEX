<?php

require 'database.php';

$con = new Database();
$pdo = $con->conectar();

$campo = $_POST["campo"];

//$sql = "SELECT cp, asentamiento FROM codigos_postales WHERE cp LIKE ? OR asentamiento LIKE ? ORDER BY cp ASC LIMIT 0, 10";

$sql = "SELECT * FROM materia WHERE clave LIKE ? OR nombre LIKE ? ORDER BY nombre ASC LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->execute([$campo . '%', $campo . '%']);

$html = "";

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$html .= "<li class=\"list-group-item list-group-item-action\" onclick=\"mostrar('".$row["id_materia"]."','".$row["clave"]."','".$row["nombre"]."')\">" . $row["clave"] . " - " . $row["nombre"] . "</li>";
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
