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
    $description = "home";
} else if ($site == "jobs") {
    $include_datei = "jobs.php";
    $seitentitel ="Jobs";
    $description = "Stellenanzeigen";
} else if ($site == "ueberuns.php") {
    $include_datei = "ueberuns.php";
    $seitentitel ="Team";
    $description = "team";
} else if ($site == "login") {
    $include_datei = "login.php";
    $seitentitel ="Login.";
    $description = "Einloggen";
} else if ($site == "bewerbung") {
    $include_datei = "bewerbung.php";
    $seitentitel ="Bewerben.";
    $description = "Bewerben";
} else if ($site == "faq") {
    $include_datei = "faq.php";
    $seitentitel ="FAQ´s";
    $description = "Fragen und Antworten";
} else {
    $include_datei = "error404.php";
}


// auf allen Seiten navigation und footer includen


include "setup.php";



include "kopf.php";
include "fuss.php";
?>

<?php
include "setup.php";

ist_eingeloggt();

include "kopf.php";
?>

<!-- <h1>Jobportal</h1>
<p>Willkommen im geheimen Admin-Bereich</p> -->

<?php
include "fuss.php";
?>