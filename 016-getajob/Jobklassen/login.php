<?php

include "setup.php";

use WIFI\getajob\Klassen\Validieren;
use WIFI\getajob\Klassen\Mysql;




//wurde das Formular abgeschickt?

if(!empty($_POST)){
    //Validierung
    $validieren = new Validieren();
    $validieren->ist_ausgefuellt($_POST["benutzername"], "Benutzername");
    $validieren->ist_ausgefuellt($_POST["passwort"], "Passwort");

    if (!$validieren->fehler_aufgetreten()) {
        
        //wenn kein fehler aufgetreten dann login weitrmachen
        $db = Mysql::getInstanz();
        $sql_benutzername = $db->escape($_POST["benutzername"]);
        $ergebnis = $db->query("SELECT * FROM benutzer WHERE benutzername = '{$sql_benutzername}'");
        $benutzer = $ergebnis->fetch_assoc();
        // echo "<pre>"; print_r($benutzer);

        if(empty($benutzer) || !password_verify($_POST["passwort"], $benutzer["passwort"])) { //benutzer leer || oder pw falsch
            //Fehler: Eingegebener Benutzer existiert nicht
            $validieren->fehler_hinzu("Benutzer oder Passwort war falsch.");
        } else {
            //Alles ok -> Login in Session merken
            $_SESSION["eingeloggt"] = true;
            $_SESSION["benutzername"] = $benutzer["benutzername"];
            $_SESSION["benutzer_id"] =  $benutzer["id"];
            
            //Umleitung zum Admin-System
            header("Location: index.php");
            exit;
        }
    }
    
}


//asdf
?>




<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loginbereich zur Fahrzeug-DB</title>
</head>
<body>
    <h1>Loginbereich zur Fahrzeug-DB</h1>
<?php 
if (!empty($validieren)){
    echo $validieren->fehler_html();
}


?>
    <form action="login.php" method="post">
        <div>
            <lable for="benutzername">Benutzername:</lable>
            <input type="text" name="benutzername" id="benutzername" />
        </div>

        <div>
            <lable for="passwort">Passwort:</lable>
            <input type="password" name="passwort" id="passwort" />
        </div>

        <div><button type="submit">Einloggen</button></div>
    </form>
    
</body>
</html>