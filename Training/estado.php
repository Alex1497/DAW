<?php
    require_once("util.php");
    $r1 = getZombiesEstado($_GET["Estado"]);
    $Total = totalEstado($_GET["Estado"]);
    $r3 = '<h4 id ="reg">Zombies por Estado</h4>'. ' '.$_GET["Estado"].' -- '.$Total[0].'</h5>';
    echo $r3;
?>