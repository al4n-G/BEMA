<?php

$conexion = mysqli_connect("localhost", "root", "", "BEMA");
if ($conexion->connect_error) {
    die("Conexion Fallida" . $conexion->connect_error);
}
else{
echo "conectado";
}
?>
