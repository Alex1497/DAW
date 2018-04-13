<?php

//CONECTAR CON BASE DE DATOS (USAR EN CADA FUNCION)
function connectDB(){
  $mysql = mysqli_connect("localhost","root","","zombies");
  $mysql->set_charset("utf8");
  return $mysql;
}

//DESCONECTAR CON BASE DE DATOS (USAR EN CADA FUNCION)
function disconnectDB($mysql){
  mysqli_close($mysql);
}







function getDescripcionZombie(){
    $db = connectDB();
    if ($db != NULL) {
        
        $query = 'SELECT Nombre,Apellido_P, Apellido_M FROM zombies_table';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        echo '<table class="table">'; 
        echo  '<thead class="thead-dark">'; 
        echo  '<tr>';
        echo      '<th scope="col">Nombre</th>';
        echo         '<th scope="col">Apellido Paterno</th>' ;
        echo          '<th scope="col">Apellido Materno</th>' ;
        echo        '</tr>'; 
            '</thead>'; 
        echo '<tbody>'; 
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                 echo '<tr>';
                 echo '<td>'.$row["Nombre"].'</td>';
                 echo '<td>'.$row["Apellido_P"].'</td>';
                 echo '<td>'.$row["Apellido_M"].'</td>';
                 echo '</tr>';
            }
        }
        echo'</tbody>';
    echo '</table>';
    }
}

function getDescripcionZombieById($idZombie){
    $db = connectDB();
    if ($db != NULL) {
        
        $query = 'SELECT Nombre, Apellido_P, Apellido_M FROM zombies_table WHERE id_Zombie ="'.$idZombie.'"';
        //Pa' debugear
        //var_dump($query); 
        //die('');
        $results = mysqli_query($db,$query);
        disconnectDB($db);
        echo '<table class="table">'; 
        echo  '<thead class="thead-dark">'; 
        echo  '<tr>';
        echo      '<th scope="col">Nombre</th>';
        echo         '<th scope="col">Apellido Paterno</th>' ;
        echo          '<th scope="col">Apellido Materno</th>' ;
        echo        '</tr>'; 
            '</thead>'; 
        echo '<tbody>'; 
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)) {
                 echo '<tr>';
                 echo '<td>'.$row["Nombre"].'</td>';
                 echo '<td>'.$row["Apellido_P"].'</td>';
                 echo '<td>'.$row["Apellido_M"].'</td>';
                 echo '</tr>';
            }
        }
        echo'</tbody>';
    echo '</table>';
    }
}