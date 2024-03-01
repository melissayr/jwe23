<?php 

if (empty($_GET["seite"])){ //existiert die GET seite oder ist sie leer 
    $seite = "home";
} else{
    $seite = $_GET["seite"];
}

if($seite == "home") {
    $include_datei = "home.php";
} else {
    $include_datei = "leistungen.php";
}

$include_datei = "leistungen.php";



include "kopf.php";

include "inhalte/" . $include_datei;

include "fuss.php";





















?>

