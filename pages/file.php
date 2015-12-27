<?php
error_reporting(E_ERROR);
session_start();
?>
<?php


class File
{
    public $nombre = "lineamientos.pdf";
    public $numArchivo = "";


    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function verificar()
    {
        include_once("../pages/conexion.php");
        $verifica="";
        $conexion = new Conexion();
        $link = $conexion->conexionBd($_SESSION['usuario'], $_SESSION['password']);
        $result = mysql_query("SELECT * FROM archivos", $link);
        while ($row = mysql_fetch_row($result)) {
            $verifica=$_FILES["$row[0]"];

        }
        if($verifica>0){
            echo "No selecciono ningun archivo";
        }

    }


    public function  saveFilebd()
    {
        include_once("../pages/conexion.php");
        $conexion = new Conexion();
        $link = $conexion->conexionBd($_SESSION['usuario'], $_SESSION['password']);
        $result = mysql_query("SELECT * FROM archivos", $link);
        while ($row = mysql_fetch_row($result)) {

            $archivo = $_POST["$row[0]"];
            if ($archivo) {
                $this->setNombre("../pdfs/" . $row[2]);
                if (!$_FILES["$row[0]"]["error"] > 0) {
                    move_uploaded_file($_FILES["$row[0]"]['tmp_name'],
                        $this->nombre);
                    echo "Archivo: " . $_FILES["$row[0]"]['name'] . " se subio exitosamente<br>";
                }

            }


        }
    }

    public function actulizaNombreLink()
    {
        include_once("../pages/conexion.php");
        $conexion = new Conexion();
        $link = $conexion->conexionBd($_SESSION['usuario'], $_SESSION['password']);
        $result= mysql_query("SELECT * FROM archivos",$link);
        if ($link) {
            while ($row = mysql_fetch_row($result)) {
                $aux = $_POST["$row[0]"];
                $aux2 = str_replace(" ","_", $aux.".pdf");
                //echo $aux."<br>".$aux2."<br>";
                rename("../pdfs/$row[2]","../pdfs/$aux2");
                mysql_query("UPDATE archivos SET NOMBRE_LINK='$aux', NOMBRE_ARCHIVO='$aux2' where idARCHIVOS = '$row[0]'",$link);
            }
        }
    }

}

$file = new File();
$file->actulizaNombreLink();
$file->saveFilebd();
header( "refresh:2; url=../administracion/administracion_sistema.php" );


?>