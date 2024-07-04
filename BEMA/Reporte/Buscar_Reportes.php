
<?php 
$conexion = mysqli_connect("localhost", "root","", "BEMA");
session_start();
if(($_SESSION['usuario'])!='')
{
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Reportes de Consultas</title>
    <link rel="stylesheet" type="text/css" href="styleBR.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
      function confirmar(){
      var respuesta = confirm("Estas Seguro que quieres Eliminar El reporte?")
      if(respuesta == true ){
        return true;
      }
      else{
        return  false
      }
      }
    </script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

  </head>

  <body>


<!--------------Meno------------>

    <header>
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
              <div class="R-4"> 
                <a  class="TD"   href="../Menu/menu.php">Inicio</a>
                </div>
              </li>
              <li class="fon">
              <div class="R-3"> 
                <a class="fon">Paciente</a>
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
              <li>
              <div class="btnli">
                <a href="../Menu/Cerrar_Secion.php" class="action-btn">Cerrar sesión</a>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>

<!------------------------------Tabla--------------------------------------->
    <main class="table" id="customers_table">
      <section class="table__header">
        <h1>Reportes de Consultas</h1>
        <div class="input-group">
          <input type="search" placeholder="Bucar Reporte..."  id="myInput"/>
          <img src="../Imagenes/search.png" alt="" />
        </div>
      </section>
      <section class="table__body">
        <table>
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Paciente</th>
              <th>Apellido Paterno</th>
              <th>Apelllido Materno</th>
              <th class="aco">Accion</th>
            </tr>
          </thead>
          <?php 
          $sql="SELECT  pacientes.Nombre,pacientes.A_paterno,pacientes.A_materno,reporte_consulta.Folio,DATE_FORMAT(reporte_consulta.Fecha_consulta,'%d-%m-%Y')AS Fecha   FROM reporte_consulta INNER JOIN pacientes on reporte_consulta.Id_pacientes = pacientes.Id_pacientes ORDER BY reporte_consulta.Fecha_consulta DESC   ";
          $result=mysqli_query($conexion,$sql);
      
          while($mostrar=mysqli_fetch_array($result)){
           ?>
          <tbody id="myTable">
            <tr>
              <td><?php echo $mostrar['Fecha'] ?></td>
              <td><?php echo $mostrar['Nombre'] ?></td>
              <td> <?php echo $mostrar['A_paterno'] ?></td>
              <td><?php echo $mostrar['A_materno'] ?></td>
              <td class="Btn-ac">
                  <div div class="column-1">
                       <a class="btn-ver"  href="Reporte.php? Folio=<?= $mostrar['Folio']?>">Ver</a>
                       <a class="btn-editar" href="Editar_Reporte.php? Folio=<?= $mostrar['Folio']?>">Editar </a>
                       <a class="btn-eliminar" onclick="return confirmar()"href="Eliminar_Reporte2.php? Folio=<?= $mostrar['Folio']?>">Eliminar</a>
                  </div>
              </td>
            </tr>
          </tbody>
          <?php 
	}
	 ?>
        </table>
      </section>
    </main>
  
  </body>
</html>
<?php

}else
{
  header("location:../index.htm");
}
?>