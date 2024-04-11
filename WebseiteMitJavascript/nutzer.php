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
            <h1>Datenbank</h1>
            <?php
            // Konfiguration für Pagination
            $datenProSeite = 10;
            $seite = isset($_GET['seite']) ? $_GET['seite'] : 1;
            $offset = ($seite - 1) * $datenProSeite;

            // SQL-Abfrage, um Daten aus der "personen"-Tabelle abzurufen
            $sql = "SELECT * FROM personen LIMIT $datenProSeite OFFSET $offset";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Ausgabe der Daten in einer Tabelle
                echo '<table class="table">';
                echo '<tr><th>PersonID</th><th>Vorname</th><th>Nachname</th><th>Ort</th><th>Beruf</th><th>Gehalt</th></tr>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['PersonID'] . '</td>';
                    echo '<td>' . $row['Vorname'] . '</td>';
                    echo '<td>' . $row['Nachname'] . '</td>';
                    echo '<td>' . $row['Ort'] . '</td>';
                    echo '<td>' . $row['Beruf'] . '</td>';
                    echo '<td>' . $row['Gehalt'] . '</td>';
                    echo '</tr>';
                }

                echo '</table>';

                // Vorwärts- und Rückwärts-Buttons für Pagination

                if ($seite > 1) {
                    echo '<div class="button2">';
                    echo '<a href="?seite=' . ($seite - 1) . '">Zurück</a>';
                    echo '</div>';
                }
                if ($result->num_rows >= $datenProSeite) {
                    echo '<div class="button2">';
                    echo '<a href="?seite=' . ($seite + 1) . '">Weiter</a>';
                    echo '</div>';
                }
            } else {
                echo 'Keine weiteren Daten gefunden.<br>';
                echo '<div class="button2">';
                echo '<a href="?seite=' . ($seite - 1) . '" class="mein-link"">Zurück</a>';
                echo '</div>';
            }

            // Schließen Sie die Datenbankverbindung
            $conn->close();
            ?>
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