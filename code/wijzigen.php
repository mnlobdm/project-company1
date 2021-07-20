<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/formulier.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <title>MA Twente | Incident wijzigen</title>
  </head>
  <body>

    <?php

      require "extra/verbinding.php";

      if ($_SESSION["afdeling"] !== "MaTW - ICT Afdeling") {
        header("Location: ./profiel.php");
        exit();  
      }

    ?>

    <!-- Hieronder wordt de navigatiebar op de pagina gezet. -->

    <nav>
      <h1>MA Twente</h1>
      <a class="link" href="incident.php">Incident melden</a>
      <a class="link" href="gemeld.php">Gemelde incidenten</a>
      <a class="link" href="faq.php">FAQ</a>
      <a class="uitlogknop" href="extra/loguit.php">Uitloggen</a>
    </nav>

    <h1 class="titel">Incident wijzigen</h1>

    <!-- Hieronder wordt de informatie van het incident opgehaald
    en ingevuld in een formulier. -->

    <?php  

    require "extra/verbinding.php";

    $incidentID = mysqli_real_escape_string($conn, $_POST["incidentID"]);

    $sql = "SELECT * FROM incidenten WHERE IncidentID = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_bind_param($stmt, "s", $incidentID);
    mysqli_stmt_execute($stmt);
    $resultaat = mysqli_stmt_get_result($stmt);
    $incidentData = mysqli_fetch_assoc($resultaat);

    ?>

    <div class="achtergrondbox">
      <form action="extra/wijzigen.extra.php" method="POST" id="incidentform">
          <label class="datumlabel" for="datum">Datum</label>
          <input type="datetime" name="datum" id="datum" value="<?php echo $incidentData["datum"]; ?>" required />
          <label class="statuslabel" for="status">Status</label>
          <input type="text" name="status" id="status" value="<?php echo $incidentData["status"]; ?>" required />
          <label class="prioriteitlabel" for="prioriteit">Prioriteit</label>
          <input type="text" name="prioriteit" id="prioriteit" value="<?php echo $incidentData["prioriteit"]; ?>" required />
          <label for="aanmelddag">Aanmelddag</label>
          <input type="text" name="aanmelddag" id="aanmelddag" value="<?php echo $incidentData["aanmelddag"]; ?>" required />
          <label for="soortmelding">Soort melding (hardware/software)</label>
          <input type="text" name="soortmelding" id="soortmelding" value="<?php echo $incidentData["soortmelding"]; ?>" required />
          <label for="gebruiker">Gebruiker</label>
          <input type="text" name="gebruiker" id="gebruiker" value="<?php echo $incidentData["gebruiker"]; ?>" required />
          <label for="omschrijvingkort">Korte omschrijving</label>
          <textarea name="omschrijvingkort" id="omschrijvingkort" form="incidentform" required><?php echo $incidentData["omschrijvingkort"]; ?></textarea>
          <label for="meerinfo">Meer informatie</label>
          <textarea name="meerinfo" id="meerinfo" form="incidentform" required><?php echo $incidentData["meerinfo"]; ?></textarea>
          <label for="betaantalgeb">Betreft aantal gebruikers</label>
          <input type="text" name="betaantalgeb" id="betaantalgeb" value="<?php echo $incidentData["betaantalgeb"]; ?>" required />
          <label for="afhandeltijd">Afhandeltijd (u)</label>
          <input type="text" name="afhandeltijd" id="afhandeltijd" value="<?php echo $incidentData["afhandeltijd (u)"]; ?>" required />
          <label for="verantwoordelijke">Verantwoordelijke</label>
          <input type="text" name="verantwoordelijke" id="verantwoordelijke" value="<?php echo $incidentData["verantwoordelijke"]; ?>" required />
          <label for="oorzaak">Oorzaak</label>
          <input type="text" name="oorzaak" id="oorzaak" value="<?php echo $incidentData["oorzaak"]; ?>" required />
          <label for="oplossing">Oplossing</label>
          <textarea name="oplossing" id="oplossing" form="incidentform" required><?php echo $incidentData["oplossing"]; ?></textarea>
          <label for="terugkoppeling">Terugkoppeling</label>
          <textarea name="terugkoppeling" id="terugkoppeling" form="incidentform" required><?php echo $incidentData["terugkoppeling"]; ?></textarea>
          <input type="hidden" name="incidentID" id="incidentID" value="<?php echo $incidentData["IncidentID"]; ?>" />
        <button type="submit" name="wijzigincident">Wijzigen</button>
      </form>
    </div>

    <!-- Hieronder wordt de footer op de pagina gezet. -->

    <footer>
      <p>&copy; Copyright 2021 | Made by Matthew Lobato de Mesquita</p>
    </footer>
  </body>
</html>