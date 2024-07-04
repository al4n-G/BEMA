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
    <title>Perfil Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="H.css" />
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
                <a href="../Menu/menu.php">Inicio</a>
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
    <br>
    <br>
    <div class="container light-style flex-grow-1 container-p-y">
        
        <h4 class="font-weight-bold py-3 mb-4">
            PERFIL DEL PACIENTE 
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#Tel-Red">Telefonos y Redes</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Informacion academica y profesional</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-Antecedente">Antecedentes</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#Diagnostico">Diagnostico</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#consutas">Consulta</a>
                       
                           
                          
                    </div>
                    <br>
                    <br>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">

                    <?php 
                       $conexion = mysqli_connect("localhost", "root","", "BEMA");
                   
                       $id=$_GET['id'];      
                       $sql="SELECT  
                       pacientes.Nombre,pacientes.A_paterno,pacientes.A_materno,pacientes.Sexo,pacientes.Celular,pacientes.Telefono,pacientes.Telefono_Familiar,pacientes.Correo,pacientes.Escolaridad,pacientes.Trabajo,pacientes.Puesto,pacientes.Instagram,pacientes.Religion,pacientes.Domicilio,historia_clinica.antecedentes_familiares,historia_clinica.Diagnosticado,historia_clinica.Tratamiento,historia_clinica.Tipo_Tratamiento,historia_clinica.Constancia_cita,historia_clinica.Psicologo_Anterior,historia_clinica.Cirugias,historia_clinica.Consulta_En,
                       DATE_FORMAT(Fecha_Nacimiento,'%d/%m/%Y')AS FechaN, YEAR(CURDATE())-YEAR(Fecha_Nacimiento)+ IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(Fecha_Nacimiento,'%m-%d'), 0 , -1 )AS EDAD_ACTUAL,
                       DATE_FORMAT(Fecha_Diagnosticado,'%d/%m/%Y')AS FechaD,DATE_FORMAT(Fecha_Tratamiento,'%d/%m/%Y')AS FechaT 
                       FROM historia_clinica INNER JOIN pacientes on historia_clinica.Id_pacientes = pacientes.Id_pacientes 
                        WHERE pacientes.Id_pacientes=$id";
                        
                      $result=mysqli_query($conexion,$sql);
                     while($mostrar=mysqli_fetch_array($result)){
                       ?>
                
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <h4>Datos Generales</h4>    
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Nombre(s):</label>
                                    <div class="form-control">  <?php echo $mostrar['Nombre'] ?></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Apellido Paterno:</label>
                                    <div class="form-control"><?php echo $mostrar['A_paterno'] ?></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Apellido Materno:</label>
                                    <div class="form-control"> <?php echo $mostrar['A_materno'] ?></div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Fecha de Nacimento:</label>
                                    <div class="form-control"><?php echo $mostrar['FechaN'] ?></div>
                                    <br>
                                    <label class="form-label">Edad: </label>
                                    <div class="form-control"><?php echo $mostrar['EDAD_ACTUAL'] ?></div>
                                    <br>
                                    <label class="form-label">Sexo:</label>
                                    <div class="form-control"><?php echo $mostrar['Sexo'] ?></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Direccion:</label>
                                    <div class="form-control"><?php echo $mostrar['Domicilio'] ?></div>
                                    <br>
                                    <label class="form-label">Religion:</label>
                                    <div class="form-control"><?php echo $mostrar['Religion'] ?></div>
                                  <br>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Tel-Red">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <h6><b>Telefonos</b></h6>
                                    <br>
                                    <label class="form-label">Celular:</label>
                                    <div class="form-control"><?php echo $mostrar['Celular'] ?></div>
                                    <br>
                                    <label class="form-label">Telefono:</label>
                                    <div class="form-control"><?php echo $mostrar['Telefono'] ?> </div>
                                    <br>
                                    <label class="form-label">Telefono del Familiar:</label>
                                    <div class="form-control"><?php echo $mostrar['Telefono_Familiar']?></div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <h6><b>Redes</b></h6>
                                    <br>
                                    <label class="form-label">Email:</label>
                                    <div class="form-control"><?php echo $mostrar['Correo']?></div>
                                    <br>
                                    <label class="form-label">Instagram:</label>
                                    <div class="form-control"><?php echo $mostrar['Instagram']?></div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <h6 class="mb-4"> <b>Datos de trabajos</b></h6>
                                <div class="form-group">
                                    <label class="form-label">Trabajo:</label>
                                    <div class="form-control"><?php echo $mostrar['Trabajo']?></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Puesto:</label>
                                    <div class="form-control"><?php echo $mostrar['Puesto']?></div>
                                </div>
                            </div>
                           
                            <div class="card-body pb-2">
                                <h6 class="mb-4"><b>Nivel de estudios</b> </h6>
                                <div class="form-group">
                                    <label class="form-label">Escolaridad:</label>
                                    <div class="form-control"><?php echo $mostrar['Escolaridad']?></div>
                                
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-Antecedente">
                              <div class="card-body media align-items-center">
                                <h4 class="mb-4">Historia Clinica</h4>
                               </div>
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Antecedente Familiares:</label>
                                    <p class="just"> <?php echo $mostrar['antecedentes_familiares']?></p>
                                </div>
                            </div>
                            <br>
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Cirugías:</label>
                                    <p class="just"><?php echo $mostrar['Cirugias']?></p>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="tab-pane fade" id="Diagnostico">
                        <div class="card-body media align-items-center">
                                <h4 class="mb-4">Historia Clinica</h4>
                               </div>
                            <div class="card-body">
                                      
                               <h6 class="mb-4"><b>Diagnostico</b></h6>
                               
                               <div class="culumDG">
                               <label class="form-label">Diagnosticado: <?php echo $mostrar['Diagnosticado']?></label>
                               
                               
                               <label class="form-label">Fecha del Diagnostico: <?php echo $mostrar['FechaD']?></label>
                               
                               </div>

                            </div>

                           <div class="card-body">
                               <h6 class="mb-4"><b>Tratamiento</b></h6>
                               <div class="culumT">
                               <label class="form-label">En tratamiento: <?php echo $mostrar['Tratamiento']?> </label>
                              
                               
                               <label class="form-label">Fecha del tratamiento: <?php echo $mostrar['FechaT']?></label>
                               
  
                               <label class="form-label">Tipo de tratamiento: <?php echo $mostrar['Tipo_Tratamiento']?></label>
                              
                                </div>

                            </div>
                           
                        </div>
                        <div class="tab-pane fade" id="consutas">
                              <div class="card-body media align-items-center">
                                <h4 class="mb-4">Historia Clinica</h4>
                               </div>
                            <div class="card-body pb-2">
                              
                                <h6 class="mb-4"> <b>Consultas</b></h6>
                                
                                <label class="form-label">Constancia de Citas: <?php echo $mostrar['Constancia_cita']?></label>            
                               <br>
                               <br>
                               <label class="form-label">Consulta en: <?php echo $mostrar['Consulta_En']?></label>
                               <br>
                               <br>   
                               <label class="form-label">Psicologo Anterior:</label>
                               <div class="form-control"><?php echo $mostrar['Psicologo_Anterior']?></div>
                               <br>
                               
                            </div>
                          
                           
                        </div>

                        <?php }    ?>
                    </div>
                    <a type="submit" class="btn btn-info" href="pacientes.php">Regresar</a>
                    <br>
                    <br>
                </div>
               
            </div>
            
        </div>
        
    </div>
   
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php
}else
{
  header("location:../index.htm");
}
?>
