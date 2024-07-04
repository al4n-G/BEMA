<?php 

$conexion = mysqli_connect("localhost", "root", "", "BEMA");
$id=$_GET['Folio'];      
$sql="SELECT Folio,Notas,Avances,Areas_Trabajar,Actividades,Imagen, Id_pacientes,DATE_FORMAT(Fecha_consulta,'%d/%m/%Y')AS Fecha FROM reporte_consulta WHERE Folio=$id";
$result=mysqli_query($conexion,$sql);
$row=mysqli_fetch_array($result);




$Msql="SELECT  pacientes.Nombre,pacientes.A_paterno,pacientes.A_materno,reporte_consulta.Folio,reporte_consulta.Id_pacientes FROM reporte_consulta INNER JOIN pacientes on reporte_consulta.Id_pacientes = pacientes.Id_pacientes WHERE Folio=$id ";
$igual=mysqli_query($conexion,$Msql);
$mostrar=mysqli_fetch_array($igual); 
session_start();
if(($_SESSION['usuario'])!='')
{
 ?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Reporte</title>
    <link rel="stylesheet" href="styleCR.css" />
    <script type="text/javascript">
      function confirmar(){
      var respuesta = confirm("Estas Seguro que quieres guardar cambios?")
      if(respuesta == true ){
        return true;
      }
      else{
        return  false
      }
      }
    </script>
  </head>
  <body>

<!------------------------Menu----------------------------------------------->
    <div class="content">
      <div class="menu container">
        <a class="logo" href="../Menu/menu.php"><img src="../Imagenes/Logo_ps_Menu.png" /></a>
        <input type="checkbox" id="menu" />
        <label for="menu">
          <img
            src="/BEMA/Imagenes/menu.png"
            class="menu-icono"
            alt=""
          />
        </label>
        <nav class="navbar">
          <ul class="menu-h">
           
            <li class="fon">
              <div class="R-">
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
              <a  href="../contacta/Contacto.php">Contacto</a>
            </div>
            </li>
            <li class="btnli">
              <a href="../Menu/Cerrar_Secion.php" class="action-btn">Cerrar sesión</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!------------------------Formulario----------------------------------------------->
      
    <section class="container1">
      <header>Editar Reporte</header>

      <form action="Actualizar_Editar.php" class="form"  method="post"  enctype="multipart/form-data"  >

       <!-- <div class="">
          <span class="d">paciente:</span>
          <br>
          <br>
          <div class="">
            <select name="id-p"  id="controlBuscador" style="position: relative;height: 50px;width: 100%;outline: none;font-size: 1rem;color: #707070;margin-top: 8px;border: 1px solid #ddd;border-radius: 6px;padding: 0 15px;"
                                                >>
              <option hidden>--Paciente--</option>
            
            </select>
          </div>

          
        </div> --->
        
        
        
        <div class="input-box">
        <h2 > Folio: <?= $row['Folio'] ?></h2>
       <input type="hidden" class="form-control " name="Folio" value="<?= $_GET['Folio'] ?>">
        <br>
        <h4>Fecha del Reporte:   <?= $row['Fecha'] ?></h4>
        <br>
        <label>Paciente: <p><?= $mostrar['Nombre'] ?> <?= $mostrar['A_paterno'] ?> <?= $mostrar['A_materno'] ?> </p></label>
        <br>
          <label>Notas</label>
          <textarea name="Notap" class="campo"><?= $row['Notas'] ?></textarea>
        </div>
        <div class="input-box">
          <label>Avances</label>
         
          <textarea  name="AvancesP"  class="campo"><?= $row['Areas_Trabajar'] ?></textarea>
        </div>
        <div class="input-box">
          <label>Areas a trabajar</label>
          <textarea  name="Areast" class="campo"><?= $row['Actividades'] ?></textarea>
        </div>

        <div class="input-box">
          <label>Actividades</label>
        <textarea name="Actividad" class="campo"><?= $row['Avances'] ?></textarea>
        </div>

       
<br>
        
      
        <div class="input-box">
         <label >Evidencia:</label>
         <br>
         <br>
        </div>
        <div class="im">
        <img class="eviden" src="<?= $row['Imagen'] ?>" alt="avatar" id="img" width="700px" style="border: 2px solid blue" />
        </div>
        <br>
        <div class="im">
        
          <div class="custom-input-file col-md-6 col-sm-6 col-xs-6">
            
            <input   class="input-file" type="file" name="foto" id="foto" accept="image/*"  value=""/>
            Cambiar Imagen
          </div>
        </div>



        
<br>
       <div class="column-1">
       <input class="Actualizar" type="submit" onclick="return confirmar()" value="Guardar Cambios" />
       </div>          
       
      </form>
    </section>
    
    <script src="script2.js"></script>
  </body>
</html>
<?php
}else
{
  header("location: ../Login/index.htm");
}
?>