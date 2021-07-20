<?php

if (isset($_POST["verwijderknop"])) {
    require "verbinding.php";
    require "functies.php";

    $incidentID = mysqli_real_escape_string($conn, $_POST["incidentID"]);

    verwijderIncident($conn, $incidentID);
    exit();
}
else {
    header("Location: ../index.php");
    exit();
}

?>