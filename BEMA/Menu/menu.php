
<?php 

session_start();
$conexion = mysqli_connect("localhost", "root","", "BEMA");
if(($_SESSION['usuario'])!='')
{
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Menu</title>
    <link rel="stylesheet" href="styleMenu.css" />
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
                <a  href="Cerrar_Secion.php" class="action-btn">Cerrar sesión</a>
              </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <h1>Bienvenido <?php echo $_SESSION['usuario'] ?>   </h1>
  </body>
</html>
<?php

}else
{
  header("location:../index.htm");
}
?>
