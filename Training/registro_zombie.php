<?php
    require_once("util.php");
    include("partial/_head.html");
    echo '<h2>Zombies Registrados</h2>';
    echo getZombies();
    include("partial/_footer.html");
    require_once("util.php");
    $total = totalZombies();
    $infeccion = totalEstado('Infeccion');
    $coma = totalEstado('Coma');
    $transformacion = totalEstado('Transformacion');
    $completamenteMuerto = totalEstado('Completamente Muerto');
    $noMuerto = noMuertos();
    $res =  ' <br><br><h4>Zombies Totales: '.$total[0].'</h4><br>
    <h4>Zombies por estado:</h4>
    <br>
    <ul>
        <li> Infeccion '.$infeccion[0].'</li>
        <li>Coma: '.$coma[0].'</li>
        <li> Transformacion: '.$transformacion[0].'</li>
        <li>Completamente Muertos: '.$completamenteMuerto[0].'</li>
    </ul>
    <br>
    <h4>Zombies que no están completamente muertos:'.$noMuerto[0].' </h4>';
    echo $res;
?>