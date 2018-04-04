<?php
session_start();
require_once("util.php");
if(isset($_POST["Nombre"])){
  if(isset($_POST["Apellido_P"])){
    if(isset($_POST["Apellido_M"])){
      if(isset($_POST["Estado"])){
        registrarZombie($_POST["Nombre"],$_POST["Apellido_M"],$_POST["Apellido_P"],$_POST["Estado"]);
        header('location: index.php');
      }
    }
  }
}
?>