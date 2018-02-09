<!DOCTYPE html>
<html>
    
    <head>
        <title>Lab7</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <link rel="stylesheet" type= "text/css" href="lab3minstyle.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body class="container">
        <div class="jumbotron text-center">
    <h1 class="display-4">Lab 9: Introducción a PHP</h1>
    </div>
<section class="xbox">
    <p>Alejandro Alvarez Palafox</p>
        <p>A01207765</p>
        <p>Correo: a01207765@itesm.mx</p>
        <br>
        <hr>
       <h2>Función Promedio</h2>
         <?php
            function promedio($arr){
              $res = "<p> El promedio del arreglo de: ";
              $acum = 0;
              $n = count($arr);
              for($i=0; $i<$n; $i++){
                $res .=" ". $arr[$i].", ";
                $acum = $acum + $arr[$i];
              }
              $prom = $acum / $n;
              $res .= "es igual a: " .$prom."</p>";
              return $res;
            }
            $res = promedio(array(100,100,100,80,));
            $res .= promedio(array(99,50,10,15,23,67,90));
            echo $res;
          ?>
       <br>
       <hr>
       <h2>Función Mediana</h2>
        <?php
           function mediana($arr){
               $res = "<p>La mediana del arreglo de: ";
               $n= count($arr);
               for($i=0; $i<$n; $i++){
                   $res .= " ".$arr[$i]. ", ";
               }
               sort($arr);
               $middle = floor(($n-1)/2);
               $answ = 0;
               if($n%2)
                   $answ = $arr[$middle];
                else
                    $answ = ($arr[$middle] + $arr[$middle+1])/2;
                $res.= "es: ". $answ."</p>";
                return $res; 
           }
           $res = mediana(array(12,11,12));
           $res .= mediana(array(2,1,1,3,5,6,7,8,4,3,5,6,4,7,8,4,6));
           echo $res;
        ?>
       <br>
       <hr>
       <h2>Función Lista</h2>
       <?php
        function lista($arr){
            $res = "<ul><li>Valores del Arreglo: </li>";
            $n = count($arr);
            for($i=0; $i<$n; $i++){
                $res .= "<li>". $arr[$i]."</li>";
            }
            $res .= "<br><li>".promedio($arr)."</li>";
            sort($arr);
            $res .= "<li> Arreglo de menor a mayor: ";
            for($i=0;$i<$n;$i++){
                if($i < ($n-1))
                    $res.= " ".$arr[$i].", ";
                else
                    $res.= " ".$arr[$i]."</li>";
            }
            $res .= "<br><li>Arreglo de mayor a menor: ";
            for($i=$n;$i>=0;$i--){
                if($i >0)
                    $res.= " ".$arr[$i].", ";
                else
                    $res.= " ".$arr[$i]."</li>";
            }
            $res .= "</ul>";
            return $res;
        }
        $res = lista(array(12,45,35,67,48,58,43,79,54,8,54,123,46,4));
        $res .= lista(array(35,78,3,4,57,23,68,24,12,63,29,64,29));
        echo $res;
       ?>
       <br>
       <hr>
       <h2>Tabla de potencias</h2>
           <?php
            function tablaPotencias($num){
                $res = '<table class="table table-hover">';
                $res .= "<thead><tr><th>Número</th><th>Cuadrado</th><th>Cubo</th></tr></thead><tbody>";
                for($i=0; $i<=$num;$i++){
                    $res.= "<tr><td>$i</td><td>".$i*$i."</td><td>". $i*$i*$i."</td></tr>";
                }
                $res .= "</tbody></table>";
                return $res;
            }
            $res = tablaPotencias(15);
            $res .= tablaPotencias(54);
            echo $res;
           ?>
        <br>
        <hr>
        <h2>Función Fibonacci:</h2>
            <?php
                function fibonacci($n){
                    $res = "<p>La función fibonacci hasta el número ".$n." es: ";
                    $num1 = 1;
                    $num2 = 0;
                    for($i=0; $i<= $n; $i++){
                        $sum = $num1+$num2;
                        $num1 = $num2;
                        $num2 = $sum;
                        $res.= $sum.", ";
                        
                    }
                    $res .= "</p>";
                    return $res;
                }
                $res = fibonacci(6);
                $res .= fibonacci(8);
                echo $res;
            ?>
        <br>
        <hr>
        <h2>Cuestionario: </h2>
        <p>
            ¿Qué hace la función phpinfo()? Describe y discute 3 datos que llamen tu atención.<br>
            <strong class="answer">Muestra información del estado actual de PHP, las cuales son de opciones de compilación, extensiones, versión de PHP, información del servidor y el entorno, entre otros.<br>
             <li>System: Con esta función se puede ver la descripción del sistema que está ejecutando el archivo PHP. Lo que me llamó la atención fue que al ejecutarlo se ve el sistema operativo y la laptop con la que hice el laboratorio</li>
             <li>Environment: En este apartadose ve detalladamente las especificaciones del sistema en el que se ejecutó la página que se seleccionó. Lo que me llamó la atención que se ve bastante información del equipo  que se corrió el archivo.
             <li>PHP Credits: Con esta función se ve el nombre de los autores de PHP. Y lo que me llamó la atención fue como se  le da crédito a cada una de las personas que ayudó en el desarrollo de PHP y la función que tuvieron.[1]</li></strong>
             
        </p>
        <p>
            ¿Qué cambios tendrías que hacer en la configuración del servidor para que pudiera ser apto en un ambiente de producción?<br>
            <strong class = "answer">Se debería de mejorar la seguridad, ya que es muy fácil acceder al la información del sistema, por lo cual puede haber modificaciones o perdidas de información en el sistema.</strong>
        </p>
        <p>
            ¿Cómo es que si el código está en un archivo con código html que se despliega del lado del cliente, se ejecuta del lado del servidor? Explica.<br>
            <strong class="answer">Cuando una página de PHP es solicitada por un usuario, el motor ejecuta el código de la página. Mientras el código se ejecuta da alguna información en fortmato html y el navegador le pide al servidor que traduzca las secciones
            de PHP a formato HTML y ya que toda la información está en formato HTML la manda al usuario.</strong>
        </p>
        <br> 
        <hr>
        <h2>Referencias</h2>
        <p>
            [1] http://php.net/manual/es/language.variables.predefined.php<br>
        </p>
        <script type="text/javascript" src="lab5.js"></script>
    </body>
    
</html>