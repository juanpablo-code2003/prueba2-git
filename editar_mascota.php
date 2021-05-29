<?php 

include_once "conexion.php";

$id = $_POST['codigo_mascota'];
$nom = $_POST['nombre'];
$edad = $_POST['edad'];
$propi = $_POST['id_propietario'];

/* Al incluir el archivo "base_datos.php", todas sus objetos están
a nuestra disposición.  */

#Preparo la sentencia UPDATE
$sentencia = $base_de_datos->prepare("UPDATE mascota SET nombre = ?, edad = ?, propietario_mascota = ? WHERE id = ?; ");

# Pasar en el mismo orden de los ?
$resultado = $sentencia->execute([$nom, $edad, $propi, $id]);

#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario. # Con eso podemos evaluar

if ($resultado === true) {
    $datos = array(
					"estado" => "ok",
					"mensaje" => "La mascota se actualizó con éxito"
				);
} else {
    $datos = array (
    				"estado" => "error",
    				"mensaje" => "Algo salió mal. Por favor intentelo nuevamente"
    			);
}

echo json_encode($datos);

?>