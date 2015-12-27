<?php
session_start();
session_unset();
session_destroy();

 echo "<p align='center'><strong>Cerrando Sesion...</strong></p>";		
 header( "refresh:2; url=../index1.php" ); 

?>