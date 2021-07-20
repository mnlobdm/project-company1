<?php

function gebnaamOngeldig($gebnaam)  {
    $resultaat;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $gebnaam)) {
        $resultaat = true;
    }
    else {
        $resultaat = false;
    }
    return $resultaat;
}
function wachtwrdKlopt($wachtwrd, $wachtwrdher)  {
    $resultaat;
    if ($wachtwrd !== $wachtwrdher) {
        $resultaat = true;
    }
    else {
        $resultaat = false;
    }
    return $resultaat;
}

// Hieronder wordt er gecontroleerd of 
// de ingevulde gebruikersnaam al in gebruik is.

function gebnaamInGebruik($conn, $gebnaam)  {
    $sql = "SELECT * FROM medewerkers WHERE gebnaam = ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $gebnaam);
    mysqli_stmt_execute($stmt);

    $resultaatData = mysqli_stmt_get_result($stmt);

    if ($rij = mysqli_fetch_assoc($resultaatData)) {
        return $rij;
    }
    else {
        $resultaat = false;
        return $resultaat;
    }

    mysqli_stmt_close($stmt);

}
function maakGebruiker($conn, $geslacht, $voorletter, $achternaam, $afdeling, $telnr, $conf, $gebnaam, $wachtwrd)  {

    $hashedWachtwrd = password_hash($wachtwrd, PASSWORD_DEFAULT);

    $sql = "INSERT INTO medewerkers (ConfiguratieID, geslacht, voorletter, achternaam, afdeling, telnr, gebnaam, wachtwrd) 
            VALUES ('$conf', '$geslacht', '$voorletter', '$achternaam', '$afdeling', '$telnr', '$gebnaam', '$hashedWachtwrd');";
    
    mysqli_query($conn, $sql);

    header("Location: ../index.php?registratie=success");
    exit();

}
function loginGebruiker($conn, $gebnaam, $wachtwrd) {
    $gebnaamInGebruik = gebnaamInGebruik($conn, $gebnaam);

    if ($gebnaamInGebruik == false) {
        header("Location: ../index.php?error=gebnaamonbekend");
        exit();
    }

    $hashedWachtwrd = $gebnaamInGebruik["wachtwrd"];
    $checkWchtwrd = password_verify($wachtwrd, $hashedWachtwrd);

    if ($checkWchtwrd == false) {
        header("Location: ../index.php?error=wachtwrdonjuist");
    }
    else {
        session_start();
        $_SESSION["MedewID"] = $gebnaamInGebruik["MedewerkerID"];
        $_SESSION["ConfID"] = $gebnaamInGebruik["ConfiguratieID"];
        $_SESSION["geslacht"] = $gebnaamInGebruik["geslacht"];
        $_SESSION["voorletter"] = $gebnaamInGebruik["voorletter"];
        $_SESSION["achternaam"] = $gebnaamInGebruik["achternaam"];
        $_SESSION["afdeling"] = $gebnaamInGebruik["afdeling"];
        $_SESSION["telnr"] = $gebnaamInGebruik["telnr"];
        $_SESSION["gebnaam"] = $gebnaamInGebruik["gebnaam"];
        header("Location: ../profiel.php");
        exit();
    }    

}
function meldIncident($conn, $configuratieID, $medewerkerID, $aanmelddag, $soortmelding, $omschrijvingkort, $meerinfo, $betaantalgeb, $verantwoordelijke) {

    $sql = "INSERT INTO incidenten (ConfiguratieID, MedewerkerID, aanmelddag, soortmelding, omschrijvingkort, meerinfo, betaantalgeb, verantwoordelijke) 
            VALUES ('$configuratieID', '$medewerkerID', '$aanmelddag', '$soortmelding', '$omschrijvingkort', '$meerinfo', '$betaantalgeb', '$verantwoordelijke');";

    mysqli_query($conn, $sql);

    header("Location: ../incident.php?gemeld=success");
    exit();

}
function wijzigIncident($conn, $incidentID, $datum, $status, $prioriteit, $aanmelddag, $soortmelding, $gebruiker, 
$omschrijvingkort, $meerinfo, $betaantalgeb, $afhandeltijd, $verantwoordelijke, $oorzaak, $oplossing, $terugkoppeling) {

    /* Allereerst wordt de SQL-query gemaakt die naar de database gestuurd gaat worden.
    Deze query wordt dan voorbereid en gevuld met gegevens. Hierna wordt de query naar de database gestuurd
    en wordt de gebruiker naar de pagina 'Gemelde incidenten' gestuurd. */

    $sql = "UPDATE `incidenten` SET `datum` = ?, `status` = ?, `prioriteit` = ?, `aanmelddag` = ?, `soortmelding` = ?, `gebruiker` = ?, `omschrijvingkort` = ?, `meerinfo` = ?, `betaantalgeb` = ?, `afhandeltijd (u)` = ?, `verantwoordelijke` = ?, `oorzaak` = ?, `oplossing` = ?, `terugkoppeling` = ? WHERE `IncidentID` = ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_bind_param($stmt, "sssssssssssssss", $datum, $status, $prioriteit, $aanmelddag, $soortmelding, $gebruiker, 
    $omschrijvingkort, $meerinfo, $betaantalgeb, $afhandeltijd, $verantwoordelijke, $oorzaak, $oplossing, $terugkoppeling, $incidentID);
    mysqli_stmt_execute($stmt);

    header("Location: ../gemeld.php?wijzigen=success");
    exit();
}
function verwijderIncident($conn, $incidentID) {

    /* Allereerst wordt er weer een SQL-query gemaakt
    die naar de database gestuurd gaat worden. 
    Daarna wordt het ID van het desbetreffende incident in de query ingevuld.
    Dan wordt de query naar de database gestuurd en wordt het incident verwijderd.
    Hierna wordt de gebruiker teruggestuurd naar de pagina 'Gemelde incidenten'. */
    
    $sql = "DELETE FROM `incidenten` WHERE `IncidentID` = ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_bind_param($stmt, "s", $incidentID);
    mysqli_stmt_execute($stmt);

    header("Location: ../gemeld.php?verwijderen=success");
    exit();
}

?>