<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/profiel.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <title>MA Twente | Profiel</title>
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
      <a class="link" href="gemeld.php">Gemelde incidenten</a>
      <a class="link" href="faq.php">FAQ</a>

      <?php

        if ($_SESSION["afdeling"] == "Directie") {
          echo "<a class=\"link\" href=\"d.overzicht.php\">Overzicht directie</a>";
        }

      ?>

      <a class="uitlogknop" href="extra/loguit.php">Uitloggen</a>
    </nav>

    <!-- Hieronder wordt de paginatitel op de pagina gezet. -->

    <?php

      echo "<h1 class=\"titel\">Welkom, " . $_SESSION["geslacht"] . " " . $_SESSION["achternaam"] . "!</h1>";

    ?>

    <div class="middenrij">

      <div class="info">
          
        <?php

          echo "<p class=\"naam\">
          <b>Naam: </b>" . $_SESSION["geslacht"] . " " . $_SESSION["voorletter"] .  ". " . $_SESSION["achternaam"] . "</p><br>";
          echo "<p class=\"afdeling\">
          <b>Afdeling: </b>" . $_SESSION["afdeling"] . "</p><br>";
          echo "<p class=\"telnr\">
          <b>Intern tel. nr.: </b>" . $_SESSION["telnr"] . "</p>";

        ?>

      </div>

      <div class="foto">
        <img class="profielimg" src="../images/profiel.png" />
      </div>

    </div>

    <!-- Hieronder wordt de footer op de pagina gezet. -->

    <footer>
      <p>&copy; Copyright 2021 | Made by Matthew Lobato de Mesquita</p>
    </footer>
  </body>
</html>
