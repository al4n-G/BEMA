<?php 

$conexion = mysqli_connect("localhost", "root", "", "BEMA");
	$sql="SELECT Id_pacientes,Nombre,A_paterno,A_materno from pacientes";
	$result=mysqli_query($conexion,$sql);
  session_start();
if(($_SESSION['usuario'])!='')
{
 ?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crear Reporte</title>
    <link rel="stylesheet" href="styleCR.css" />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <link rel="stylesheet" type="text/css" href="select2.min.css">
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
	<script src="select2.min.js"></script>
  </head>
  <body>

<!------------------------Menu----------------------------------------------->
    <div class="content">
      <div class="menu container">
        <a class="logo" href="../Menu/menu.html"><img src="../Imagenes/Logo_ps_Menu.png" /></a>
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
      <header>Crear Reporte</header>

      <form action="ValidarReporte.php" class="form"  method="post"  enctype="multipart/form-data"  >

        <div class="">
          <span class="d">paciente:</span>
          <br>
          <br>
          <div class="">
            <select  name="id-p"  id="controlBuscador" style="position: relative;height: 50px;width: 100%;outline: none;font-size: 1rem;color: #707070;margin-top: 8px;border: 1px solid #ddd;border-radius: 6px;padding: 0 15px;" required>
            <option value="" hidden>Selecciona Paciente</option>   
              <?php while ($ver=mysqli_fetch_row($result)) {?>
                <option style=" font-family: Poppins, sans-serif;  "value="<?php echo $ver[0]?>">
                <?php echo $ver[0]?>
                <?php echo $ver[1]?>
                <?php echo $ver[2]?>
                <?php echo $ver[3]?>
                </option>

                    <?php  }?>
            </select>
          </div>
        </div>
        <div class="input-box">
          <label>Notas</label>
          <textarea name="Notap" class="campo" placeholder="Escribe Notas" ></textarea>
        </div>
        <div class="input-box">
          <label>Avances</label>
         
          <textarea  name="AvancesP"  class="campo"placeholder="Escribe Avances"></textarea>
        </div>
        <div class="input-box">
          <label>Areas a trabajar</label>
          <textarea  name="Areast" class="campo" placeholder="Escribe Avances"></textarea>
        </div>

        <div class="input-box">
          <label>Actividades</label>
        <textarea name="Actividad" class="campo" placeholder="Escribe Actividades"></textarea>
        </div>

        <div class="input-box">
          <label>Fecha de Consulta</label>
          <input
            type="date"
            placeholder="Fecha consulta"
            required
            name="fecha_consulata"
          />
        </div>
        <br>
        <div class="input-box">
          <label>Subir Evidencia</label>
          
        </div>
        <br>
        <div class="im">
        <img id="img" width="700"    />
        </div>
        <br>
        <div class="input-box">
          <div class="custom-input-file col-md-6 col-sm-6 col-xs-6">
          <input   class="input-file" type="file" name="foto" id="foto" accept="image/*"  value=""/>
          Subir Imagen...
          
          </div>
        </div>
        <input class="nextbtn" type="submit" value="Terminar" />
        
      </form>
    </section>
    
    <script src="script2.js"></script>
  </body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#controlBuscador').select2();
	});
</script>
<?php
}else
{
  header("location:../index.htm");
}
?>