<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/gemeld.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <title>MA Twente | Gemelde incidenten</title>
  </head>
  <body>

    <?php

      require "extra/verbinding.php";

      if (!isset($_SESSION["MedewID"])) {
          header("Location: ./index.php");
          exit();
      }

    ?>

    <!-- Hieronder wordt de navigatiebar op de pagina gezet. -->

    <nav>
      <h1>MA Twente</h1>
      <a class="link" href="incident.php">Incident melden</a>
      <a id="active" class="link" href="gemeld.php">Gemelde incidenten</a>
      <a class="link" href="faq.php">FAQ</a>

      <?php

        if ($_SESSION["afdeling"] == "Directie") {
          echo "<a class=\"link\" href=\"d.overzicht.php\">Overzicht directie</a>";
        }

      ?>

      <a class="uitlogknop" href="extra/loguit.php">Uitloggen</a>
    </nav>

    <h1 class="titel">Gemelde incidenten</h1>

    <?php

    if (isset($_GET["wijzigen"])) {
      if ($_GET["wijzigen"] == "success") {
        echo "<p class=\"success\">Het incident is succesvol gewijzigd.</p>";
      }
    }
    if (isset($_GET["verwijderen"])) {
      if ($_GET["verwijderen"] == "success") {
        echo "<p class=\"success\">Het incident is succesvol verwijderd.</p>";
      }
    }

    ?>

    <!-- De ingelogde gebruiker kan op deze pagina alleen 
    de incidenten zien de hijzelf gemeld heeft.
    Iemand van de afdeling 'Directie' of van de ICT-afdeling kan 
    alle gemelde incidenten zien met bij elk incident ook wat meer informatie. -->

    <?php

    require "extra/verbinding.php";

    if ($_SESSION["afdeling"] == "Directie" || $_SESSION["afdeling"] == "MaTW - ICT Afdeling") {
      $sql = "SELECT * FROM incidenten ORDER BY incidenten.datum DESC";
    }
    else {
      $medewerkerID = mysqli_real_escape_string($conn, $_SESSION["MedewID"]);
      $sql = "SELECT * FROM incidenten WHERE MedewerkerID = '$medewerkerID' ORDER BY incidenten.datum DESC";
    }

    $resultaat = mysqli_query($conn, $sql);

    while ($rij = mysqli_fetch_assoc($resultaat)) {
        print_r ("
        <div class=\"achtergrondbox\">
            <p><b>Aanmelddatum:</b>" . " " . $rij["datum"] . "
            <br>");
            
            if ($_SESSION["afdeling"] == "Directie" || $_SESSION["afdeling"] == "MaTW - ICT Afdeling") {
              print_r ("
              <b>Status:</b>" . " " . $rij["status"] . "
              <br>
              <b>Prioriteit:</b>" . " " . $rij["prioriteit"] . "
              <br>
              <b>Gebruiker:</b>" . " " . $rij["gebruiker"] . "
              <br>
              <b>Betrekking op aantal gebruikers:</b>" . " " . $rij["betaantalgeb"] . "
              <br>
              <b>Afhandeltijd (u):</b>" . " " . $rij["afhandeltijd (u)"] . "
              <br>");
            }

            print_r("
            <b>Aanmelddag:</b>" . " " . $rij["aanmelddag"] . "
            <br>
            <b>Soort melding:</b>" . " " . $rij["soortmelding"] . "
            <br>
            <b>Korte omschrijving:</b>" . " " . $rij["omschrijvingkort"] . "
            <br>
            <b>Meer informatie:</b>" . " " . $rij["meerinfo"] . "
            <br>");

            if ($_SESSION["afdeling"] == "Directie" || $_SESSION["afdeling"] == "MaTW - ICT Afdeling") {
              print_r ("
              <b>Verantwoordelijke:</b>" . " " . $rij["verantwoordelijke"] . "
              <br>
              <b>Oorzaak:</b>" . " " . $rij["oorzaak"] . "
              <br>
              <b>Oplossing:</b>" . " " . $rij["oplossing"] . "
              <br>
              <b>Terugkoppeling:</b>" . " " . $rij["terugkoppeling"] . "
              <br>
              </p>");
            }
            if ($_SESSION["afdeling"] == "MaTW - ICT Afdeling") {
              print_r ("
              <div class=\"knoppen\">
                <form action=\"wijzigen.php\" method=\"POST\">
                  <input type=\"hidden\" name=\"incidentID\" id=\"incidentID\" value=\"" . $rij["IncidentID"] . "\" />
                  <button type=\"submit\" class=\"wijzigknop\">Wijzigen</button>
                </form>
                <form action=\"extra/verwijderen.extra.php\" method=\"POST\">
                  <input type=\"hidden\" name=\"incidentID\" id=\"incidentID\" value=\"" . $rij["IncidentID"] . "\" />
                  <button type=\"submit\" name=\"verwijderknop\" class=\"verwijderknop\">Verwijderen</button>
                </form>
              </div>");
            }

        print_r ("</div>
        <div class=\"scheidingslijn\"></div>");
    }

    ?>

    <!-- Hieronder wordt de footer op de pagina gezet. -->

    <footer>
      <p>&copy; Copyright 2021 | Made by Matthew Lobato de Mesquita</p>
    </footer>
  </body>
</html>
