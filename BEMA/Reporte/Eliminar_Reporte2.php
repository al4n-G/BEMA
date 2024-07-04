<?php




$conexion=mysqli_connect("localhost", "root","", "BEMA");
$Folio=$_GET['Folio'];  
$consulta= "DELETE FROM reporte_consulta WHERE Folio=$Folio";
$resultado= mysqli_query($conexion,$consulta);
if($resultado )
{

  
    header("Location: Buscar_Reportes.php"); 
   

}


else
{
    echo'<script type="text/javascript">
    window.alert("¡oopps un problema al Eliminar !")
    location.href="../Menu/menu.php";
    </script>';
    
}

mysqli_close($conexion);

