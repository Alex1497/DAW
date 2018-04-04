<?php
    session_start();
    require_once("util.php");
    if(isset($_POST["Id_Zombie"])) {
        editarEstadoZombie($_POST["Id_Zombie"],$_POST["Estado"]);
    } 
    header("location:index.php");
?>