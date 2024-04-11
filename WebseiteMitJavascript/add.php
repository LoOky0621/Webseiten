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
            <h1>Neuer Mitarbeiter hinzufügen</h1>

            <?php
            // SQL-Abfrage, um Daten aus den Tabellen "ort", "beruf" und "gehalt" abzurufen
            $geburtsorte = $conn->query("SELECT * FROM ort");
            $wohnorte = $conn->query("SELECT * FROM beruf");
            $abteilungen = $conn->query("SELECT * FROM gehalt");
            ?>

            <form action="speichern_mitarbeiter.php" method="POST">
                <label for="vorname">Vorname:</label>
                <input type="text" name="vorname" required><br><br>

                <label for="nachname">Nachname:</label>
                <input type="text" name="nachname" required><br><br>

                <label for="geburtsort">Geburtsort:</label>
                <select name="geburtsort" required>
                    <option value="">Wählen Sie einen Geburtsort</option>
                    <?php
                    while ($row = $geburtsorte->fetch_assoc()) {
                        echo '<option value="' . $row['ort'] . '</option>';
                    }
                    ?>
                </select><br><br>

                <label for="wohnort">Wohnort:</label>
                <select name="wohnort" required>
                    <option value="">Wählen Sie einen Wohnort</option>
                    <?php
                    while ($row = $wohnorte->fetch_assoc()) {
                        echo '<option value="' . $row['OrtID'] . '">' . $row['beruf'] . '</option>';
                    }
                    ?>
                </select><br><br>

                <label for="abteilung">Abteilung:</label>
                <select name="abteilung" required>
                    <option value="">Wählen Sie eine Abteilung</option>
                    <?php
                    while ($row = $abteilungen->fetch_assoc()) {
                        echo '<option value="' . $row['AbtID'] . '">' . $row['gehalt'] . '</option>';
                    }
                    ?>
                </select><br><br>

                <label for="gehalt">Gehalt:</label>
                <input type="text" name="gehalt"><br><br>

                <input type="submit" value="Mitarbeiter hinzufügen">
            </form>
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