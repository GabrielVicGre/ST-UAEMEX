<?php
$act = $controller->getActividad($_GET['id_actividad']);
?>
<div class="p-4 bg-light">
    <h6>Editar Actividad</h6>
    <form action="Views/Administrador/actividades.php" method="POST" class="pt-4">
        <input type="hidden" name="id_actividad" value="<?php echo $_GET['id_actividad']; ?>">
        <label for="nombre_actividad">Código:</label><br>
        <input  type="text" name="clave_actividad" id="clave_actividad" value="<?php echo $act['clave_actividad']; ?>">
        <br><br>
        <label for="desc_actividad">Descripción:</label><br>
        <textarea  name="desc_actividad" id="desc_actividad" cols="30" rows="10"><?php echo $act['desc_actividad']; ?></textarea>
        <br><br>
        <table class="buttons-panel">
            <tr>
                <td>
                    <input type="submit" name="update" value="Guardar">
                </td>
                <td>
                    <button class="submit-btn" type="submit" name="action" value="cancel">Cancelar</button>
                </td>
            </tr>
        </table>
    </form>
</div>