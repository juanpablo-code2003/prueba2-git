<?php 

$id = $_POST["id_mascota"];
include_once "conexion.php";
$sentencia = $base_de_datos->prepare("DELETE FROM mascota WHERE id = ?;");
$resultado = $sentencia->execute([$id]);

if ($resultado === true) {
    $datos = array(
        'estado' => 'ok',
        'mensaje' => 'La mascota se elimino correctamente'
    );
} else {
    $datos = array(
        'estado' => 'error',
        'mensaje' => 'Algo salió mal'
    );
}

echo json_encode($datos);

?>