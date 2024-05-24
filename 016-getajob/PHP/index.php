


<?php
// ist_eingeloggt();

include "kopf.php";
?>



<?php //$_GET["seite"] ist die SUPERGLOBALE VARIABLE
 //assoziativer array index "seite"
if (empty($_GET["seite"])){ //existiert die GET seite oder ist sie leer $
    $site = "home";
} else{
    $site = $_GET["seite"]; //seite?
}
// Navigation in php
if($site == "home") { // Key - Seitenident.
    $include_datei = "inhalte/home.php";
    $seitentitel ="Find your passion";

} else if ($site == "jobs") {
    $include_datei = "inhalte/jobs.php";
    $seitentitel ="Jobs";

} else if ($site == "ueberuns") {
    $include_datei = "inhalte/ueberuns.php";
    $seitentitel ="Team";

} else if ($site == "bewerbung") {
    $include_datei = "inhalte/bewerbung.php";
    $seitentitel ="Bewerben.";

} else if ($site == "faq") {
    $include_datei = "inhalte/faq.php";
    $seitentitel ="FAQ´s";

} else {
    $include_datei = "error404.php";
}


// auf allen Seiten navigation und footer includen
?>




<?php

//nav.php?
// include "funktionen.php"

include  $include_datei;
include "fuss.php";
?>