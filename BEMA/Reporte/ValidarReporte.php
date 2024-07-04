<?php
include 'bd.php';
$Nota=$_POST['Notap'];
$Avances=$_POST['AvancesP'];
$Areas=$_POST['Areast'];
$Actividades=$_POST['Actividad'];
$Fecha_c= $_POST['fecha_consulata'];
///$imagen=addslashes(file_get_contents($_FILES['Evidencia']['tmp_name']));
$Id_p=$_POST['id-p'];


//$foto = $_FILES['foto'];

$foto='';

        if(isset($_FILES['foto'])){

            $file =$_FILES['foto'];
            $tmp_name = $file['tmp_name'];
            $directorio_destino = "../IMG";
        
            $img_file = $file['name'];
            $img_type = $file['type'];

           if (((strpos($img_type, "gif") ||strpos($img_type, "jpeg") || strpos($img_type, "jpg")) || strpos($img_type, "png")))
           {
               $destino = $directorio_destino . '/' .  $img_file;
               mysqli_query($conexion, "INSERT INTO  reporte_consulta (Notas,Avances,Areas_Trabajar,Actividades,Fecha_consulta,Imagen,Id_pacientes) VALUES ('$Nota','$Avances','$Areas','$Actividades','$Fecha_c','$destino','$Id_p')");
               echo'<script type="text/javascript">
                        window.alert("¡Paciente Registrado!")
                        location.href="Crear_reporte.php";
                    </script>';
               if (move_uploaded_file($tmp_name, $destino))
               {
                   return true;

   
               }
           }
           else{

            mysqli_query($conexion, "INSERT INTO  reporte_consulta (Notas,Avances,Areas_Trabajar,Actividades,Fecha_consulta,Imagen,Id_pacientes) VALUES ('$Nota','$Avances','$Areas','$Actividades','$Fecha_c','$foto','$Id_p')");
            echo'<script type="text/javascript">
                  window.alert("¡Paciente Registrado!")
                  location.href="Crear_reporte.php";
                </script>';
           }
       
 
        }
 ?>

