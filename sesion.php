<?php
session_start();
class UbiGeo
  {
    public function __construct()
      {
        //Es el acceso al desarrollo local...
        $cn = mysqli_connect("localhost","root","","dual");        
        mysqli_query($cn, "SET NAMES 'UTF8'");
      }                    

      public function boton_Enviar($name, $email, $text)
      {
        //sql
        $cad = "INSERT INTO informacionn(informacion_id, informacion_nombre, informacion_correo, informacion_mensaje) 
                            VALUES(NULL, '$name', '$email', '$text')";

        $cn = mysqli_connect("localhost","root","","dual");  

        if(mysqli_query($cn,$cad)){
          echo "1";
          }else{
          echo "0";
         }
      }

      public function boton_Borrar($email)
      {
        //sql
        $cad = "DELETE FROM informacionn WHERE informacion_correo ='$email' ";
        $cn = mysqli_connect("localhost","root","","dual");

        if(mysqli_query($cn,$cad)){
            echo "1";
        }else{
          echo "0";
        }
      }

      public function boton_Modificar($name, $text, $email)
      {
        //sql
        $cad = "UPDATE informacionn SET informacion_nombre ='$name', informacion_texto ='$text' WHERE informacion_correo= '$email' ";
        $cn = mysqli_connect("localhost","root","","dual");

        if(mysqli_query($cn,$cad)){
            echo "1";
        }else{
          echo "0";
        }
      }
}
/****************************************************************************************/      
$obUbigeo = new UbiGeo();

  switch ($_GET['accion']) {
    
    case 'registrar': 
      $obUbigeo->boton_Enviar($_GET['name'], $_GET['email'], $_GET['text']);                             
    break;

    case 'borrar': 
      $obUbigeo->boton_Borrar($_GET['email']);                             
    break;  

    case 'modificar': 
      $obUbigeo->boton_Modificar($_GET['name'], $_GET['text'], $_GET['email']);                             
    break;          
}
?>