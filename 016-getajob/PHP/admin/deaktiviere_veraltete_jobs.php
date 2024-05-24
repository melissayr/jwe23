<?php
include "funktionen.php";
// Datenbank MANUELL AUFRUFEN
// http://localhost/workspaces/jwe23/016-getajob/PHP/admin/deaktiviere_veraltete_jobs.php

$conn = mysqli_connect("localhost", "root", "", "getajob"); //Verbindung Datenbank

//Verbindung prüfen
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// SQL-Abfrage zum Deaktivieren der Jobs, die älter als 3 Monate sind
$sql = "UPDATE jobs SET aktiv = 0 WHERE datum < NOW() - INTERVAL 3 MONTH";

// Ausführen Sql Abfrage
if ($conn->query($sql) === TRUE) {
    echo "Veraltete Jobs wurden erfolgreich deaktiviert.";
} else {
    echo "Fehler beim Deaktivieren der veralteten Jobs: " . $conn->error;
}

// Verbindung schließen
$conn->close();
?>
