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
            <h1>Bild hochladen</h1>
            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Stellen Sie sicher, dass der Benutzer eingeloggt ist
                if (!isset($_SESSION['username'])) {
                    echo "Sie müssen eingeloggt sein, um Bilder hochzuladen.";
                } else {
                    // Überprüfen, ob eine Datei hochgeladen wurde
                    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
                        $username = $_SESSION['username'];

                        // Überprüfen, ob die Datei ein gültiges Bild ist
                        $fileInfo = getimagesize($_FILES["image"]["tmp_name"]);
                        if ($fileInfo === false) {
                            echo "Die hochgeladene Datei ist kein gültiges Bild.";
                        } else {
                            // Validieren und filtern Sie die Daten
                            $imageData = file_get_contents($_FILES["image"]["tmp_name"]);
                            $imageData = $conn->real_escape_string($imageData);

                            if ($imageData === false) {
                                echo "Fehler beim Lesen der hochgeladenen Datei.";
                            } else {
                                // Verwenden Sie vorbereitete Anweisungen und Validierung
                                $stmt = $conn->prepare("INSERT INTO bilder (UserName, Bild) VALUES (?, ?)");
                                $stmt->bind_param("sb", $username, $imageData);

                                if ($stmt->execute()) {
                                    echo "Bild erfolgreich hochgeladen.";
                                } else {
                                    echo "Fehler beim Hochladen des Bildes: " . $stmt->error;
                                    // Zusätzliche Fehlerinformationen
                                    echo "MySQL-Fehler: " . $stmt->errno;
                                }

                                $stmt->close();
                            }
                        }
                    } else {
                        echo "Es ist ein Fehler beim Hochladen des Bildes aufgetreten. Überprüfen Sie die Datei.";
                    }
                }
            } else {
                echo "Ungültige Anfrage. Das Bild wurde nicht hochgeladen.";
            }

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