
<?php
    require_once("util.php");
    $total = totalZombies();
    $infeccion = totalEstado('Infeccion');
    $coma = totalEstado('Coma');
    $transformacion = totalEstado('Transformacion');
    $completamenteMuerto = totalEstado('Completamente Muerto');
    $noMuerto = noMuertos();
    $res =  ' <br><br><h3>Zombies Totales: '.$total[0].'</h3><br>
    <h3>Zombies por estado</h3>
    <ul>
        <li> Infeccion '.$infeccion[0].'</li>
        <li>Coma: '.$Coma[0].'</li>
        <li> Transformacion: '.$transformacion[0].'</li>
        <li>Completamente Muertos: '.$completamenteMuerto[0].'</li>
    </ul>
    <br>
    <h3>Zombies no completmente muertos:'.$noMuerto[0].' </h3s>';
    echo $res;
?>