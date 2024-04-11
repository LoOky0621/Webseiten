<?php
// Stellen Sie hier Ihre Datenbankverbindung her
$servername = "localhost"; // Hostname
$username = "root"; // Datenbankbenutzername
$password = ""; // Datenbankpasswort
$dbname = "nutzer"; // Name Ihrer Datenbank

// Verbindung zur Datenbank herstellen
$conn = new mysqli($servername, $username, $password, $dbname);

// Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}
?>