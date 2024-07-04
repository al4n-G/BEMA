<?php 

	
$conexion = mysqli_connect("localhost", "root","", "BEMA");
$id=$_GET['id'];
$MYsql="SELECT Nombre,A_paterno,A_materno FROM pacientes WHERE Id_pacientes=$id " ;
$retun=mysqli_query($conexion,$MYsql);
$row=mysqli_fetch_array($retun);      
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
    <title>Reportes del pacientes</title>
    <link rel="stylesheet" type="text/css" href="styleRP.css" />
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


<!------------------------------------------------------------------------------------->
    <main class="table" id="customers_table">
      <section class="table__header">
        <h1>Reportes de <?= $row['Nombre']?> <?= $row['A_paterno']?> <?= $row['A_paterno']?></h1>
        <div class="input-group">
          <input type="search" placeholder="Bucar paciente..." id="myInput"/>
          <img src="../Imagenes/search.png" alt="" />
        </div>
      </section>
      <section class="table__body">
        <table>
          <thead>
            <tr>
              <th>Folio</span></th>
              <th>Fecha</span></th>
              <th class="aco">Accion</th>
            </tr>
          </thead>
          <?php 
          $sql="SELECT  Fecha_consulta,Folio,Id_pacientes FROM reporte_consulta   WHERE Id_pacientes=$id ORDER BY reporte_consulta.Fecha_consulta DESC";
          $result=mysqli_query($conexion,$sql);
      
          while($mostrar=mysqli_fetch_array($result)){
           ?>
          <tbody id="myTable">
            <tr>
              <td><?php echo $mostrar['Folio'] ?></td>
			        <td><?php echo $mostrar['Fecha_consulta'] ?></td>

               <td>  
                <div class="column-1">
                  <a class="btn-ver" href="Reporte2.php? Folio=<?= $mostrar['Folio']?>">Ver</a>
                  <a class="btn-editar" href="Editar_Reporte.php? Folio=<?=$mostrar['Folio'] ?>">Editar </a>
                  <a class="btn-eliminar"onclick="return confirmar()" href="Eliminar_Reporte.php? idF=<?= $mostrar['Folio']?> & id=<?= $mostrar['Id_pacientes'] ?>"  >Eliminar</a>
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
  header("location: ../Login/index.htm");
}
?>