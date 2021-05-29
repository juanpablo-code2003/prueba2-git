<!-- Modal Agregar Mascotas -->
<div class="modal fade" id="agregarmascota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Mascotas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="guardar.php" method="POST">
          <div class="modal-body">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input required name="nombre" type="text" id="nombre" placeholder="Nombre de mascota" class="form-control">
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input required name="edad" type="number" id="edad" placeholder="Edad de mascota" class="form-control">
            </div>
            <div class="form-group">
                <label for="propi">Propietario</label>
                <select class="form-control" name="propietario">
                     
                </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="./listar.php" class="btn btn-warning">Ver todas</a>
          </div>
        </form>
    </div>
  </div>
</div>