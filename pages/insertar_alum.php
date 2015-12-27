<?php
if (!isset($_SESSION)) { //NOS PERMITE LLEVAR LA SESION A LAS PAGINAS :3
    session_start(); 
}

/*
echo $_POST["nombre"];
echo $_POST["apellido_p"];
echo $_POST["apellido_m"];
echo $_POST["curp"];
echo $_POST["disciplina"];
echo $_POST["tipo_sangre"];
echo $_POST["carrera"];
echo $_POST["semestre"];
echo $_POST["sexo"];
echo $_POST["fecha_nacimiento"];
echo $_POST["peso"];
echo $_POST["estatura"];
echo $_POST["padecimiento"];
echo $_POST["foto_ruta"];*/


//metamos los datos

 include_once("../pages/conexion.php");
 $conexion = new Conexion();
 $link = $conexion->conexionBd($_SESSION['usuario'],$_SESSION['password']);
 
 if ($link)
 {
      mysql_query("SET NAMES 'utf8'");

        $sql="INSERT INTO ALUM (NC,AL_NOMBR,AL_AP_P,AL_AP_M,AL_SEX,AL_SEMES,AL_AUTORIZACION,AL_CURP,AL_FECH_NAC,AL_PESO,AL_ESTATURA,AL_PADECIMIENTOS,AL_ALERGIAS,AL_TIP_SANGRE,CARRERA_idCARRERA,TEC_TEC_NO) ";
        $sql=$sql."VALUES ('".$_POST["n_control"]."','".$_POST["nombre"]."','".$_POST["apellido_p"]."','".$_POST["apellido_m"]."','".$_POST["sexo"]."','".$_POST["semestre"]."','0','".$_POST["curp"]."','".$_POST["fecha_nacimiento"]."','". $_POST["peso"]."','".$_POST["estatura"]."','".$_POST["padecimiento"]."','".$_POST["alergia"]."','".$_POST["tipo_sangre"]."','".$_POST["carrera"]."','".$_SESSION['NO_TEC']."')";

        echo $sql;
        mysql_query($sql,$link);
        echo "¡Gracias! Hemos recibido sus datos.\n";
  
 }
 

 
?>