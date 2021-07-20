<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/d.incidentenoverzicht.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <title>MA Twente | Overzicht incidenten</title>
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

    <h1 class="titel">Overzicht incidenten</h1>

    <!-- Hieronder wordt er op de pagina aangegeven 
    hoeveel incidenten er per configuratie gemeld zijn. -->

    <p class="incidenten">Hieronder is het aantal incidenten te zien 
    dat gemeld is per configuratie, verdeelt in hard- en softwaremeldingen.
    Daarna is te zien hoeveel incidenten er gemeld zijn per gebruiker.</p>

    <div class="achtergrondbox1">
      <p class="getal"> <b>Configuratienummer 1 (Hardwaremeldingen):</b> 

      <?php

        $sql = "SELECT COUNT(IncidentID) FROM incidenten WHERE ConfiguratieID = 1 AND soortmelding = 'Hardware';";

        function aantalZoeken($sql) {

          require "extra/verbinding.php";
          
          $resultaat = mysqli_query($conn, $sql);
          $rij = mysqli_fetch_assoc($resultaat);
          $getal = $rij["COUNT(IncidentID)"];

          echo $getal . "<br><br>";

        }

        aantalZoeken($sql);

      ?>

      </p>
      <p class="getal"> <b>Configuratienummer 1 (Softwaremeldingen):</b> 

      <?php

        $sql = "SELECT COUNT(IncidentID) FROM incidenten WHERE ConfiguratieID = 1 AND soortmelding = 'Software';";

        aantalZoeken($sql);
        
      ?>

      </p>
      <p class="getal"> <b>Configuratienummer 2 (Hardwaremeldingen):</b> 

      <?php

        $sql = "SELECT COUNT(IncidentID) FROM incidenten WHERE ConfiguratieID = 2 AND soortmelding = 'Hardware';";

        aantalZoeken($sql);

      ?>

      </p>
      <p class="getal"> <b>Configuratienummer 2 (Softwaremeldingen):</b> 

      <?php

        $sql = "SELECT COUNT(IncidentID) FROM incidenten WHERE ConfiguratieID = 2 AND soortmelding = 'Software';";

        aantalZoeken($sql);

      ?>

      </p>
      <p class="getal"> <b>Configuratienummer 3 (Hardwaremeldingen):</b> 

      <?php

        $sql = "SELECT COUNT(IncidentID) FROM incidenten WHERE ConfiguratieID = 3 AND soortmelding = 'Hardware';";

        aantalZoeken($sql);

      ?>

      </p>
      <p class="getal"> <b>Configuratienummer 3 (Softwaremeldingen):</b> 

      <?php

        $sql = "SELECT COUNT(IncidentID) FROM incidenten WHERE ConfiguratieID = 3 AND soortmelding = 'Software';";

        aantalZoeken($sql);

      ?>

      </p>
      <p class="getal"> <b>Configuratienummer 4 (Hardwaremeldingen):</b> 

      <?php

        $sql = "SELECT COUNT(IncidentID) FROM incidenten WHERE ConfiguratieID = 4 AND soortmelding = 'Hardware';";

        aantalZoeken($sql);

      ?>

      </p>
      <p class="getal"> <b>Configuratienummer 4 (Softwaremeldingen):</b> 

      <?php

        $sql = "SELECT COUNT(IncidentID) FROM incidenten WHERE ConfiguratieID = 4 AND soortmelding = 'Software';";

        aantalZoeken($sql);

      ?>

      </p>
    </div>

    <div class="achtergrondbox2">
      <p>
      
        <?php

        // Hieronder wordt er gecontroleerd hoeveel incidenten
        // er totaal gemeld zijn per gebruiker.

        $sql = "SELECT MAX(MedewerkerID) FROM medewerkers;";
        $resultaat = mysqli_query($conn, $sql);
        $rij = mysqli_fetch_assoc($resultaat);
        $maxMedewerker = $rij["MAX(MedewerkerID)"];

        for ($medewNummer = 2; $medewNummer <= $maxMedewerker; $medewNummer++) { 
          mysqli_real_escape_string($conn, $medewNummer);

          $sql = "SELECT * FROM medewerkers LEFT JOIN incidenten ON medewerkers.MedewerkerID=incidenten.MedewerkerID WHERE medewerkers.MedewerkerID='$medewNummer';";
          $gevondenIncident = mysqli_query($conn, $sql);

          if (mysqli_num_rows($gevondenIncident) == 0) {
            echo "<br><i>Er is geen medewerker met nummer " . $medewNummer . " opgeslagen in het systeem.</i>";
          }
          elseif (mysqli_num_rows($gevondenIncident) > 0) {
            $gevondenRij = mysqli_fetch_assoc($gevondenIncident);

            if (is_null($gevondenRij["IncidentID"])) {
              echo "<br><b>Medewerker nummer " . $medewNummer . ":</b>&emsp;geen gemelde incidenten.";
            }
            else {
              $sql = "SELECT COUNT(IncidentID) FROM incidenten WHERE MedewerkerID = '$medewNummer';";
              $gevondenResultaat = mysqli_query($conn, $sql);
              $gevondenAantal = mysqli_fetch_assoc($gevondenResultaat);
              $aantalIncidenten = $gevondenAantal["COUNT(IncidentID)"];

              if ($aantalIncidenten == 1) {
                echo "<br><b>Medewerker nummer " . $medewNummer . ":</b>&emsp;" . $aantalIncidenten . " gemeld incident.";
              }
              elseif ($aantalIncidenten > 1) {
                echo "<br><b>Medewerker nummer " . $medewNummer . ":</b>&emsp;" . $aantalIncidenten . " gemelde incidenten.";
              }
            }  
          }
        }
        ?>
        
      </p>
    </div>

    <!-- Hieronder wordt de footer op de pagina gezet. -->

    <footer>
      <p>&copy; Copyright 2021 | Made by Matthew Lobato de Mesquita</p>
    </footer>
  </body>
</html>
