<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/d.configuraties.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <title>MA Twente | Overzicht configuraties</title>
  </head>
  <body>

    <?php

      require "extra/verbinding.php";

      if ($_SESSION["afdeling"] !== "Directie") {
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
      <a class="link" href="d.overzicht.php">Overzicht directie</a>
      <a class="uitlogknop" href="extra/loguit.php">Uitloggen</a>
    </nav>

    <!-- Hieronder wordt de paginatitel op de pagina gezet. -->

    <h1 class="titel">Overzicht configuraties</h1>

    <!-- Hieronder worden er verschillende overzichten op de pagina gezet
    met daarin informatie over welke configuratie door wie gebruikt wordt. -->

    <?php

      require "extra/verbinding.php";

      $sql = "SELECT * FROM medewerkers INNER JOIN configuraties ON medewerkers.ConfiguratieID=configuraties.ConfiguratieID ORDER BY medewerkers.MedewerkerID ASC;";

      $resultaatdata = mysqli_query($conn, $sql);

      while ($rij = mysqli_fetch_assoc($resultaatdata)) {
        print_r("
        <div class=\"achtergrondbox\">
          <p><b>Naam medewerker:</b>" . " " . $rij["geslacht"] . " " . $rij["voorletter"] . " " . $rij["achternaam"] . "</p>
          <p><b>Afdeling:</b>" . " " . $rij["afdeling"] . "</p>
          <p><b>Configuratienummer:</b>" . " " . $rij["ConfiguratieID"] . " " . "(" . $rij["laptop_computer"] . ")</p>
          <p><b>Schermmerk en schermmaat:</b>" . " " . $rij["schermmerk"] . " " . "(" . $rij["schermmaat"] . ")</p>
          <p><b>Software en browser:</b>" . " " . $rij["software"] . " " . "(" . $rij["browser"] . ")</p>
        </div>
        ");
      }

    ?>

    <!-- Hieronder wordt de footer op de pagina gezet. -->

    <footer>
      <p>&copy; Copyright 2021 | Made by Matthew Lobato de Mesquita</p>
    </footer>
  </body>
</html>
