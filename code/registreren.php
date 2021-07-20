<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/registreren.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <title>MA Twente | Registreren</title>
  </head>
  <body>

    <?php
      require "extra/verbinding.php";
    ?>

    <!-- Hieronder wordt de navigatiebar op de pagina gezet. -->

    <nav>
      <h1>MA Twente</h1>
      <a href="index.php">Inloggen</a>
    </nav>

    <!-- Hieronder worden de meldingen op de pagina gezet 
    die verschijnen als er iets is misgegaan bij het registreren. -->

    <?php

    if (isset($_GET["error"])) {

      if ($_GET["error"] == "gebnaamingebruik") {
        echo "<p class=\"ingebruik\">De ingevoerde gebruikersnaam is al in gebruik.</p>";
      }
      if ($_GET["error"] == "gebnaamongeldig") {
        echo "<p class=\"ongeldig\">De ingevoerde gebruikersnaam is ongeldig.</p>";
      }
      if ($_GET["error"] == "wachtwrdongelijk") {
        echo "<p class=\"ongelijk\">De ingevoerde wachtwoorden zijn ongelijk.</p>";
      }

    }

    ?>

    <!-- Hieronder wordt het registratieformulier op de pagina gezet. -->

    <form action="extra/registreren.extra.php" method="post">
      <input
        type="text"
        name="geslacht"
        id="geslacht"
        placeholder="Geslacht (Dhr./Mevr.)"
        required
      />
      <input
        type="text"
        name="voorletter"
        id="voorletter"
        placeholder="Voorletter"
        required
      />
      <input
        type="text"
        name="achternaam"
        id="achternaam"
        placeholder="Achternaam"
        required
      />
      <input
        type="text"
        name="afdeling"
        id="afdeling"
        placeholder="Afdeling"
        required
      />
      <input
        type="text"
        name="telnr"
        id="telnr"
        placeholder="Intern telefoonnummer"
        required
      />
      <input
        type="text"
        name="conf"
        id="conf"
        placeholder="Configuratienummer"
        required
      />
      <input
        type="text"
        name="gebnaam"
        id="gebnaam"
        placeholder="Gebruikersnaam"
        required
      />
      <input
        type="password"
        name="wachtwrd"
        id="wachtwrd"
        placeholder="Wachtwoord"
        required
      />
      <input
        type="password"
        name="wachtwrdher"
        id="wachtwrdher"
        placeholder="Herhaal wachtwoord"
        required
      />
      <button type="submit" name="registreerknop" id="registreerknop">
        Registreren
      </button>
    </form>

    <!-- Hieronder wordt de footer op de pagina gezet. -->

    <footer>
      <p>&copy; Copyright 2021 | Made by Matthew Lobato de Mesquita</p>
    </footer>
  </body>
</html>
