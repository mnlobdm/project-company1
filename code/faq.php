<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/faq.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <title>MA Twente | FAQ</title>
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
      <a id="active" class="link" href="faq.php">FAQ</a>

      <?php

        if ($_SESSION["afdeling"] == "Directie") {
          echo "<a class=\"link\" href=\"d.overzicht.php\">Overzicht directie</a>";
        }

      ?>

      <a class="uitlogknop" href="extra/loguit.php">Uitloggen</a>
    </nav>

    <h1 class="titel">FAQ</h1>

    <button onclick="window.print()">Print deze pagina</button>

    <div class="achtergrondbox">
      <p>
        <b>Hoe meld ik een incident bij de ICT-afdeling?</b>
        <br>
        <br>
            Dit kun je eenvoudig doen door naar de pagina ‘Incident melden’ te gaan. 
            Hier kun je de gegevens invullen en hierna zal je aanmelding in behandeling worden genomen.
      </p>
      <div class="scheidingslijn"></div>
      <p>
        <b>Hoelang kan het duren voordat mijn probleem is opgelost?</b>
        <br>
        <br>
            Dit hangt af van de grootte van het probleem. 
            Als het een makkelijk probleem is wat snel kan worden opgelost kan worden, kan dit ong. een week duren. 
            Als het probleem moeilijker op te lossen is kan dit soms wel een maand duren. 
            Voor meer informatie kunt u contact opnemen met de ICT-afdeling van MA Twente.</p>
    </div>

    <!-- Hieronder wordt de footer op de pagina gezet. -->

    <footer>
      <p>&copy; Copyright 2021 | Made by Matthew Lobato de Mesquita</p>
    </footer>
  </body>
</html>
