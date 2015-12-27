<?php
session_start();
?>
<?php
    include_once("../pages/conexion.php");
    $conexion = new Conexion();
    $link = $conexion->conexionBd($_SESSION['usuario'], $_SESSION['password']);
    $nombreLink = $_POST['nuevo'];
    mysql_query("INSERT INTO archivos (NOMBRE_LINK) VALUES ('$nombreLink')",$link);

    echo "Se ha creado nuevo aviso<br>" . $nombreLink . "<br>";
    echo "Vaya y seleccione un archivo .pdf para mostrar en este aviso";

    header("refresh:2; url=../administracion/administracion_sistema.php");

?>