<?php 
include_once 'encabezado.php';
include_once 'consultar_mascotas.php';
?>

<main role="main" class="container my-4">

    <div class="row">
        <div class="col">
            <h2>Mascotas</h2>
            <button class="btn btn-success mb-3" data-toggle="modal" data-target="#agregarmascota">Añadir mascota</button>

            <div>
              <strong>BIENVENIDO A NUESTRO SISTEMA DE MASCOTAS</strong>
              <p>No tengo ni idea de si esto funcionara</p>
            </div>

            <div class="card">
              <div class="card-body">
                <h3>Hola esto es una prueba</h3>
              </div>
            </div>

            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>COD</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Cedula Ciudadania</th>
                        <th>Propietario</th>
                        <th>Imagen</th>
                        <th>Actualizar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody id="lista_mascotas">
                    
                    <?php foreach ($mascotas as $mascota) {
                        ?>
                        <tr>
                            <td class="id_mascota"><?php echo $mascota->id ?></td>
                            <td class="td_nombre"><?php echo $mascota->nombre ?></td>
                            <td class="td_edad"><?php echo $mascota->edad ?></td>
                            <td class="td_cedula"><?php echo $mascota->cedula ?></td>
                            <td class="td_propietario"><?php echo $mascota->nombres." ".$mascota->apellidos ?></td>
                            <td>
                                <img src="img/<?php echo $mascota->img ?>" class="img_mascota" alt="">
                            </td>
                            <td><button class="btn btn-success editar" data-toggle="modal" data-target="#actualizarmascota">Editar</button></td>
                            <td><button class="btn btn-danger eliminar">Eliminar</button></td>
                        </tr>
                        <?php
                    } ?>
                </tbody>
            </table>
            
        </div>
    </div>

</main>

<?php 
include_once 'footer.php';

include_once 'consultar_propietarios.php';
?>

<!-- Modal Agregar Mascotas -->
<div class="modal fade" id="agregarmascota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Nueva Mascotas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <!-- <form action="guardar.php" method="POST"> -->
          <div class="modal-body">
            <div class="text-center">FORMULARIO NUEVA MASCOTA</div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input required name="nombre" type="text" id="nombre" placeholder="Nombre de mascota" class="form-control">
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input required name="edad" type="number" id="edad" placeholder="Edad de mascota" class="form-control">
            </div>
            <div class="form-group">
                <label for="propi">Propietario(s)</label>
                <select class="form-control" name="propietario" id="propietario">
                     <?php 
                     foreach ($propietarios as $prop) {
                         ?><option value="<?php echo $prop->cedula ?>"><?php echo $prop->nombres." ".$prop->apellidos ?></option><?php
                     }
                     ?>
                </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button id="btn_guardar" type="submit" class="btn btn-success" data-dismiss="modal">Añadir</button>
          </div>
        <!-- </form> -->
    </div>
  </div>
</div>

<!-- Modal Actualizar Mascotas -->
<div class="modal fade" id="actualizarmascota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Actualizar Mascotas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <!-- <form action="guardar.php" method="POST"> -->
          <div class="modal-body">
            <!-- <input type="hidden" id="id_mascotaAct"> -->
            <div class="form-group">
                <label for="nombreAct">Nombre</label>
                <input required name="nombreAct" type="text" id="nombreAct" placeholder="Nombre de mascota" class="form-control">
            </div>
            <div class="form-group">
                <label for="edadAct">Edad</label>
                <input required name="edadAct" type="number" id="edadAct" placeholder="Edad de mascota" class="form-control">
            </div>
            <div class="form-group">
                <label for="propietarioAct">Propietario</label>
                <select class="form-control" name="propietarioAct" id="propietarioAct">
                     <?php 
                     foreach ($propietarios as $prop) {
                         ?><option value="<?php echo $prop->cedula ?>"><?php echo $prop->nombres." ".$prop->apellidos ?></option><?php
                     }
                     ?>
                </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button id="btn_editar" type="submit" class="btn btn-success" data-dismiss="modal">Actualizar</button>
          </div>
        <!-- </form> -->
    </div>
  </div>
</div>