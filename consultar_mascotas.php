<?php 

include_once 'conexion.php';

$sentencia = $base_de_datos->query("SELECT mascota.id, mascota.nombre, mascota.edad, mascota.propietario_mascota AS cedula, propietario.nombres, propietario.apellidos, mascota.img FROM mascota INNER JOIN propietario ON mascota.propietario_mascota = propietario.cedula");

$mascotas = $sentencia->fetchAll(PDO::FETCH_OBJ);



?>