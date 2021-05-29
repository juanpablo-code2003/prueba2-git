<?php 

include_once "conexion.php";

$nom = $_POST['nombre'];
$edad = $_POST['edad'];
$cedula = $_POST['propietario'];
/* Al incluir el archivo "base_datos.php", todas sus objetos están
a nuestra disposición.  */
$sentencia = $base_de_datos->prepare("INSERT INTO mascota (nombre, edad, propietario_mascota) VALUES (?,?,?);");

# Pasar en el mismo orden de los ?
$resultado = $sentencia->execute([$nom,$edad,$cedula]);

#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario. # Con eso podemos evaluar

if ($resultado === true) {
    # Redireccionar al index
	// header("Location: listar_mascotas.php");
    $ultimoId = $base_de_datos->lastInsertId('id');
    $datos = array(
        "estado" => "ok",
        "mensaje" => "La mascota se guardó con éxito",
        "id" => $ultimoId
    );
} else {
    $datos = array(
        "estado" => "error",
        "mensaje" => "Algo salió mal. Por favor intentelo nuevamente",
    );
}

echo json_encode($datos);

?>