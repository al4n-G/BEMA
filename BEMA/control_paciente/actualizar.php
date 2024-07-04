<?php
$conexion=mysqli_connect("localhost", "root","", "BEMA");
$id=$_POST['id'];
$nombre=$_POST['Nombre'];
$apelli1=$_POST['A_paterno'];
$apelli2=$_POST['A_materno'];
$fecha_n = $_POST['Fecha_Nacimiento'];
$sexo=$_POST['Sexo'];
$celular = $_POST['Celular'];
$Telefono = $_POST['Telefono'];
$Telefono_F = $_POST['Telefono_Familiar'];
$Correo = $_POST['Correo'];
$Esuela = $_POST['Escolaridad'];
$Trabajo=$_POST['Trabajo'];
$puesto=$_POST['Puesto'];
$Red1=$_POST['Instagram'];
$Religion=$_POST['Religion'];
$Direccion=$_POST['Domicilio'];
////////////HISTORIA CLINICA////////////////////////
$AtecedentesF=$_POST['antecedentes_familiares'];
$Diagnostico=$_POST['Diagnos'];
$Fecha_Di=$_POST['Fecha_Diagnostico'];
$Tratamiento_En=$_POST['EnTratamien'];
$Fecha_Trata=$_POST['Fecha_Tratamiento'];
$Tipo_Tratamiento=$_POST['Tipo_Tratamiento'];
$Constancia=$_POST['Citas'];
$psicologo_Ant=$_POST['Psicologo_A'];
$cirugia=$_POST['Cirugias'];
$Consultas=$_POST['consulta'];


$consulta= "UPDATE pacientes SET Nombre='$nombre',A_paterno='$apelli1',A_materno='$apelli2' ,Fecha_Nacimiento='$fecha_n',Sexo='$sexo',Celular='$celular',Telefono='$Telefono',Telefono_Familiar='$Telefono_F',Correo='$Correo',Escolaridad='$Esuela',Trabajo='$Trabajo',Puesto='$puesto',Instagram='$Red1',Religion='$Religion',Domicilio='$Direccion' WHERE Id_pacientes='$id'";
$resultado= mysqli_query($conexion,$consulta);

if($resultado==1)
{
    $consulta="UPDATE historia_clinica SET antecedentes_familiares='$AtecedentesF',Diagnosticado='$Diagnostico',Fecha_Diagnosticado='$Fecha_Di',Tratamiento='$Tratamiento_En',Fecha_Tratamiento='$Fecha_Trata',Tipo_Tratamiento='$Tipo_Tratamiento',Constancia_cita='$Constancia',Psicologo_Anterior='$psicologo_Ant',Cirugias='$cirugia',Consulta_En='$Consultas' WHERE Id_pacientes='$id'";
    $resultado1= mysqli_query($conexion,$consulta);
    header("Location:Editar.php ?id=" . $_POST['id']);
    /// echo'<script type="text/javascript">
    //window.alert("¡Paciente Registrado!")
    //location.href="pacientes.php";
    //</script>';

}

else
{
    echo'<script type="text/javascript">
    window.alert("¡oopps un problema al guardar !")
    location.href="../Menu/menu.php";
    </script>';
    
}

mysqli_close($conexion);