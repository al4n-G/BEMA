<?php 
                       $conexion = mysqli_connect("localhost", "root","", "BEMA");
                       $id=$_GET['id'];      
                       $sql="SELECT  
                       pacientes.Nombre,pacientes.A_paterno,pacientes.A_materno,pacientes.Sexo,pacientes.Fecha_Nacimiento,pacientes.Celular,pacientes.Telefono,pacientes.Telefono_Familiar,pacientes.Correo,pacientes.Escolaridad,pacientes.Trabajo,pacientes.Puesto,pacientes.Instagram,pacientes.Religion,pacientes.Domicilio,historia_clinica.antecedentes_familiares,historia_clinica.Diagnosticado,historia_clinica.Tratamiento,historia_clinica.Tipo_Tratamiento,historia_clinica.Constancia_cita,historia_clinica.Psicologo_Anterior,historia_clinica.Cirugias,historia_clinica.Consulta_En,
                       historia_clinica.Fecha_Diagnosticado,historia_clinica.Fecha_Tratamiento FROM historia_clinica INNER JOIN pacientes on historia_clinica.Id_pacientes = pacientes.Id_pacientes WHERE pacientes.Id_pacientes=$id";

                      $result=mysqli_query($conexion,$sql);
                      $row=mysqli_fetch_array($result);
                    // while($mostrar=mysqli_fetch_array($result)){
                      session_start();

if(($_SESSION['usuario'])!='')
{
                       ?>
                       

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar  Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="H.css" />
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
    <form action="actualizar.php" class="form" method="post">
    <div class="container light-style flex-grow-1 container-p-y">
        
        <h4 class="font-weight-bold py-3 mb-4">
            EDITAR PACIENTE 
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
                </div>

              
                <div class="col-md-9">
                    <div class="tab-content">

                  
                
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <h4>Datos Generales</h4>    
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Nombre(s):</label>                           
                                    <input type="text" class="form-control " name="Nombre" value="<?= $row['Nombre'] ?>">
                                    <input type="hidden" class="form-control " name="id" value="<?= $_GET['id'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Apellido Paterno:</label>
                                    <input type="text" class="form-control" name="A_paterno" value="<?=$row['A_paterno'] ?>">
                                   
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Apellido Materno:</label>
                                    <input type="text" class="form-control"name="A_materno" value="<?=$row['A_materno'] ?>">
                            
                
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Fecha de Nacimento:</label>
                                    <input type="date" class="form-control" name="Fecha_Nacimiento" value="<?=$row['Fecha_Nacimiento'] ?>">
                                  
                                    <br>
                                    <label class="form-label">Sexo:</label>
                                    <select  name="Sexo" class="form-control">
                                        <option hidden><?=$row['Sexo'] ?></option>
                                        <option value="Mujer">-Mujer-</option>
                                        <option value="Hombre">-Hombre-</option>
                                      
                                  </select>
                                    
                                    
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Direccion:</label>
                                    <input type="text" class="form-control" name="Domicilio" value="<?=$row['Domicilio'] ?>">
                                    
                                    <br>
                                    <label class="form-label">Religion:</label>
                                    <input type="text" class="form-control" name="Religion" value="<?=$row['Religion'] ?>">
                                    
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
                                    <input type="number" class="form-control" name="Celular" value="<?=$row['Celular'] ?>">
                                    
                                    <br>
                                    <label class="form-label">Telefono:</label>
                                    <input type="number" class="form-control" name="Telefono" value="<?=$row['Telefono'] ?>">
                                    
                                    <br>
                                    <label class="form-label">Telefono del Familiar:</label>
                                    <input type="number" class="form-control" name="Telefono_Familiar" value="<?=$row['Telefono_Familiar']?>">
                                   
                                </div>
                                <br>
                                <div class="form-group">
                                    <h6><b>Redes</b></h6>
                                    <br>
                                    <label class="form-label">Email:</label>
                                    <input type="text" class="form-control" name="Correo" value="<?=$row['Correo']?>">
                                   
                                    <br>
                                    <label class="form-label">Instagram:</label>
                                    <input type="text" class="form-control" name="Instagram" value="<?=$row['Instagram']?>">
                                  
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <h6 class="mb-4"> <b>Datos de trabajos</b></h6>
                                <div class="form-group">
                                    <label class="form-label">Trabajo:</label>
                                    <input type="text" class="form-control" name="Trabajo" value="<?=$row['Trabajo']?>">
                                    
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Puesto:</label>
                                    <input type="text" class="form-control" name="Puesto" value="<?=$row['Puesto']?>">
                                    
                                </div>
                            </div>
                           
                            <div class="card-body pb-2">
                                <h6 class="mb-4"><b>Nivel de estudios</b> </h6>
                                <div class="form-group">
                                    <label class="form-label">Escolaridad:</label>
                                    <select name="Escolaridad" class="form-control">
                                        <option hidden><?=$row['Escolaridad']?></option>
                                        <option value="Prescolar">-Prescolar-</option>
                                        <option value="Primaria">-Primaria-</option>
                                        <option value="Secundaria">-Secundaria-</option>
                                        <option value="Preparatoria">-Preparatoria-</option>
                                        <option value="Preparatoria Trunca">-Preparatoria Trunca-</option>
                                        <option value="Licenciatura">-Licenciatura-</option>
                                        <option value="Ingenieria">-Ingenieria-</option>
                                        <option value="Carrea Trunca">-Carrea Trunca-</option>
                                        <option value="Maestría">-Maestría-</option>
                                        <option value="Doctorado">-Doctorado-</option>
                                        <option value="Ninguno">-Ninguno-</option>
                                  </select>
                                  
                                    </select>
                                    
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
                                    <textarea rows="8" class="form-control" name="antecedentes_familiares" class="just"><?=$row['antecedentes_familiares']?></textarea>
                                   
                                </div>
                            </div>
                            <br>
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Cirugías:</label>
                                    <textarea rows="8" class="form-control" name="Cirugias" class="just"><?=$row['Cirugias']?></textarea>
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
                               <br>                               
                               <label class="form-label">Diagnosticado:</label>
                               <select name="Diagnos" class="form-control">
                                        <option hidden><?=$row['Diagnosticado']?></option>
                                        <option value="si">Si</option>
                                        <option value="no">No</option>
                                  </select>                 
                               <br>
                               <label class="form-label">Fecha del Diagnostico: </label>

                               <input type="date" class="form-control" value="<?=$row['Fecha_Diagnosticado']?>"  name="Fecha_Diagnostico">
                               

                            </div>

                           <div class="card-body">
                               <h6 class="mb-4"><b>Tratamiento</b></h6>
                               <br>
                               <label class="form-label">En tratamiento </label>
                               <select name="EnTratamien" class="form-control">
                                        <option hidden><?=$row['Tratamiento']?></option>
                                        <option value="si">Si</option>
                                        <option value="no">No</option>
                                        
                                  </select>
                               <br>
                               <label class="form-label">Fecha del tratamiento</label>
                               <input type="date" class="form-control" name="Fecha_Tratamiento" value="<?=$row['Fecha_Tratamiento']?>">
                               <br>
                               <label class="form-label">Tipo de tratamiento</label>
                               <select name="Tipo_Tratamiento" class="form-control">
                                        <option hidden><?=$row['Tipo_Tratamiento']?></option>
                                        <option value="Psicologico">Psicologico</option>
                                        <option value="Psiquiatrico">Psiquiátrico</option>
                                        <option value="Ambos">Ambos</option>
                                        <option value="Ninguno">Ninguno</option>    
                                  </select>
                               <br>

                            </div>
                           
                        </div>
                        <div class="tab-pane fade" id="consutas">
                              <div class="card-body media align-items-center">
                                <h4 class="mb-4">Historia Clinica</h4>
                               </div>
                            <div class="card-body pb-2">
                              
                                <h6 class="mb-4"> <b>Consultas</b></h6>
                                
                                <label class="form-label">Constancia de Citas: </label>
                                <select name="Citas" class="form-control">
                                        <option hidden><?=$row['Constancia_cita']?></option>
                                        <option value="Cada Semana">Cada Semana</option>
                                        <option value="15 Dias">15 Dias</option>
                                        <option value="Cada mes">Cada mes</option>
                                            
                                  </select>
                               <br>
                               <label class="form-label">Consulta en: </label>
                               <select name="consulta" class="form-control">
                                        <option hidden><?=$row['Consulta_En']?></option>
                                        <option value="MA">MA</option>
                                        <option value="NA">NA</option>    
                                  </select>
                               
                               <br>   
                               <label class="form-label">Psicologo Anterior: </label>
                               <input type="text" class="form-control" name="Psicologo_A" value="<?=$row['Psicologo_Anterior']?>">
                               <br>
                               <br>
                            </div>
                          
                           
                        </div>

                    
                        
                    </div>
                          <div>

                              <input type="submit" class="btn btn-success"  onclick="return confirmar()"value="Guardar Cambios"/>
                              <a type="submit" class="btn btn-danger" href="pacientes.php">Cancelar</a>
                            
                 
                          </div>
                         <br>
                         <br>
                </div>
           
            </div>
           
                       
                    
        </div>
        
    </div>
    </form>
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
