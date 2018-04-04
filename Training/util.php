<?php
function connectDB(){
  $mysql = mysqli_connect("localhost","root","","zombies");
  $mysql->set_charset("utf8");
  return $mysql;
}

function disconnectDB($mysql){
    mysqli_close($mysql);
}

function registrarZombie($Nombre,$Apellido_M,$Apellido_P,$Estado){
  $db = connectDB();
  if($db != NULL){
    $query = 'INSERT INTO zombies_table(Nombre,Apellido_M,Apellido_P,Estado,Transicion) VALUES (?,?,?,?,CURRENT_TIMESTAMP())';
     if (!($statement = $db->prepare($query))) {
       die("Preparation failed: (" . $db->errno . ") " . $db->error);
     }
     if (!$statement->bind_param("ssss", $Nombre, $Apellido_M, $Apellido_P, $Estado)) {
        die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
     }
     if (!$statement->execute()) {
       die("Execution failed: (" . $statement->errno . ") " . $statement->error);
     } 
     disconnectDB($db);
     return true;
  }
  return false;
}

function editarEstadoZombie($Id_Zombie, $Estado){
  $db = connectDB();
  if(db != NULL){
      $query = 'UPDATE zombies_table SET Estado=?, Transicion = CURRENT_TIMESTAMP() WHERE Id_Zombie=?';
       if (!($statement = $db->prepare($query))) {
          die("Preparation failed: (" . $db->errno . ") " . $db->error. '      Completa los campos requeridos');
      }
      // Binding statement params 
      if (!$statement->bind_param("ss",$Estado,$Id_Zombie)) {
          die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error. '      Los valores no han sido llenados correctamente'); 
      }
      // update execution
      if ($statement->execute()) {
          echo 'There were ' . mysqli_affected_rows($mysql) . ' affected rows';
      } else {
          die("Update failed: (" . $statement->errno . ") " . $statement->error. '       Los valores no han sido llenados correctamente');
      }
       disconnectDB($db); //Ciera la bae de datos
  }
  
}

function getZombies(){
   $db = connectDB();
   if($db != NULL){
     $query = 'SELECT * FROM zombies_table ORDER BY Registro ASC';
     $result = mysqli_query($db,$query);
      if(mysqli_num_rows($result) > 0){
            echo '<table class="table" ><tr><th class="thead-light">Nombre</th><th class="thead-light">Apellidos</th><th class="thead-light">Estado</th><th class="thead-light">Registro</th><th class="thead-light">Transicion</th></tr>';
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row["Nombre"]."</td>";
                echo "<td>".$row["Apellido_P"]." ".$row["Apellido_M"]."</td>";
                echo "<td>".$row["Estado"]."</td>";
                echo "<td>".$row["Registro"]."</td>";
                echo "<td>".$row["Transicion"]." <a href='add.php?id=".$row["Id_Zombie"]."'class='right btn-flat modal-trigger' id='".$row["Id_Zombie"]."' name ='".$row["id_user"]."'><i class='  material-icons' >mode_edit</i></a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        mysqli_free_result($result);
        disconnectDB($db);
        return true;
   }
   return false;
}

function totalZombies(){
   $db = connectDB();
   $query = "SELECT COUNT( 'Nombre') FROM zombies_table";
   $result = mysqli_query($db,$query);
   $line = mysqli_fetch_array($result, MYSQLI_BOTH);
   disconnectDB($db);//Ciera la base de datos
   return $line;
}


function totalEstado($Estado){
   $db = connectDB();
   $query = "SELECT COUNT( 'Nombre') FROM zombies_table WHERE Estado ='".$Estado."'";
   $result = mysqli_query($db,$query);
   $line = mysqli_fetch_array($result, MYSQLI_BOTH);
   disconnectDB($db);
   return $line;
}


function noMuertos(){
   $db = connectDB();
   $query = "SELECT COUNT('Nombre') FROM zombies_table WHERE Estado !=  'completamente muerto'";
   $result = mysqli_query($db,$query);
   $line = mysqli_fetch_array($result, MYSQLI_BOTH);
   disconnectDB($db);
   return $line;
 }


function getZombiesEstado($Estado){
        $db = connectDB();
        $query = "SELECT * FROM zombies_table WHERE Estado = '".$Estado."'";
        $result = mysqli_query($db,$query);
        if(mysqli_num_rows($result) > 0){
            echo '<table class="table" ><tr><th class="thead-light">Nombre</th><th class="thead-light">Apellidos</th><th class="thead-light">Estado</th><th class="thead-light">Registro</th><th class="thead-light">Transicion</th></tr>';
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row["Nombre"]."</td>";
                echo "<td>".$row["Apellido_M"]." ".$row["Apellido_P"]."</td>";
                echo "<td>".$row["Estado"]."</td>";
                echo "<td>".$row["Registro"]."</td>";
                echo "<td>".$row["Transicion"]."<a href='add.php?id=".$row["id_user"]."'class='right btn-flat modal-trigger' id='".$row["id_user"]."' name ='".$row["id_user"]."'><i class='  material-icons' >mode_edit</i></a></td>";
                //'<button type="button" class="btn btn-danger"href='add.php?id=".$row["id_user"]."'class='right btn-flat modal-trigger' id='".$row["id_user"]."' name ='".$row["id_user"]."' >Editar</button>'
                echo "</tr>";
            }
            echo "</table>";
        }
        mysqli_free_result($result);
        disconnectDB($db);
       
}
/*

  function getZombiesEstado($Estado){
        $conexion = conectarBD();
        $sql = "SELECT * FROM Zombies WHERE Estado = '".$Estado."'";
        $result = mysqli_query($conexion,$sql);
        if(mysqli_num_rows($result) > 0){
            echo '<table class="responsive-table striped ses" ><tr><th>Nombre</th><th>Apellidos</th><th>Estado</th><th>Registro</th><th>Transicion</th></tr>';
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row["Nombre"]."</td>";
                echo "<td>".$row["Apellido_P"]." ".$row["Apellido_M"]."</td>";
                echo "<td>".$row["Estado"]."</td>";
                echo "<td>".$row["Registro"]."</td>";
                echo "<td>".$row["Transicion"]."<a href='add.php?id=".$row["id_user"]."'class='right btn-flat modal-trigger' id='".$row["id_user"]."' name ='".$row["id_user"]."'><i class='  material-icons' >mode_edit</i></a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        mysqli_free_result($result);
        cerrarBD($conexion);
}
*/

 function getById($db, $id){
       $query='SELECT * FROM zombies_table WHERE Id_Zombie = '.$id.''; 
       $result = mysqli_query($db,$query);
       $line = mysqli_fetch_array($result, MYSQLI_BOTH);
       disconnectDB($db);
       return $line;
}

/*  mysqli_free_result($results);
     disconnectDB($db);
     return true;
  }
  return false;
  */


?>