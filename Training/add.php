<?php
    require_once('util.php');
    include("partial/_head.html");
    $data = getById(connectDB(), $_GET["id"]);
    include("partial/_editar.html");
    include("partial/_footer.html");
?>