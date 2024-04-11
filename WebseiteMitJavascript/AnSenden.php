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
            <?php
            if (isset($_SESSION['username'])) {
                echo '<h1>Sie sind Eingeloggt</h1>';
                echo '<img src="Bilder/login.png" style="width:60%; height:40%;"></img>';
                echo '<h1>Sie verfügen nun über ein erweitertes Menü</h1>';
            } else {
                echo '<h1>Bitte Einloggen</h1>';
            }

            include('database.php');

            // Anmeldeformulardaten verarbeiten
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["name"]; // Beachte "name" hier
                $password = $_POST["password"]; // Beachte "password" hier

                // Hier wird die SQL-Anweisung für die Abfrage des Benutzers erstellt
                $sql = "SELECT * FROM login WHERE UserName = '$username'";

                // Führen Sie die Abfrage aus
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Benutzer gefunden, überprüfen Sie das Passwort
                    $row = $result->fetch_assoc();
                    $stored_password = $row["Password"]; // Gespeichertes Passwort im Klartext

                    // Hier vergleichen Sie das eingegebene Passwort mit dem gespeicherten Passwort im Klartext
                    if ($password === $stored_password) {
                        echo "<hr1>Anmeldung erfolgreich!</hr1>";
                        $_SESSION['user_id'] = $row['UserID'];
                        $_SESSION['username'] = $username; // Setze den Benutzernamen in die Sitzung
                        echo '<script type="text/javascript" src="updateNavigation.js"></script>';
                        header("refresh:2.5;url=AnSenden.php");

                        //header("refresh:2;url=index.php");
                    } else {
                        echo "<hr1>Falsches Passwort.</hr1>";
                        header("refresh:2;url=index.php");
                    }
                } else {
                    echo "<hr1>Benutzer nicht gefunden.</hr1>";
                    header("refresh:2;url=index.php");
                }
            }

            // Verbindung zur Datenbank schließen
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