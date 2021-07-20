<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/d.overzicht.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <title>MA Twente | Overzicht directie</title>
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
      <a id="active" class="link" href="d.overzicht.php">Overzicht directie</a>
      <a class="uitlogknop" href="extra/loguit.php">Uitloggen</a>
    </nav>

    <!-- Hieronder worden de paginatitel en de twee keuzeknoppen op de pagina gezet. -->

    <h1 class="titel">Overzicht directie</h1>

    <div class="keuzeknoppen">
      <a class="keuzeknop1" href="d.configuraties.php">Configuraties</a>
      <a class="keuzeknop2" href="d.incidentenoverzicht.php">Incidenten</a>
    </div>

    <!-- Hieronder wordt de footer op de pagina gezet. -->

    <footer>
      <p>&copy; Copyright 2021 | Made by Matthew Lobato de Mesquita</p>
    </footer>
  </body>
</html>
