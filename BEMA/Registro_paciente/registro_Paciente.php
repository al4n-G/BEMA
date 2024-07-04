
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
    <title>Registro Paciente...</title>
    <link rel="stylesheet" href="styleRGP.css  " />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
  
  </head>
  <body>
<!------------------------------Menu---------------------------------------------------->
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
<!--------------------------------Formulario--------------------------------------------------------------------->
    <section class="container1">
        <header>Registro Paciente</header>
        <span class="d">Datos Personales:</span>
        <form action="ValidarDatos.php" class="form" method="post">
          <div class="input-box">
            <label>Nombres(S)</label>
            <input
              type="text"
              placeholder="Escribe el nombre"
              required
              id="n"
              name="nombre"
            />
          </div>
          <div class="column-1">
            <div class="input-box">
              <label>Apellido Paterno</label>
              <input
                type="text"
                placeholder="Escribe Apellido"
                required
                id="a_paterno"
                name="apellidoA"
              />
            </div>
  
            <div class="input-box">
              <label>Apellido Materno</label>
              <input
                type="text"
                placeholder="Escribe el Apellido"
                required
                id="a_materno"
                name="apellidoM"
              />
            </div>
          </div>
  
          <div div class="column-2">
            <div class="input-box">
              <label>Fecha de Nacimiento</label>
              <input
                type="date"
                placeholder="Fecha nacimento"
                required
                id="fecha_nacimiento"
                name="Fecha_N"
                value="dd/mm/aaaa"
              />
            </div>
  
            <div class="gender-box">
              <h3>Sexo</h3>
              <div class="gender-option">
                <div class="gender">
                  <input
                    type="radio"
                    id="check-mujer"
                    name="sex"
                    value="Mujer"
                    checked
                  />
                  <label for="check-mujer">Mujer</label>
                </div>
                <div class="gender">
                  <input
                    type="radio"
                    id="check-hombre"
                    name="sex"
                    value="Hombre"
                  />
                  <label for="check-hombre">Hombre</label>
                </div>
              </div>
            </div>
          </div>
  
          <div class="column-3">
            <div class="input-box">
              <label>Celular</label>
              <input
                type="tel"
                placeholder="Escribe el numero"
                required
                
                name="cel"
              />
            </div>
  
            <div class="input-box">
              <label>Telefono</label>
              <input
                type="tel"
                placeholder="Escribe el numero"
                id="cel-2"
                name="Tel1"
              />
            </div>
          </div>
  
          <div class="column-4">
            <div class="input-box">
              <label>Telefono del Familiar</label>
              <input
                type="tel"
                placeholder="Escribe el numero"
                required
                id="cel_familiar"
                name="Tel_f"
              />
            </div>
  
            <div class="input-box">
              <label>correo electronico</label>
              <input
                type="email"
                placeholder="Escribe el correo"
                required
                id="correo"
                name="Correo1"
              />
            </div>
          </div>
  
          <!-- <div class="wrapper">
            <div class="select-btn">
              <span>Escolaridad </span>
  
              <select name="C" id="">
                <option value="T">tI</option>
                <option value="D">dI</option>
              </select>
              <i class="uil uil-angle-down"></i>
            </div>
            <div class="content">
              <div class="search">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Buscar" />
              </div>
              <ul class="options"></ul>
            </div>
          </div>-->
  
          <div class="input-box">
            <label>Escolaridad</label>
            <div class="select-box">
              <select name="escolaridad">
                <option hidden>--Escolaridad--</option>
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
            </div>
          </div>
  
          <div class="column-5">
            <div class="input-box">
              <label>Trabajo</label>
              <input
                type="text"placeholder="Escribe el Trabajo" id="t" name="Trabajo"/>
            </div>
  
            <div class="input-box">
              <label>Puesto</label>
              <input
                type="text"
                placeholder="Escribe el Puesto"
                id="p"
                name="puesto"
              />
            </div>
          </div>
  
          <div class="column-6">
            <div class="input-box">
              <label>Instagram</label>
              <input
                type="text"
                placeholder="Escribe el Instagram"
                id="ins"
                name="Instagram"
              />
            </div>
            <div class="input-box">
              <label>Religion</label>
              <input
                type="text"
                placeholder="Escribe la Religion"
                id="rel"
                name="Religion"
              />
            </div>
          </div>
  
          <div class="input-box">
            <label>Direccion</label>
            <input
              type="text"
              placeholder="Escribe la Direccion"
              required
              id="Di"
              name="Direccion"
            />
          </div>
    
       
          <div class="input-box">
            <label>Historia Clinica:</label>
          </div>
  
          <div class="input-box">
            <label>Antecedente Familiares</label>
            <textarea class="campo" placeholder="Escribe la Direccion" name="AntesF"></textarea>
          </div>
       
   
          <div div class="column-7">
            <div class="gender-box">
              <h3>Diagnosticado:</h3>
              <div class="gender-option">
                <div class="gender">
                  <input type="radio" id="check-Si-diag"  value="si" name="Diagnos" checked />
                  <label for="si" >Si</label>
                </div>
                <div class="gender">
                  <input type="radio" id="check-No-diag" value="No"  name="Diagnos"/>
                  <label for="no">No</label>
                </div>
              </div>
            </div>
            <div class="input-box">
              <label>Fecha del Diagnostico </label>
              <input
                type="date"
                placeholder="Fecha Diagnostico "
                name="Fecha_Diagnostico"
                value="dd/mm/aaaa"
                required
                
              />
            </div>
          </div>
  
          <div div class="column-7">
            <div class="gender-box">
              <h3>En Tratamiento:</h3>
              <div class="gender-option">
                <div class="gender">
                  <input type="radio" id="check-Si-tra" value="si" name="EnTratamien" checked />
                  <label for="si">Si</label>
                </div>
                <div class="gender">
                  <input type="radio" id="check-No-tra" value="no"  name="EnTratamien" />
                  <label for="no">No</label>
                </div>
              </div>
            </div>
  
            <div class="input-box">
              <label>Fecha del Tratamiento </label>
              <input
                type="date"
                placeholder="Fecha Tratamiento"
                name="Fecha_Tratamiento"
                required
                id="Fecha_Tratamiento"
              />
            </div>
          </div>
  
          <div class="gender-box">
            <h3>Tipo de Tratamiento:</h3>
            <div class="gender-option">
              <div class="gender">
                <input
                  type="radio"
                  id="check-psicologico"
                  name="Tipo_Tratamiento"
                  value="Psicologico"
                  checked
                />
                <label for="psicologico">Psicologíco</label>
              </div>
              <div class="gender">
                <input type="radio" id="check-psiquiátrico"  name="Tipo_Tratamiento" value="Psiquiatrico" />
                <label for="psiquiatrico">Psiquiátrico</label>
              </div>
  
              <div class="gender">
                <input type="radio" id="check-ambos" name="Tipo_Tratamiento" value="Ambos" />
                <label for="psiquiátrico">Ambos</label>
              </div>
              <div class="gender">
                <input type="radio" id="check-ambos"  name="Tipo_Tratamiento" value="Ninguno"/>
                <label for="psiquiátrico">Ninguno</label>
              </div>
            </div>
          </div>
  
          <div class="gender-box">
            <h3>Constancia de Citas :</h3>
            <div class="gender-option">
              <div class="gender">
                <input type="radio" id="check-semana" name="Citas" value="Cada Semana" checked />
                <label for="Cada_semana">Cada Semana</label>
              </div>
              <div class="gender">
                <input type="radio" id="check-dos_semana" name="Citas" value="15 Dias" />
                <label for="Dos semana">15 Dias</label>
              </div>
  
              <div class="gender">
                <input type="radio" id="check-mes" name="Citas" value="Cada mes" />
                <label for="mes">Cada mes</label>
              </div>
            </div>
          </div>
  
          <div class="input-box">
            <label>Psicologo Anterior</label>
            <input type="text" placeholder="Escribe el Nombre" name="Psicologo_A" />
          </div>
  
          <div class="input-box">
            <label>Cirugias</label>
            <textarea class="campo" placeholder="Cirugias:" name="Cirugias" id="Cirugias"> </textarea>
          </div>
  
          <div class="gender-box">
            <h3>Consulta En:</h3>
            <div class="gender-option">
              <div class="gender">
                <input type="radio" id="check-ma" name="consulta" value="MA" checked />
                <label for="MA">MA</label>
              </div>
              <div class="gender">
                <input type="radio" id="check-na" name="consulta" value="NA" />
                <label for="NA">NA</label>
              </div>
            </div>
          </div>
  
          <input class="nextbtn" type="submit" value="Registrar" onclick="" />
        </form>
      </section>
  


    <!--<script src="Mover.js"></script>-->
  </body>
</html>
<?php

}else
{
  header("location:../index.htm");
}
?>
