<?php
    session_start();
    if(isset($_SESSION["usuario"])){
        include("_header.html");
        include("_add_form.html");
        include("_footer.html");
    }
    else{
        header("location:index.php");
    }
?>

