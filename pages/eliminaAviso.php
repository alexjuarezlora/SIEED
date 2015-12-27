<?php
session_start();
?>

<?php
    echo "php para eliminar<br>";
include_once("../pages/conexion.php");
$conexion = new Conexion();
$link = $conexion->conexionBd($_SESSION['usuario'], $_SESSION['password']);


    $id= $_POST['elimina'];
    mysql_query("DELETE FROM archivos WHERE idARCHIVOS=$id;",$link);
    echo "Aviso Eliminado<br>";
    $result = mysql_query("SELECT NOMBRE_ARCHIVO FROM archivos WHERE idARCHIVOS=$id;",$link);
    //echo $result;

while ($row = mysql_fetch_row($result)) {
        $dir = "../pdfs/".$row[0];
       echo $row[0]."<br>";
        if(file_exists($dir))
        {
            if(unlink($dir))
                print "El archivo fue borrado";
        }
        else
            print "Este archivo no existe";


}



header("refresh:2; url=../administracion/administracion_sistema.php");
?>

