<?php

include "funktionen.php";
//Zugriff auf Datenbank mysql



//wurde das Formular abgeschickt?
// print_r($_POST);

if(!empty($_POST)){
    //Validieren
    if(empty($_POST["benutzername"]) || empty($_POST["passwort"]) ){
    $error = "Benutzername oder Passwort ist leer";
    } else {
        // Benutzername und Passwort werden übergeben
        // in der DB nachsehen ob der Benutzer existiert


        //diese Funktion bewahrt uns vor jeglicher sqlinjection
        //alle Daten aus $_POST u. $_GET (alle Benutzer bzw Formulardaten)
        $sql_benutzername =  escape( $_POST["benutzername"]);

        //Datenbank zugriff und Abfrage // NEUE QUERY FUNCTION FÜR KÜRZEREN CODE UNTER FUNKTIONEN 
        // $result = mysqli_query 
        $result = query ( "SELECT * FROM benutzer     
                    WHERE benutzername = '{$sql_benutzername}'");



        //Datensatz aus mysqli in ein php Array umwandeln 
        $row = mysqli_fetch_assoc($result);

            // print_r($result);
            if ($row) {

                // echo $_POST['passwort'];
                // echo"<br>";
                // echo $row['passwort'];
                                
                
                // Benutzer existiert -> Passwort prüfen
                if ( password_verify( $_POST['passwort'] , $row['passwort'])){
                    //Alles gut -> 
                    // echo "ist eingeloggt";

                    // Verwendung im Kopf
                    $_SESSION["eingeloggt"] = true;
                    $_SESSION["benutzername"] = $row["benutzername"];
                    $_SESSION["benutzer_id"] = $row["id"];
                    //Anzahl Logins in DB speichern // QUERY FUNKTION FÜR KÜRZEREN CODE
                    $result = query ("UPDATE benutzer SET 
                                anzahl_logins = anzahl_logins + 1
                                , letzter_login = NOW()
                                WHERE id = {$row["id"]}");



                    // Umleiten in Admin-system

                    header("Location: index.php");
                    exit;
                    //Passwort war falsch
            } else {$error="Benutzername oder Passwort falsch";}
        } else {
            //Benutzername wurde nicht in der DB gefunden
            $error="Benutzername oder Passwort falsch";
        }
    }
}

?>



<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Loginbereich zur Rezepteverwaltung</h1>
<?php 
if (!empty($error)){
    echo "<p>" .$error. "</p>";
}


?>
    <form action="login.php" method="post">
        <div>
            <lable for="benutzername">Benutzername:</lable>
            <input type="text" name="benutzername" id="benutzername" />
        </div>

        <div>
            <lable for="passwort">Passwort:</lable>
            <input type="text" name="passwort" id="passwort" />
        </div>

        <div><button type="submit">Einloggen</button></div>
    </form>
    
</body>
</html>