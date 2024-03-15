<?php

//ist notwendig auf die $_SESSION zur Verfügung zu haben
session_start();

// Verbindung zur Datenbank herstellen
$db = mysqli_connect("localhost", "root", "", "php2");
//MySQLI mitteilen, dass unsere Befehle als utf8 kommen
mysqli_set_charset($db, "utf8");

//Function um SQL Injections zu vermeiden
function escape($post_var){
    global $db; //keyword global um die $db Variable vom globalen scope zu übernehmen
   return mysqli_real_escape_string($db, $post_var);
}


//Diese Funktion überprüft, ob der Benutzer eingeloggt ist.
//Falls nicht, dann wird er automatisch auf die Login seite weitergeleitet.
function ist_eingeloggt(){
    if (empty ($_SESSION["eingeloggt"])){
        header("Location: login.php");
        exit; //damit der teil nicht mehr zum Browser geschickt wird.
    }
}

?>