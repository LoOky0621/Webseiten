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
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// SQL-Abfrage zum Abrufen der vorhandenen Kommentare
$sql = "SELECT * FROM comments WHERE trail = '$title'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Kommentare aus der Datenbank abrufen und anzeigen
    while ($row = $result->fetch_assoc()) {
        // Überprüfen, ob "name" und "comment" Werte haben, bevor sie angezeigt werden
        if (!empty($row["name"])) {
            echo "Name: " . $row["name"] . "<br>";
        }
        if (!empty($row["comment"])) {
            echo "Kommentar: " . $row["comment"] . "<br>";
        }
        echo "<br>"; // Leerzeile zwischen den Kommentaren
    }
} else {
    echo "Es wurden noch keine Kommentare für diesen Trail hinterlassen.";
}

// Verbindung zur Datenbank schließen
$conn->close();
