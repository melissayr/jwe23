<?php //datenbank sql
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "buchverwaltung";
//connection
$conn = new mysqli($servername, $username, $password, $dbname);
//wenn keine Verbindung möglich, gebe Fehlermeldung aus
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
?>
