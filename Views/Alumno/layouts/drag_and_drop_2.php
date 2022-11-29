<form enctype="multipart/form-data" action="" method="POST">
    <div>
        <input type="hidden" name="id_actividad" value="<?php echo $_POST['id_actividad'];?>">
        <input type="file" id="file-input" name="file">
        <label for="file-input" id="drop-area">
            <i class="bi bi-download"></i><br>
            Selecciona o arrastra un archivo aquí.
        </label>
    </div>
    <div class="hidden" id="file-info">
        <p id="file-name"></p>
        <input type="submit" name="submit" value="Enviar">
    </div>
</form>