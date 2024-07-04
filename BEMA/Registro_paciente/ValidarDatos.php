
<?php
$nombre=$_POST['nombre'];
$apelli1=$_POST['apellidoA'];
$apelli2=$_POST['apellidoM'];
$fecha_n = $_POST['Fecha_N'];
$sexo=$_POST['sex'];
$celular= $_POST['cel'];
$Telefono = $_POST['Tel1'];
$Telefono_F = $_POST['Tel_f'];
$Correo = $_POST['Correo1'];
$Esuela = $_POST['escolaridad'];
$Trabajo=$_POST['Trabajo'];
$puesto=$_POST['puesto'];
$Red1=$_POST['Instagram'];
$Religion=$_POST['Religion'];
$Direccion=$_POST['Direccion'];
////////////HISTORIA CLINICA////////////////////////
$AtecedentesF=$_POST['AntesF'];
$Diagnostico=$_POST['Diagnos'];
$Fecha_Di=$_POST['Fecha_Diagnostico'];
$Tratamiento_En=$_POST['EnTratamien'];
$Fecha_Trata=$_POST['Fecha_Tratamiento'];
$Tipo_Tratamiento=$_POST['Tipo_Tratamiento'];
$Constancia=$_POST['Citas'];
$psicologo_Ant=$_POST['Psicologo_A'];
$cirugia=$_POST['Cirugias'];
$Consultas=$_POST['consulta'];



$conexion=mysqli_connect("localhost", "root","", "BEMA");

$consulta= "INSERT INTO pacientes(Nombre,A_paterno,A_materno,Fecha_Nacimiento,Sexo,Celular,Telefono,Telefono_Familiar,Correo,Escolaridad,Trabajo,Puesto,Instagram,Religion,Domicilio) VALUES ('$nombre','$apelli1','$apelli2','$fecha_n','$sexo','$celular','$Telefono','$Telefono_F','$Correo','$Esuela','$Trabajo','$puesto','$Red1','$Religion','$Direccion')";
$resultado= mysqli_query($conexion,$consulta);

if($resultado==1)
{
    $consulta= "INSERT INTO historia_clinica(antecedentes_familiares,Diagnosticado,Fecha_Diagnosticado,Tratamiento,Fecha_Tratamiento,Tipo_Tratamiento,Constancia_cita,Psicologo_Anterior,Cirugias,Consulta_En) VALUES ('$AtecedentesF','$Diagnostico','$Fecha_Di','$Tratamiento_En','$Fecha_Trata','$Tipo_Tratamiento','$Constancia','$psicologo_Ant','$cirugia','$Consultas')";  
    $resultado1= mysqli_query($conexion,$consulta); 
    echo'<script type="text/javascript">
    window.alert("¡Paciente Registrado!")
    location.href="registro_Paciente.php";
    </script>';

}

else
{
    echo'<script type="text/javascript">
    window.alert("¡oopps un problema al guardar !")
    location.href="../Menu/menu.php";
    </script>';
    
}

mysqli_close($conexion);