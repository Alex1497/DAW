<?php
    session_start();
    require_once("modelo.php");
    eliminarProducto($_GET["id"]);
    $_SESSION["message"] = 'La imagen ha sido eliminada correctamente';
    header("location:index.php")
?>
