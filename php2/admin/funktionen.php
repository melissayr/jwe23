<?php

//ist notwendig auf die $_SESSION zur Verfügung zu haben
session_start();

// Verbindung zur Datenbank herstellen
$db = mysqli_connect("localhost", "root", "", "php2");
//MySQLI mitteilen, dass unsere Befehle als utf8 kommen
mysqli_set_charset($db, "utf8");


?>