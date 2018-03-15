<?php include("partial/_header.html") ?>

 <body class="container">
    <div class="jumbotron text-center">
        <h1 class="display-4">Lab 20: JQuery</h1>
    </div>
    <section class="xbox">
        <p>Alejandro Alvarez Palafox</p>
        <p>A01207765</p>
        <p>Correo: a01207765@itesm.mx</p>
        <br>
        <hr>
        <h2>Búsqueda de elementos de una tabla</h2>
        <p>Inserta algo en el campo de texto.</p>  
        <input id="myInput" type="text" placeholder="Buscar...">
        <br><br>
        
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody id="myTable">
            <tr>
              <td>John</td>
              <td>Doe</td>
              <td>john@example.com</td>
            </tr>
            <tr>
              <td>Mary</td>
              <td>Moe</td>
              <td>mary@mail.com</td>
            </tr>
            <tr>
              <td>July</td>
              <td>Dooley</td>
              <td>july@greatstuff.com</td>
            </tr>
            <tr>
              <td>Anja</td>
              <td>Ravendale</td>
              <td>a_r@test.com</td>
            </tr>
          </tbody>
        </table>
         <hr>
       
        <h2>Cuestionario: </h2><br>
        <p>
            Explica y elabora un diagrama sobre cómo funciona AJAX con jQuery<br>
            <img src="images/Ajax-JQuery.jpg" class="img-responsive" alt="Ajax-JQuery" width="70%"/>
            <div>
            <strong class="answer">
                AJAX permite que el usuario tenga una mejor experiencia, ya que evita que cuando cambia el sitio se tenga que volver a cargar completamente y recupera la información sin que el usuario lo sepa.<br>
                Con AJAX los archivos HTML, CSS y JavaScript se cargan una sola vez y JavaScript se comunica directamente con el servidor para estarse comunicando constantemente y solo mandar pequeños paquetes de información.<br>
                jQuery le da a AJAX varios métodos que permiten peticiones de texto, HTML, XML, JSON desde un servidor remoto usando HTTP Get y HTTP Post de manera más sencilla.
            </strong>
            </div>
        <br><br>
        <p>
            ¿Qué alternativas a jQuery existen?<br>
            <strong class="answer">
            Una alternativa JavaScript sería utilizar librerias minimalistas, que permitieran seleccionar solamente lo que necesitamos de manera concreta.<br>
            También se podrían utilizar librerías selectoras, las cuales se pueden utilizar cuando sólo se necesita la capacidad de los selectores de tipo CSS y asociar después un determinado evento sobre los mismos a mano.</strong>            
        </p>
<?php include("partial/_footer.html") ?>