<?php
 
	class Conexion {

		public function conexionBd(){
			 if (!($link=mysql_connect("localhost","root","")))  
  				 {  
     				 echo "Error conectando a la base de datos.";  
      				 exit();  
   				}  
   			if (!mysql_select_db("prueba",$link))  
   				{  
      				echo "Error seleccionando la base de datos.";  
     				 exit();  
   				}  
   			return $link;
		}


		


     	public function crearSesion(){

     		$link = $this->conexionBd();
			  $result = mysql_query("SELECT * FROM usuario", $link);
    	
        if (isset($_POST["name"])) 
          {
            if (isset($_POST["pass"]))
              {

                $usuario = $_POST['name'];
                $pass = $_POST['pass'];

                while ($row = mysql_fetch_row($result)) 
                {
                  if($row[0]==$usuario && $row[1]==$pass)
                  {
                  $_SESSION["nombre_usuario"] = $usuario; 
                  header("location:../index2.php");
                  }else{
                    header("location:../index2.php");
                  }
      	        }
              }
    		  }



		     
     	}

      public function cerrarSesion(){
           @session_start();
            session_unset();
            session_destroy();

      }

    
	}
	




		

?>