<?php include("_header.html"); ?>
<?php
$nameErr = $emailErr = $genderErr = "";
$name = $email = $gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "*El nombre es requerido";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "*Sólo son permitidos letras y espaciosS"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "*El correo es requerido";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
  if (empty($_POST["gender"])) {
    $genderErr = "*El género es requerido";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}?>


        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <!--<form method="post" action="login.php">-->
            <p>
                <label>
                    <i class="material-icons prefix">account_circle</i>Nombre:
                    <input id="name" type="text" class="validate" name="name" >
                    <span class="error"> <?php echo $nameErr;?></span>
                </label>
            </p>
            <br>
            <p>
                <label>Correo:
                    <input type="email" placeholder="nombre@dominio.com" name="email" value="<?php echo $email;?>">
                    <span class="error"> <?php echo $emailErr;?></span>
                </label>
            </p>
            <br>
             <p>
                <label>Género:
            <p>
                <input  id="test1" type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Masculino">
                <label for="test1">Maculino</label>
            </p>
            <p>
                <input id= "test2"type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Femenino">
                <label for="test2">Femenino</label>
            </p>
            <span class="error"> <?php echo $genderErr;?></span>
            </label>
            </p>
            <br>
            <button class="btn waves-effect waves-light" type="submit" name="action">Registrar
                <i class="material-icons right">send</i>
            </button>
            <br><br>
        </form>
        <?php
        echo "<br><br><h3>Datos Ingresados:</h3>";
        if($nameErr= " "){
          echo "<p> Usuario: ". $name ."</p>";
        }else{
          echo "<p> Usuario: ". $nameErr ."</p>";
        }
        echo "<br>";
        echo "<p>Correo: ".$email."</p>";
        echo "<br>";
        echo "<p> Género: ".$gender."</p";

        ?>
        <footer></footer>
    </article>
    
    <h2>Cuestionario:</h2>
    <p>
        1. ¿Por qué es una buena práctica separar el controlador de la vista?<br><div class="blue-text-lighten-4">Para que el software se vuelve modular y así se puede reemplazar o actualizar solo lo que necesita, en lugar de tener que acceder a un archivo donde está todo junto y buscar la sección que se nquiere modificar.</div>
    </p>
    <p>
        2. Aparte de los arreglos $_POST y $_GET, ¿qué otros arreglos están predefinidos en php y cuál es su función?<br>
        <div>
                <li>$_FILES: Es una variable tipo array asociativo de elementos que se cargan al script actual por medio de POST.</li>
                <li>$_REQUEST: Es un array asociativo que contiene la información de $_GET, $_POST y $_COOKIE.</li>
                <li>$_SESSION: Es un array asociativo que contiene las variables de sesión que están disponibles para el script actual.</li>
                <li>$_COOKIE: Una variable tipo array asociativo de variables que se pasaron al script actual por medio de Cookies HTTP.</li>
                <li>$_SERVER: Es un array que contiene información de cabeceras, rutas y ubicaciones de scripts.</li>
                <li>$_ENV: Es una variable tipo array asociativo de variables que se pasaron al script actual por medio del método del entorno.</li>

        </div>
    </p>
    <p>
        3. Explora las funciones de php, y describe 2 que no hayas visto en otro lenguaje y que llamen tu atención.<br>
        <div>
            <li>unset(): Destruye la variable que se especifique.</li>
            <li>Empty: Determina si una variableno tiene contenido.</li>
        </div>
    </p>
    <p>
        4. ¿Qué es XSS y cómo se puede prevenir?<br>
        <div>
            Es una forma de inseguridad informáticade las aplicaciones Web, que permite le permite persona meter en páginas web visitadas por el usuario código, evitando las medidas de control. Para prevenir el problema se puede usar la función strip_tags de PHP que limpia todas las etiquetas HTML que encuentre.
        </div>
    </p>
</div>
<?php include("_footer.html"); ?>
    
<?php include("_footer.html") ?>

