<?php

if (isset($_POST["wijzigincident"])) {
    require "verbinding.php";
    require "functies.php";

    $incidentID = mysqli_real_escape_string($conn, $_POST["incidentID"]);
    $datum = $_POST["datum"];
    $status = mysqli_real_escape_string($conn, $_POST["status"]);
    $prioriteit = mysqli_real_escape_string($conn, $_POST["prioriteit"]);
    $aanmelddag = mysqli_real_escape_string($conn, $_POST["aanmelddag"]);
    $soortmelding = mysqli_real_escape_string($conn, $_POST["soortmelding"]);
    $gebruiker = mysqli_real_escape_string($conn, $_POST["gebruiker"]);
    $omschrijvingkort = mysqli_real_escape_string($conn, $_POST["omschrijvingkort"]);
    $meerinfo = mysqli_real_escape_string($conn, $_POST["meerinfo"]);
    $betaantalgeb = mysqli_real_escape_string($conn, $_POST["betaantalgeb"]);
    $afhandeltijd = mysqli_real_escape_string($conn, $_POST["afhandeltijd"]);
    $verantwoordelijke = mysqli_real_escape_string($conn, $_POST["verantwoordelijke"]);
    $oorzaak = mysqli_real_escape_string($conn, $_POST["oorzaak"]);
    $oplossing = mysqli_real_escape_string($conn, $_POST["oplossing"]);
    $terugkoppeling = mysqli_real_escape_string($conn, $_POST["terugkoppeling"]);

    wijzigIncident($conn, $incidentID, $datum, $status, $prioriteit, $aanmelddag, $soortmelding, $gebruiker, 
    $omschrijvingkort, $meerinfo, $betaantalgeb, $afhandeltijd, $verantwoordelijke, $oorzaak, $oplossing, $terugkoppeling);
    exit();
}
else {
    header("Location: ../index.php");
    exit();
}

?>