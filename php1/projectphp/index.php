<?php //$_GET["seite"] ist die SUPERGLOBALE VARIABLE
 //assoziativer array index "seite"
if (empty($_GET["seite"])){ //existiert die GET seite oder ist sie leer $
    $site = "home";
} else{
    $site = $_GET["seite"];
}

if($site == "home") {
    $include_datei = "home.php";
    $seitentitel ="Friseur erzeugt kurze Haare";
    $description = "ABC";
} else if ($site == "leistungen") {
    $include_datei = "leistungen.php";
    $seitentitel ="Günstiger Preis";
    $description = "DEF";
} else if ($site == "oeffnungszeiten") {
    $include_datei = "oeffnungszeiten.php";
    $seitentitel ="Immer für Sie da";
    $description = "GHI";
} else if ($site == "kontakt") {
    $include_datei = "kontakt.php";
    $seitentitel ="Fragen Sie uns.";
    $description = "JKL";
} else {
    $include_datei = "error404.php";
}






include "kopf.php";

include "inhalte/" . $include_datei;

include "fuss.php";





















?>

