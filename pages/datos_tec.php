<?php
if (!isset($_SESSION)) 
{ //NOS PERMITE LLEVAR LA SESION A LAS PAGINAS :3
    session_start(); 
}
class Consulta_datos
{
public function ret_dat()
{
    //realizamos laa consultas necesarias para el perfil y las guardamos para imprimirlas 
    //Primero ver si es federal o superior
    include_once("../pages/conexion.php");
    $conexion = new Conexion();
    $link = $conexion->conexionBd($_SESSION['usuario'],$_SESSION['password']);
     if ($conexion)
    {
      mysql_query("SET NAMES 'utf8'");
      $sql="SELECT tipo_tec,ZONA_NO_ZONA,TEC_EMAIL,TEC_TEL,TEC_CALLE,TEC_COL,TEC_NO_EXTERIOR FROM TEC WHERE TEC_NO=".$_SESSION['no_tec']."";
      $result = mysql_query($sql,$link);
      $err=mysql_error();
      if($err==null)
        {
          
             while ($row = mysql_fetch_row($result))
             {
       //      echo $row[0].$row[1].$row[2].$row[3].$row[4].$row[5].$row[6];
               $dat=$row;
             }
        }
        else
        {
            echo "ERROR!".$err;
        }
       
      return $dat;
      mysql_close();
    }
    
    
}


}





?>
