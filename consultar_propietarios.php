<?php

	include_once 'conexion.php';

	$sentencia = $base_de_datos->query("SELECT cedula, nombres, apellidos, correo, num_cel FROM propietario");
	$propietarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>