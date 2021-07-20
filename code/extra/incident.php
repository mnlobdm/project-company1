<?php

session_start();

if (isset($_POST["verzendincident"])) {

    require "verbinding.php";

    $configuratieID = mysqli_real_escape_string($conn, $_SESSION["ConfID"]);
    $medewerkerID = mysqli_real_escape_string($conn, $_SESSION["MedewID"]);
    $aanmelddag = mysqli_real_escape_string($conn, $_POST["aanmelddag"]);
    $soortmelding = mysqli_real_escape_string($conn, $_POST["soortmelding"]);
    $omschrijvingkort = mysqli_real_escape_string($conn, $_POST["omschrijvingkort"]);
    $meerinfo = mysqli_real_escape_string($conn, $_POST["meerinfo"]);
    $betaantalgeb = mysqli_real_escape_string($conn, $_POST["betaantalgeb"]);
    $verantwoordelijke = mysqli_real_escape_string($conn, $_POST["verantwoordelijke"]);

    require "functies.php";

    meldIncident($conn, $configuratieID, $medewerkerID, $aanmelddag, $soortmelding, $omschrijvingkort, $meerinfo, $betaantalgeb, $verantwoordelijke);

}

else {
    header("Location: ../index.php");
    exit();
}

?>