<?php

$contrase = "";
$usuario = "root";
$nombreBaseDeDatos = "mascotas";

try {
    $base_de_datos = new PDO("mysql:host=localhost;dbname=$nombreBaseDeDatos", $usuario, $contrase);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Se conecto con Éxito ";
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}

?>

