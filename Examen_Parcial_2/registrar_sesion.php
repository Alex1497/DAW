<?php
session_start();
require_once("util.php");
if(isset($_POST["input"])){
  if((isset($_POST["input"]))=="4 8 15 16 23 42"){
    $estado = "SUCCESS";
  }
  else{
    $estado = "SYSTEM FAILURE";
  }
  ingresarCodigo($_POST["input"],$_POST[$estado]);
  header('location: index.php');
}

/*
if( isset($_SESSION["idRol"]) ){
        include("partial/_head.html");
         if($_SESSION["idRol"]== 1492){
            include("partial/_navbarCEO.html");
        }
        else if($_SESSION["idRol"]== 1493){
            include("partial/_navbarCoordinador.html");
        }
         else{
            include("partial/_navbarEmpleado.html");
        }
        include("partial/_foro_empleado.html");
        include("partial/_scripts.html");
        include("partial/_footer.html"); 
        
    }else{
        $_SESSION["errorLogin"] = "Es necesario iniciar sesión";
        header("location:index.php");
    }
*/
?>