<?php

if (isset($_POST["inlogknop"])) {
    
    $gebnaam = $_POST["gebnaam"];
    $wachtwrd = $_POST["wachtwrd"];

    require "verbinding.php";
    require "functies.php";

    loginGebruiker($conn, $gebnaam, $wachtwrd);

}
else {
    header("Location: ../index.php");
    exit();
}

?>