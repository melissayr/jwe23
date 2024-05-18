<!-- Link zum css -->
<link href="style.css" rel="stylesheet" type="text/css" />
<link
rel="stylesheet"
href="../vendor/bootstrap-5.3.2-dist/css/bootstrap.css"
/>
<?php


include "funktionen.php";


//validieren
if(!empty($_POST)){
    if(empty($_POST["benutzername"]) || empty($_POST["passwort"]) ){
    $error = "Benutzername oder Passwort ist leer"; //wenn leer kommt error

    } else { $sql_benutzername =  escape( $_POST["benutzername"]); // ansonsten wird erstmal escaped

        $result = query ( "SELECT * FROM benutzer     
        WHERE benutzername = '{$sql_benutzername}'"); //Abfrage Datenbank

        $row = mysqli_fetch_assoc($result); //fetchen (umwandeln in phparray)

        if ($row) {
            if ( password_verify( $_POST['passwort'] , $row['passwort'])){ //wenn benutzer existiert, passwort prüfen
        
   //Wenn alles ok 
                    echo "ist eingeloggt";

                    // Verwendung im Kopf
                    $_SESSION["eingeloggt"] = true;
                    $_SESSION["benutzername"] = $row["benutzername"];
                    $_SESSION["benutzer_id"] = $row["id"];

                    // Umleiten in Admin-system

                    header("Location: jobs_liste.php");
                    exit;
                    //Passwort war falsch
            } else {$error="Benutzername oder Passwort falsch";}
        } else {
            echo "Du bist eingeloggt!";
        }
    }
}


?>

<div class="loginNew">

    <h1>Loginbereich</h1>

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
            <input type="password" name="passwort" id="passwort" />
        </div>

        <div><button type="submit">Einloggen</button></div>
    </form>

</div>
  
 <a href="../index.php">Hier gehts zur Startseite von Getajob</a>  
</main>


<?php
include "../fuss.php";
?>