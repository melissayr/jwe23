<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "buchverwaltung";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
?>
