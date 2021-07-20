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
    <title>MA Twente | Incident melden</title>
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
      <a id="active" class="link" href="incident.php">Incident melden</a>
      <a class="link" href="gemeld.php">Gemelde incidenten</a>
      <a class="link" href="faq.php">FAQ</a>

      <?php

        if ($_SESSION["afdeling"] == "Directie") {
          echo "<a class=\"link\" href=\"d.overzicht.php\">Overzicht directie</a>";
        }

      ?>

      <a class="uitlogknop" href="extra/loguit.php">Uitloggen</a>
    </nav>

    <!-- Als een gebruiker net een incident heeft gemeld, 
    wordt dit bovenaan deze pagina gemeld.-->

    <?php

    if (isset($_GET["gemeld"])){
      if ($_GET["gemeld"] == "success") {
          echo "<p class=\"gemeld\">Het incident is succesvol gemeld</p>";
      }
    }

    ?>

    <!-- Hieronder wordt het invulformulier op de pagina gezet. -->

    <h1 class="titel">Incident melden</h1>
    <div class="achtergrondbox">
      <form action="extra/incident.php" method="POST" id="incidentform">
          <label class="aanmeldlabel" for="aanmelddag">Aanmelddag</label>
          <input type="text" name="aanmelddag" id="aanmelddag" required />
          <label for="soortmelding">Soort melding (hardware/software)</label>
          <input type="text" name="soortmelding" id="soortmelding" required />
          <label for="omschrijvingkort">Korte omschrijving</label>
          <textarea name="omschrijvingkort" id="omschrijvingkort" form="incidentform" required></textarea>
          <label for="meerinfo">Meer informatie</label>
          <textarea name="meerinfo" id="meerinfo" form="incidentform" required></textarea>
          <label for="betaantalgeb">Betreft aantal gebruikers</label>
          <input type="text" name="betaantalgeb" id="betaantalgeb" required />
          <label for="verantwoordelijke">Verantwoordelijke</label>
          <input type="text" name="verantwoordelijke" id="verantwoordelijke" required />
        <button type="submit" name="verzendincident">Verzenden</button>
      </form>
    </div>

    <!-- Hieronder wordt de footer op de pagina gezet. -->

    <footer>
      <p>&copy; Copyright 2021 | Made by Matthew Lobato de Mesquita</p>
    </footer>
  </body>
</html>
