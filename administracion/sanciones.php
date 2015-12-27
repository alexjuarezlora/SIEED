<?php
if (isset($_POST["name"])) 
{
    if (isset($_POST["pass"]))
    {
    $usuario = $_POST['name'];
    $pass = $_POST['pass'];
        if($usuario=="tec" && $pass=="tec")
        {
         $_SESSION["nombre_usuario"] = $usuario;   
        }
        if($usuario=="admin" && $pass=="admin")
        {
         $_SESSION["nombre_usuario"] = $usuario;   
        }
    
    }
}
        

    
    
?>
<!DOCTYPE html>
<html>
<head>
<title>SIEED</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="../layout/styles/fonts/deportes/flaticon.css"> 
<script type="text/javascript">

</script>
</head>
<body id="top">
<!-- ################################################################################################ -->

<!--Menu-->
<div class="wrapper row1">
<img src="../images/banner.png" >
  <header id="header" class="clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="#index.html">SIEED</a></h1>
    </div>
    <!-- ################################################################################################ -->
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="index.html">Inicio</a></li>
        <li><a href="#">Arte & Cultura</a></li>
        <li><a href="#">Deportes</a></li>

        <li><a href="#">Bandas de Guerra</a></li>
        <li><a href="#footer">Contacto</a></li>
      </ul>
    </nav>
    
  </header>
</div>
<!--Mapa de navegacion-->
<div class="wrapper row2">
  <div id="breadcrumb" class="clear"> 
    <!-- ################################################################################################ -->
    <ul>
    Bienvenido 
        <?php 
        if (!empty($_SESSION["nombre_usuario"])) 
        {
            echo $_SESSION["nombre_usuario"];
            echo "<a href='#comments'>&nbsp;&nbsp;&nbsp;&nbsp;Cerrar Sesión</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }else {
          echo "Invitado(a) <a href='#comments'>&nbsp;&nbsp;&nbsp;&nbsp;Iniciar Sesión</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        
        ?>  
        
      <li><a href="#">Inicio</a></li>
      <li><a href="#">Eventos Deportivos</a></li>
 </ul>
    <!-- ################################################################################################ -->
  </div>
</div>


<!-- Cuerpo de la página-->

<div class="wrapper row3">
  <main class="container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="sidebar one_quarter first"> 
      <!-- ################################################################################################ -->   
        
        <?php
      include_once("../pages/menu.php");
      $menu = new Menu();
      $direccion ="../pdfs/";
      $menu->usuarioVisitante($direccion);
      $menu->verificaUsuario();

      ?>

     
    </div>
    
    <div class="content three_quarter"> 
    
    <ul class="nospace group">

          <li class="btmspace-50">
            <article class="service largeicon"><i class="icon nobg circle fa fa-ban"></i>
              <h6 class="heading"><a href="#">Sanciones</a></h6>
              <p>Aqui podrá seleccionar a la gente sancionada para competir</p><br>
              <form method="POST" action="sanciones_2.php">

              <div id="comments">
              <label for=""><strong>Seleccione entre Personal de Apoyo, Alumno, o Entrenador para sancionar</strong></label>
              <select id="tipo" required>
                <option value="">---Seleccione un tipo---</option>
                <option value="Personal de Apoyo">Personal de Apoyo</option>
                <option value="Alumno">Alumno</option>
                <option value="Entrenador">Entrenador</option>
              </select>
            <label for=""><strong>Seleccione tecnológico de procedencia.</strong> Es decir, con quién venía participando</label>
             <select id="tecnologico">
                <option value="">---Seleccione un Tecnologico---</option>
                <option value="Instituto Tecnológico de Puebla">Instituto Tecnológico de Puebla</option>
                <option value="Instituto Tecnológico de Pachuca">Instituto Tecnológico de Pachuca</option>
                <option value="Instituto Tecnológico del Occidente del Estado de Hidalgo">Instituto Tecnológico del Occidente del Estado de Hidalgo</option>
             </select>
             <input type="submit" value="Mostrar">
             <input type="reset" value="Limpiar campos">
              </form>
              </div>
           </article>
              
             
            <article class="service largeicon"><i class="icon nobg circle fa fa-list"></i> 
            <h6 class="heading"><a href="#">Consulta de Sancionados</a></h6>
            <div id="comments">
              <label for=""><strong>Seleccione una zona de competencia</strong></label>
              <select id="zona" required>
                <option value="">---Seleccione una Zona---</option>
                <option value="I">Zona I</option>
                <option value="II">Zona II</option>
                <option value="III">Zona III</option>
                <option value="IV">Zona IV</option>
                <option value="V">Zona V</option>
                <option value="VI">Zona VI</option>
                <option value="VI">Zona VI</option>
                <option value="VII">Zona VII</option>
                <option value="VIII">Zona VIII</option>
                <option value="IX">Zona IX</option>
                <option value="X">Zona X</option>
                <option value="XI">Zona XI</option>
                <option value="XII">Zona XII</option>
                <option value="XIII">Zona XIII</option>
                <option value="XIV">Zona XIV</option>
                <option value="XV">Zona XV</option>
              </select>
            </div>
              <div class="scrollable">
              <label for=""><strong>Lista de sancionados</strong> </label>
                <table id="Lista de sancionados" >
                  <thead title="Sancionados a nivel nacional">
                    <tr>
                      <th>Institucion</th>
                      <th>Zona</th>
                      <th>Descalificar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Instituto Tecnologico de Pachuca</a></td>
                      <td>Zona 8</td>
                      <td><a href="#" ><i class="fa fa-2x fa-remove"  ></a></i></td>
                    </tr>
                    <tr>
                      <td>Instituto Tecnologico de Celaya</a></td>
                      <td>Zona 3</td>
                      <td><a href="#" ><i class="fa fa-2x fa-remove"  ></a></i></td>
                    </tr>
                    <tr>
                      <td>Instituto Tecnologico de Leon</a></td>
                      <td>Zona 6</td>
                      <td><a href="#" ><i class="fa fa-2x fa-remove"  ></a></i></td>
                    </tr>
                    <tr>
                      <td>Instituto Tecnologico de Chihuahua/a></td>
                      <td>Zona 12</td>
                      <td><a href="#" ><i class="fa fa-2x fa-remove"  ></a></i></td>
                    </tr>
                  </tbody>
                </table>

                <table id="basquetbolf_tabla" style="display:none">
                  <thead title="Clasificados a basquetbol femenil">
                    <tr>
                      <th>Institucion</th>
                      <th>Zona</th>
                      <th>Descalificar</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                      <td>Instituto Tecnologico de Celaya</a></td>
                      <td>Zona 3</td>
                      <td><a href="#" ><i class="fa fa-2x fa-remove"  ></a></i></td>
                    </tr>
                    <tr>
                      <td>Instituto Tecnologico de Leon</a></td>
                      <td>Zona 6</td>
                      <td><a href="#" ><i class="fa fa-2x fa-remove"  ></a></i></td>
                    </tr>
                    <tr>
                      <td>Instituto Tecnologico de Chihuahua</td>
                      <td>Zona 12</td>
                      <td><a href="#" ><i class="fa fa-2x fa-remove"  ></a></i></td>
                    </tr>
                  </tbody>
                </table>
                </div></div>
           </article>
          </li>
        </ul>
    </div>

    <!-- / main body -->
    <div class="clear"></div>
  </main>

    
 
  <!--Pie de pagina-->

   <div class="wrapper row4">
  <footer id="footer" class="clear"> 
    <!-- ################################################################################################ -->
    <div class="one_third first">
      <h6 class="title">Dirección del Tecnológico Nacional de Mexico</h6>
      <address class="btmspace-15">
      Arcos de Belén # 79, Colonia Centro, Delegación Cuauhtémoc<br> C.P. 06010, México, D.F.<br>
Fray Servando Teresa de Mier Núm. 127, Colonia Centro, Delegación Cuauhtémoc, <br>C.P. 06080, México, D.F.<br>
      </address>
      <ul class="nospace">
        <li class="btmspace-10"><span class="fa fa-phone"></span> +00 (123) 456 7890</li>
        <li><span class="fa fa-envelope-o"></span> deporte@hotmail.com</li>
      </ul>
    </div>
    <div class="one_third ">
      <h6 class="title">Mapa del Sitio</h6>
      <ul class="nospace linklist">
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Arte y Cultura</a></li>
        <li><a href="#">Deportes</a></li>
        <li><a href="#">Bandas de Guerra</a></li>
        <li><a href="#">Contacto</a></li>
      </ul>
    </div>
    
    <div class="one_third">
      <h6 class="title">Recibe avisos en tu correo</h6>
      <form class="btmspace-30" method="post" action="#">
        <fieldset>
          <legend>Newsletter:</legend>
          <input class="btmspace-15" type="email" value="" placeholder="Email">
          <button type="submit" value="submit">Enviar</button>
        </fieldset><br><br>
        <h6 class="title">Siguenos en redes sociales</h6>
      </form>
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="https://www.facebook.com/pages/Tecnol%C3%B3gico-Nacional-De-M%C3%A9xico/732984606793906?fref=ts" target="_blank"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
        <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a class="faicon-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
        <li><a class="faicon-tumblr" href="#"><i class="fa fa-tumblr"></i></a></li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright TecNM - ALGUNOS DERECHOS RESERVADOS © 2015<a href="#">SIEED.com.mx</a></p>
    <p class="fl_right">Desarrollado por:<a target="_blank" href="http://www.itpachuca.com/" title="Instituto tecnológico de pachuca">ITP</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>

<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a> 
<!-- JAVASCRIPTS -->
<!--script para ocultar y desocultar tablas-->
<script>
function muestra_tabla(){

  switch(document.getElementById("selec_disciplina_tabla").value){
    case "":
        document.getElementById("basquetbolf_tabla").setAttribute("style","display:none");
        document.getElementById("futbolv_tabla").setAttribute("style","display:none");
    break;
    case "futbolv":

        document.getElementById("basquetbolf_tabla").setAttribute("style","display:none");
        document.getElementById("futbolv_tabla").removeAttribute("style");
    break;
    case "basquetbolf":
        document.getElementById("futbolv_tabla").setAttribute("style","display:none");
        document.getElementById("basquetbolf_tabla").removeAttribute("style");

    break;

  }

}
function validarClasif(){
  if(document.getElementById("zona").value==""||document.getElementById("disciplina").value==""){
    alert("No ha seleccionado Zona/Disciplina. Favor de revisar");
    return false;
  }
}

</script>

<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
<script src="../layout/scripts/jquery.flexslider-min.js"></script>
</body>
</html>