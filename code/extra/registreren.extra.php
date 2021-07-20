<?php

if (isset($_POST["registreerknop"])) {

    require "verbinding.php";

    $geslacht = mysqli_real_escape_string($conn, $_POST["geslacht"]);
    $voorletter = mysqli_real_escape_string($conn, $_POST["voorletter"]);
    $achternaam = mysqli_real_escape_string($conn, $_POST["achternaam"]);
    $afdeling = mysqli_real_escape_string($conn, $_POST["afdeling"]);
    $telnr = mysqli_real_escape_string($conn, $_POST["telnr"]);
    $conf = mysqli_real_escape_string($conn, $_POST["conf"]);
    $gebnaam = mysqli_real_escape_string($conn, $_POST["gebnaam"]);
    $wachtwrd = mysqli_real_escape_string($conn, $_POST["wachtwrd"]);
    $wachtwrdher = mysqli_real_escape_string($conn, $_POST["wachtwrdher"]);

    require "functies.php";

    if (gebnaamOngeldig($gebnaam) !== false) {
        header("Location: ../registreren.php?error=gebnaamongeldig");
        exit();
    }
    if (wachtwrdKlopt($wachtwrd, $wachtwrdher) !== false) {
        header("Location: ../registreren.php?error=wachtwrdongelijk");
        exit();
    }
    if (gebnaamInGebruik($conn, $gebnaam) !== false) {
        header("Location: ../registreren.php?error=gebnaamingebruik");
        exit();
    }

    maakGebruiker($conn, $geslacht, $voorletter, $achternaam, $afdeling, $telnr, $conf, $gebnaam, $wachtwrd);

}
else {
    header("Location: ../index.php");
    exit();
}

?>