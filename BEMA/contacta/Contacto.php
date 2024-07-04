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
    <title>Contactanos</title>
    <link rel="stylesheet" href="stylecontac.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>


<!--------------Menu------------>

<div class="content">
  <div class="menu">
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






    <!----------contac--------->
    
    <div class="container">
      <span class="big-circle"></span>
      <img src="img/shape.png" class="square" alt="" />
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Contactanos</h3>
          <p class="text">
            Hola si quieres conocer,mas sobre nuestros servicios visitanos en
            nuestra redes!!
          </p>

          <div class="info">
            <div class="information">
              <i class="fa-solid fa-envelope" style="color: #0e4095"></i>
              <p>al4n10@gmil.com</p>
            </div>
            <div class="information">
              <i class="fa-solid fa-phone" style="color: #0e4095"></i>
              <p>66-91-67-53-95</p>
            </div>
          </div>

          <div class="social-media">
            <p>Conecta con nosotros:</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form action="index.html" autocomplete="off">
            <h3 class="title">Contacta Con PSicologa:</h3>
            <img src="../Imagenes/C1.jpeg" class="c1" />
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
<?php

}else
{
  header("location:../index.htm");
}
?>
