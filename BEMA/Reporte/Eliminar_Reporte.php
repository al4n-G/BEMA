<?php




$conexion=mysqli_connect("localhost", "root","", "BEMA");
$Folio=$_GET['idF'];  
$id=$_GET['id'];
$consulta= "DELETE FROM reporte_consulta WHERE Folio=$Folio";
$resultado= mysqli_query($conexion,$consulta);
if($resultado )
{

  
    header("Location: Reportes_de_pacientes.php? id=". $_GET['id']); 
   

}


else
{
    echo'<script type="text/javascript">
    window.alert("¡oopps un problema al Eliminar !")
    location.href="../Menu/menu.php";
    </script>';
    
}

mysqli_close($conexion);

