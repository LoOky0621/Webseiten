<!DOCTYPE html>
<html lang="de">

<head>
    <?php
    include("head.php");
    ?>
</head>

<body>
    <?php
    include("navUser.php");
    ?>

    <main>
        <div class="hauptbox">
            <h1>NUTZER</h1>
            <?php

            // Array von Werten für Vorname, Nachname, Ort und Beruf
            $vornamen = ["Max", "Anna", "Leon", "Sophie", "Luca", "Lena", "Finn", "Emma", "Paul", "Hannah", "David", "Laura", "Jonas", "Lara", "Tim", "Sarah", "Tom", "Mia", "Jan", "Sophia"];
            $nachnamen = ["Müller", "Schmidt", "Schulz", "Meyer", "Becker", "Hoffmann", "Wagner", "Koch", "Bauer", "Richter", "Kühn", "Schuster", "Fuchs", "Kraft", "Winter", "Jäger", "Graf", "Schulze", "Zimmermann", "Krüger"];
            $orte = ["Berlin", "Hamburg", "München", "Köln", "Frankfurt", "Stuttgart", "Düsseldorf", "Leipzig", "Hannover", "Dresden", "Nürnberg", "Münster", "Heidelberg", "Mannheim", "Karlsruhe", "Bremen", "Dortmund", "Essen", "Halle", "Aachen"];
            $berufe = ["Arzt", "Lehrer", "Ingenieur", "Künstler", "Verkäufer", "Manager", "Frisör", "Bäcker", "Pilot", "Anwalt", "Architekt", "Kellner", "Polizist", "Psychologe", "Physiker", "Schneider", "Musiker", "Schreiner", "Elektriker", "Koch"];

            // Schleife zum Einfügen von 40 Datensätzen
            for ($i = 0; $i < 80; $i++) {
                $vorname = $vornamen[array_rand($vornamen)];
                $nachname = $nachnamen[array_rand($nachnamen)];
                $ort = $orte[array_rand($orte)];
                $beruf = $berufe[array_rand($berufe)];
                $gehalt = rand(1000, 10000);

                $sql = "INSERT INTO personen (Vorname, Nachname, Ort, Beruf, Gehalt) VALUES ('$vorname', '$nachname', '$ort', '$beruf', $gehalt)";

                if ($conn->query($sql) !== TRUE) {
                    echo "Fehler beim Hinzufügen des Datensatzes: " . $conn->error;
                }
            }

            // Verbindung schließen
            $conn->close();
            ?>
            In diesem Beispiel werden zufällige Werte aus den vordefinierten Arrays ausgewählt und in die
            Datenbanktabelle eingefügt. Beachte, dass dies eine einfache Möglichkeit ist, 40 zufällige Datensätze
            einzufügen, und du kannst die Arrays mit Namen, Nachnamen, Orten und Berufen nach Bedarf erweitern oder
            anpassen.







        </div>
        <div id="overlay-container" class="overlay-container">
        </div>
    </main>
    <footer>
        <!-- Footer-Inhalt -->
    </footer>
    <script src="script.js"></script>
</body>

</html>