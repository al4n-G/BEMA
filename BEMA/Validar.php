<?php
include 'Reporte/bd.php';
$usuario = $_POST['usuario'];
$contra = $_POST[ 'clave'];
session_start();
$_SESSION['usuario'] = $usuario;




$consulta="SELECT*FROM psicologo where Usuario='$usuario' and claves='$contra'";
$resultado = mysqli_query($conexion, $consulta);

$fila = mysqli_num_rows($resultado);
if($fila){
    header("location:Menu/menu.php");
}
else{
    echo'<script type="text/javascript">
    window.alert("¡Usuario o cotraseña no son correctos!")
    location.href="Login/index.htm";
    </script>';
}
mysqli_free_result($resultado);
$_SESSION["id"]=$resultado['Id_psicologo'];
$_SESSION["Nombre"]=$resultado['Nombre'];

mysqli_close($conexion);
