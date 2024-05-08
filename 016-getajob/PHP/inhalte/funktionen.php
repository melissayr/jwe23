<?php

session_start(); // für die $SESSION 


$db = mysqli_connect("localhost", "root", "", "016-getajob"); //Verbindung Datenbank


mysqli_set_charset($db, "utf8"); //alle Befehle kommen als uft8


//function für die query 
function query ($sql_befehl) { 
    global $db; //keyword global um die $db Variable vom globalen scope zu übernehmen
    $result = mysqli_query($db, $sql_befehl);

    return $result;
}

//Injections vermeiden 
function escape($post_var){
    global $db; //keyword global um die $db Variable vom globalen scope zu übernehmen
   return mysqli_real_escape_string($db, $post_var);
}


//Überprüfen ob man eingeloggt ist
function ist_eingeloggt(){
    if (empty ($_SESSION["eingeloggt"])){
        header("Location: login.php");
        exit; //damit der teil nicht mehr zum Browser geschickt wird.
    }
}