<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/styles.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <title>MA Twente | Inloggen</title>
  </head>
  <body>

    <?php
      require "extra/verbinding.php";
    ?>

    <!-- Hieronder wordt de navigatiebar op de pagina gezet. -->

    <nav>
      <h1>MA Twente</h1>
      <a href="registreren.php">Registreren</a>
    </nav>

    <?php

      if (isset($_GET["error"])) {
        if ($_GET["error"] == "wachtwrdonjuist") {
          echo "<p class=\"onjuist\">Wachtwoord onjuist</p>";
        }
        if ($_GET["error"] == "gebnaamonbekend") {
          echo "<p class=\"onbekend\">Gebruikersnaam onbekend</p>";
        }
      }
      if (isset($_GET["loguit"])) {
        if ($_GET["loguit"] == "succes") {
          echo "<p class=\"uitgelogd\">U bent uitgelogd</p>";
        }
      }
      if (isset($_GET["registratie"])) {
        if ($_GET["registratie"] == "success") {
          echo "<p class=\"registratie\">U bent succesvol geregistreerd!
          <br> 
          Hieronder kunt u inloggen</p>";
        }
      }

    ?>

    <!-- Hieronder wordt het inlogformulier op de pagina gezet. -->

    <form action="extra/inloggen.php" method="post">
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
      <button type="submit" name="inlogknop" id="inlogknop">Inloggen</button>
    </form>

    <!-- Hieronder wordt de footer op de pagina gezet. -->

    <footer>
      <p>&copy; Copyright 2021 | Made by Matthew Lobato de Mesquita</p>
    </footer>
  </body>
</html>
