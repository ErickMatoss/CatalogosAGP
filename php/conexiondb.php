<?php
$servidor = "localhost";
$usuario = "aplicacion";
$contrasena = "vdccmnaik";
$baseDeDatos = "catalogosapp";

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $baseDeDatos);

// Verificar la conexión
if (!$conexion) {
    die("La conexión falló: " . mysqli_connect_error());
}else{
    //echo "exitosa";
}
?>