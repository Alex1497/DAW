<?php


function connectDB(){
  $mysql = mysqli_connect("localhost","root","","DHARMA");
  $mysql->set_charset("utf8");
  return $mysql;
}

function disconnectDB($mysql){
    mysqli_close($mysql);
}


function ingresarCodigo($input,$estado){
  $db = connectDB();
  if($db != NULL){
    $query = 'INSERT INTO sesion(input,estado,hora) VALUES (?,?,CURRENT_TIMESTAMP())';
     if (!($statement = $db->prepare($query))) {
       die("Preparation failed: (" . $db->errno . ") " . $db->error);
     }
     if (!$statement->bind_param("ss", $input, $estado)) {
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


function getSesiones(){
   $db = connectDB();
   if($db != NULL){
     $query = 'SELECT * FROM sesion ORDER BY hora DESC';
     $result = mysqli_query($db,$query);
      if(mysqli_num_rows($result) > 0){
            echo '<table class="table" ><tr><th class="thead-light">Input</th><th class="thead-light">Estado</th><th class="thead-light">Hora</th></tr>';
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row["input"]."</td>";
                echo "<td>".$row["estado"]."</td>";
                echo "<td>".$row["hora"]."</td>";
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

function getSystemFailure(){
        $db = connectDB();
        $query = "SELECT * FROM sesion WHERE estado = 'SYSTEM FAILURE'";
        $result = mysqli_query($db,$query);
        if(mysqli_num_rows($result) > 0){
            echo '<table class="table" ><tr><th class="thead-light">Input</th><th class="thead-light">Estado</th><th class="thead-light">Hora</th></tr>';
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row["input"]."</td>";
                echo "<td>".$row["estado"]."</td>";
                echo "<td>".$row["hora"]."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        mysqli_free_result($result);
        disconnectDB($db);
}

function getNumFailures(){
   $db = connectDB();
   $query = "SELECT COUNT('id') FROM sesion WHERE estado = 'SYSTEM FAILURE'";
    //Pa' debugear
    
   $result = mysqli_query($db,$query);
   $line = mysqli_fetch_array($result,MYSQLI_NUM);
   //var_dump($line); 
    //die('');
   disconnectDB($db);
   return $line[0];
 }
 
 function getNumSuccess(){
   $db = connectDB();
   $query = "SELECT COUNT('id') FROM sesion WHERE estado = 'SUCCESS'";
   $result = mysqli_query($db,$query);
   $line = mysqli_fetch_array($result, MYSQLI_BOTH);
   disconnectDB($db);
   return $line[0];
 }
 


?>