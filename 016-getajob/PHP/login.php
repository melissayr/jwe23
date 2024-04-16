<?php
include "kopf.php";



include "setup.php";

use WIFI\Php3\Getajob_Klassen\Validieren;
use WIFI\Php3\Getajob_Klassen\Mysql;




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



<link href="style.css" rel="stylesheet" type="text/css" />


<div class="loginNew">

    <h1>Loginbereich</h1>

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

</div>
  
        
              
    <div id="post-container">

<!-- Hier ist die Card von UIVERSE.io  -->
        <!-- <form class="form">
            <p class="form-title">Melde dich als Unternehmen an</p>
             <div class="input-container">
               <input type="email" placeholder="Gebe deine Email ein">
               <span>
               </span>
           </div>
           <div class="input-container">
               <input type="password" placeholder="Gebe dein Passwort ein">
             </div>
              <button type="submit" class="submit">
             Anmelden
           </button>
        </form> -->

    </div>
</main>

<?php
include "fuss.php";

?>

