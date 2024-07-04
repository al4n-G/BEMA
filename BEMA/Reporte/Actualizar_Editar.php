<?php
$conexion=mysqli_connect("localhost", "root","", "BEMA");
$id=$_POST['Folio'];
$Nota=$_POST['Notap'];
$Avance=$_POST['AvancesP'];
$AreasT=$_POST['Areast'];
$Actividades= $_POST['Actividad'];



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
               mysqli_query($conexion, "UPDATE reporte_consulta SET Notas='$Nota',Avances='$Avance',Areas_Trabajar='$AreasT',Actividades='$Actividades',Imagen='$destino'WHERE  Folio='$id'");
               echo'<script type="text/javascript">
                        window.alert("¡Reporte Editado!")
                        location.href="Crear_reporte.php";
                    </script>';
               if (move_uploaded_file($tmp_name, $destino))
               {
                   return true;

   
               }
           }
           else{

            mysqli_query($conexion, "UPDATE reporte_consulta SET Notas='$Nota',Avances='$Avance',Areas_Trabajar='$AreasT',Actividades='$Actividades' ,Imagen='$foto'WHERE  Folio='$id'");
            echo'<script type="text/javascript">
                  window.alert("¡Paciente Registrado!")
                  location.href="../Menu/menu.php";
                </script>';
           }
       
 
        }
 ?>













