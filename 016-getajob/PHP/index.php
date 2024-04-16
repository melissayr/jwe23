<?php
include "setup.php";

// ist_eingeloggt();

include "kopf.php";
?>



<?php //$_GET["seite"] ist die SUPERGLOBALE VARIABLE
 //assoziativer array index "seite"
if (empty($_GET["seite"])){ //existiert die GET seite oder ist sie leer $
    $site = "home";
} else{
    $site = $_GET["seite"];
}
// Navigation in php
if($site == "home") {
    $include_datei = "home.php";
    $seitentitel ="Find your passion";

} else if ($site == "jobs") {
    $include_datei = "jobs.php";
    $seitentitel ="Jobs";

} else if ($site == "ueberuns.php") {
    $include_datei = "ueberuns.php";
    $seitentitel ="Team";

} else if ($site == "login") {
    $include_datei = "login.php";
    $seitentitel ="Login.";

} else if ($site == "bewerbung") {
    $include_datei = "bewerbung.php";
    $seitentitel ="Bewerben.";

} else if ($site == "faq") {
    $include_datei = "faq.php";
    $seitentitel ="FAQ´s";

} else {
    $include_datei = "error404.php";
}


// auf allen Seiten navigation und footer includen
?>


<?php

// include "inhalte/" . $include_datei;

include "nav.php";

include "fuss.php";
?>