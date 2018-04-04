<?php
    require_once("util.php");
    include("partials/_head.html");
    echo '<h2>Registros con system failure</h2>';
    echo getSystemFailure();
    echo '<h2>Numero de system failures</h2>';
    $fail = getNumFailures();
    echo $fail;
    echo '<h2>Numero de success</h2>';
    echo getNumSuccess();
    include("partials/_footer.html");
?>