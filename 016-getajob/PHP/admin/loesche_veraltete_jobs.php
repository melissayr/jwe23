<?php
include "funktionen.php";

//Datenbank
$conn = mysqli_connect("localhost", "root", "", "getajob"); //Verbindung Datenbank


mysqli_set_charset($conn, "utf8"); 

// connection prüfen
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// SQL-Abfrage zum Löschen der Jobs, die älter als ein Jahr sind
$sql = "DELETE FROM jobs WHERE datum < NOW() - INTERVAL 1 YEAR";

// Ausführen der SQL-Abfrage
if ($conn->query($sql) === TRUE) {
    echo "Veraltete Jobs wurden erfolgreich gelöscht.";
} else {
    echo "Fehler beim Löschen der veralteten Jobs: " . $conn->error;
}

// Verbindung schließen
$conn->close();
?>
