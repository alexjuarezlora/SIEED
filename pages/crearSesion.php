<?php
error_reporting(E_ERROR);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inicio Sesion</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
require("conexion.php");
$conexion = new Conexion();
if (isset($_POST['name']) && $_POST['name']) {

    $link = $conexion->conexionBd($_POST['name'], $_POST['pass']);
    mysql_query("SET NAMES 'utf8'");
    if ($link) {
        $result = mysql_query("SELECT * FROM tec", $link);
        while ($row = (mysql_fetch_row($result))) {
            if ($_POST['name'] == $row[1]) {
                $_SESSION['nombre'] = "tec";
                $_SESSION['usuario'] = $_POST['name'];
                $_SESSION['password'] = $_POST['pass'];
                

                $result2 = mysql_query("SELECT * FROM tec WHERE TEC_U='" . $_SESSION['usuario'] . "'", $link);
                while ($row = mysql_fetch_row($result2)) {
                    echo "<p align='center'><strong>Benvenido: " . $row[2];
                    $_SESSION['nombre_tec'] = $row[2];
                    $_SESSION['direccion'] = $row[7] . " " . $row[8] . " " . $row[9];
                    $_SESSION['email'] = "Email: " . $row[5];
                    $_SESSION['no_tec']=$row[0];
                }
            }
        }

        $result = mysql_query("SELECT * FROM admin", $link);
        while ($row = (mysql_fetch_row($result))) {
            if ($_POST['name'] == $row[1]) {
                $_SESSION['nombre'] = "admin";
                $_SESSION['usuario'] = $_POST['name'];
                $_SESSION['password'] = $_POST['pass'];
                $_SESSION['nomnbre_admin'] = $row[2];
                $_SESSION['email']="Email: ".$row[3];
                echo "<p align='center'><strong>Bienvenido: " . $_SESSION['nombre'];

            }
        }

        $result = mysql_query("SELECT * FROM del_zona", $link);
        while ($row = (mysql_fetch_row($result))) {
            if ($_POST['name'] == $row[1]) {
                $_SESSION['nombre'] = "delegado";
                $_SESSION['usuario'] = $_POST['name'];
                $_SESSION['password'] = $_POST['pass'];
                $result2 = mysql_query("SELECT * FROM del_zona WHERE del_u='" . $_SESSION['usuario'] . "'", $link);
                while ($row = mysql_fetch_row($result2)) {
                    echo "<p align='center'><strong>Benvenido: " . $row[2]." ".$_SESSION['nombre'];
                    $_SESSION['nombre_del'] = $row[2]." ".$row[3];
                    $_SESSION['email'] = "Email: " . $row[5];
                    $_SESSION['tel'] = $row[6];

                }
            }
        }


    }


}

?>
</body>
</html>

<?php
header("refresh:2; url=../index1.php#modal");

?>
