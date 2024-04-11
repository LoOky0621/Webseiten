<?php 

// Zugang zur Datenbank
$db_host = "127.0.0.1";
$db_user = "root";
$db_password = "";
$db_name = "trailbank";

// Verbindung zur Datenbank herstellen (Zugangsdaten übergeben)
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Prüfen, ob Verbindung erfolgreich oder fehlgeschlagen ist
if ($conn->connect_error) {
die("Verbindung fehlgeschlagen" . $conn->connect_error);
}
// Daten aus dem Formular abrufen
$name = $_POST['name'];
$comment = $_POST['comment'];
$trail = $_POST['trail'];

// SQL-Abfrage zum Einfügen des Kommentars in die Datenbank
$sql = "INSERT INTO trailbank.comments (name, comment, trail) VALUES ('$name', '$comment', '$trail')";

if ($conn->query($sql) === TRUE) {
    echo "Kommentar wurde erfolgreich gespeichert!";
} else {
    echo "Fehler beim Speichern des Kommentars: " . $conn->error;
}

// Verbindung zur Datenbank schließen
$conn->close();

// Überprüfen, ob der 'HTTP_REFERER'-Header gesetzt ist
if (isset($_SERVER['HTTP_REFERER'])) {
    // Verwenden Sie den 'HTTP_REFERER'-Header, um zur vorherigen Seite zurückzuleiten
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    // Wenn 'HTTP_REFERER' nicht gesetzt ist, können Sie eine Standard-URL festlegen
    header("Location: index.php");
    exit;
}