<?php 

$conexion = mysqli_connect("localhost", "root", "", "BEMA");
$id=$_GET['Folio'];      
$sql="SELECT pacientes.Id_pacientes,pacientes.Nombre,pacientes.A_paterno,pacientes.A_materno,pacientes.Sexo, DATE_FORMAT(Fecha_Nacimiento,'%d/%m/%Y')AS FechaNaci, YEAR(CURDATE())-YEAR(Fecha_Nacimiento)+ IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(Fecha_Nacimiento,'%m-%d'), 0 , -1 )AS EDAD_ACTUAL,reporte_consulta.Folio ,reporte_consulta.Notas,reporte_consulta.Avances,reporte_consulta.Areas_Trabajar,reporte_consulta.Actividades,DATE_FORMAT(Fecha_consulta,'%d/%m/%Y')AS Fechacosulta,reporte_consulta.Imagen FROM reporte_consulta INNER JOIN pacientes on reporte_consulta.Id_pacientes = pacientes.Id_pacientes WHERE Folio=$id";
$result=mysqli_query($conexion,$sql);
$row=mysqli_fetch_array($result);
session_start();
if(($_SESSION['usuario'])!='')
{


///DATE_FORMAT(Fecha_consulta,'%d/%m/%Y')AS Fecha-cosulta
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
    <link rel="stylesheet" href="styleReporte.css" />
    <script src="html2pdf.bundle.min.js"></script>
   
   <script src="script.js"></script>
</head>
<body>
    <header>
        <div class="content">
          <div class="menu container">
            <a class="logo" href="../Menu/menu.html"><img src="../Imagenes/Logo_ps_Menu.png" /></a>
            <input type="checkbox" id="menu" />
            <label for="menu">
              <img
                src="../Imagenes/menu.png"
                class="menu-icono"
                alt=""
              />
            </label>
            <nav class="navbar">
              <ul class="menu-h">
                
                <li class="fon">
                  <div class="R-4">
                  <a href="../Menu/menu.php">Inicio</a>
                </div>
                </li>
                <li class="fon">
                  <div class="R-3">
                  <a class="fon"
                    >Paciente</a
                  >
                </div>
                  <ul class="menu-v">
                    <li>
                      <a href="../Registro_paciente/registro_Paciente.php"
                        >Registrar Paciente</a
                      >
                    </li>
                    <li>
                      <a href="../control_paciente/pacientes.php"
                        >Control Paciente</a
                      >
                    </li>
                  </ul>
                </li>
                <li class="fon">
                  <div class="R-2">
                  <a>Reporte</a>
                </div>
                  <ul class="menu-v">
                    <li>
                      <a href="../Reporte/Crear_reporte.php">Crear Reporte</a>
                    </li>
                    <li>
                    
                      <a href="../Reporte/Buscar_Reportes.php">Buscar Reporte</a>
                   
                    </li>
                  </ul>
                </li>
                <li class="fon">
                  <div class="R-1">
                  <a href="../contacta/Contacto.php">Contacto</a>
                </div>
                </li>
                <li >
                  <div class="btnli">
                  <a href="../Menu/Cerrar_Secion.php" class="action-btn">Cerrar sesión</a>
                </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </header>




      <section class="container1">
        <header>Reporte</header>  
  
        <form id="CPDF"> 
        <br>
            <br>
            <br>
            <br>
      
          <div class="input-box">
            <div class="column-2"> 
            <h2 class="just"> Folio:<?= $row['Folio'] ?></h2>
           <img  class="imgf" src="../Imagenes/Logo_ps_Menu.png"  width="80px" />
          </div>
            <br>
            <h4 class="just">Fecha del Reporte: <?= $row['Fechacosulta'] ?></h4>
            <br>
             <h4 class="just">Lic. Brenda Denisse Llamas Estrada</h4>       
            <br>
            <br>
            <br>
            <br>
            <div class="input-box">
              <h4 class="just">DATOS PERSONALES</h4>  
            </div>
            <br>

            
            <table>
              <tr>
                <td>Nombre del pacientes: <?= $row['Nombre'] ?> <?= $row['A_paterno'] ?> <?= $row['A_materno'] ?></td>
                <td> Sexo: <?= $row['Sexo'] ?> </td>
              </tr>
  
              <tr>
                <td> Fecha de nacimiento:  <?= $row['FechaNaci'] ?> </td>
                <td> Edad: <?= $row['EDAD_ACTUAL'] ?></td>
              </tr>
              <tr>
                <td> Fecha del diagnostico: </td>
                <td> Constancia de citas: </td>
              </tr>
            </table>
            
             <br>
             <br>
            <div class="input-box">
              <h4 class="just">DATOS DE CONSULTA</h4>  
            </div>

            <br>
            <div class="input-box">
              <label><h4 class="just">Notas:</h4></label>
              <br>
             <p class="just"><?= $row['Notas'] ?></p>
            </div>
            <br>
            <br>
            <br>
            <div class="input-box">
              <label><h4 class="just">Avances:</h4></label>
              <br>
             <p class="just"><?= $row['Avances'] ?></p>
            </div>
            <br>
            <br>
            <br>
            <div class="input-box">
              <label><h4 class="just">Areas a trabajar:</h4></label>
              <br>
             <p class="just"><?= $row['Areas_Trabajar'] ?></p>
            </div>
            <br>
            <br>
            <br>
            <div class="input-box">
              <label><h4 class="just">Actividades:</h4></label>
              <br>
            <p class="just"><?= $row['Actividades'] ?></p>
            </div>
            <br>
            <br>
            <br>
    
            <div class="input-box">
             <label ><h4 class="just">Evidencia:</h4></label>
             <br>
            <div class="im" >
              <img class="imgb" src="<?= $row['Imagen'] ?>"  width="750px"  >
              </div>

            </div>
            </form>
            <br>
            <br>
      </section>

      <div class="column-1">
      <a type="submit" class="Actualizar" href="Reportes_de_pacientes.php? id=<?= $row['Id_pacientes']?>">Regresar</a>
            <a type="submit" class="GPDF" id="btnCrearPdf">Generar PDF</a>
           </div>          
   <br>
   <br>




</body>
</html>

<?php
}else
{
  header("location:../index.htm");
}
?>