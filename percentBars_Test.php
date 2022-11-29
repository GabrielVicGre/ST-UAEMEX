<?php

require_once("View\Graphics\PercentBar.php");
require_once("View\Html\Table.php");

use View\Graphics\PercentBar;
use View\Html\RoundedTable;

?>

<html>

    <head>
        <link rel="stylesheet" href="Assets/CSS/tabla.css">
        <link rel="stylesheet" href="Assets/CSS/scroll.css">
        <link rel="stylesheet" href="Assets/CSS/percent.css">
    </head>
    <body>
        <?php
        $col_names = array("Actividad", "Porcentaje de entregas", "");
        $data = array();

        for($i = 0; $i < 20; $i++) {
            $row = array(
                "Actividad ".($i + 1),
                new PercentBar(rand(0,100)),
                "<button type='button' onclick='notify()'>></button>"
            );
            array_push($data, $row);
        }

        $table = new RoundedTable($col_names, $data);
        $table->display();

        ?>
    </body>
</html>

<script>
    function notify() {
        alert("Notificación enviada");
    }
</script>
