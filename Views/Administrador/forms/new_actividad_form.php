  <div class="p-4 bg-light">
      <h6>Registra nueva actividad</h6>
      <form class="pt-4" action="Views/Administrador/actividades.php" method="POST">
          <label for="clave_actividad">Código:</label><br>
          <input  type="text" name="clave_actividad" id="clave_actividad" required>
          <br><br>
          <label for="desc_actividad">Descripción:</label><br>
          <textarea  name="desc_actividad" id="desc_actividad" cols="30" rows="10" required></textarea>
          <br><br>
          <input type="submit" class="btn btn-guardar" name="add" value="Guardar">
      </form>
  </div>