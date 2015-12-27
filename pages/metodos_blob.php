<?php
	//la función toma cualquier archivo, y retorna una variable que contiene
	//el archivo en binario que se cargará en la BD.Para funcionar necesita 
	//la ruta del archivo y su tamaño (se le puede proporcinar la info rápidamente
	//por programación: 
	//					$ruta_archivo_temp = $_FILES["archivito"]["tmp_name"]; 
	//					$tamanio = $_FILES["archivito"]["size"];
	//para llamarlo sería asi:
	//				include (metodos_blob.php);
	//				$contenido = archivo_blob_entra($_FILES["archivito"]["tmp_name"],
	//									$tamanio = $_FILES["archivito"]["size"]);
	function archivo_blob_entra($ruta_archivo_temp,$tamanio){
		if ( $archivo != "none" )
		 {
		    $fp = fopen($archivo, "rb");
		    $contenido = fread($fp, $tamanio);
		    $contenido = addslashes($contenido);
		    fclose($fp); 
		    return $contenido;

		    //lo que seguiria a continuación es meterlo en la BD como una variable cualquiera
		    //eso ya seria en el php que lo mando a llamar

		    /*$query = "INSERT INTO archivos VALUES (0,'$nombre','$titulo','$contenido','$tipo')";

		    mysql_query($qry);

		    if(mysql_affected_rows($conn) > 0)
		       print "Se ha guardado el archivo en la base de datos.";
		    else
		       print "NO se ha podido guardar el archivo en la base de datos.";*/
		 }
		 else
		    print "No se ha podido subir el archivo al servidor";
	}
	//http://programacion.net/articulo/manejo_de_datos_blob_con_php_y_mysql_194#datos_blob_agregar
	
?>