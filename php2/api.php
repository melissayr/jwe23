<?php

require "admin/funktionen.php"; // require MUSS , include SOLL

header("Content-Type: application/json");


function fehler($message) {
    header("HTTP/1.1 404 NOT Found");
    echo json_encode(array(
        "status" => 0, // status gibt man meist mit, das man nicht in  HTTP  Code analysieren muss, dann erkennt man den gleich am Status ob es funktioniert hat
        "error" => $message
    ));
}




// GET-Parameter aus request uri 

$request_uri_ohne_get = explode("?", $_SERVER["REQUEST_URI"])[0];

$teile = explode("/api" , $request_uri_ohne_get, 2);
$parameter = explode("/", $teile[1]);

$api_version = ltrim(array_shift($parameter), "vV"); // kleines u. großes V auf der LINKEN SEITE entfernen

if (empty($api_version)) {
    fehler("Bitte geben Sie eine API - Version an."); // function fehler oben 
}


// leere Einträge aus Parameter-Array entfernen

foreach ($parameter as $k => $v) {
    if (empty($v)) {
        unset($parameter[$k]);
    } else { 
        //alle parameter in kleinbuchstaben umwandeln falls diese falsch daher kommen
        $parameter [$k] = mb_strtolower($v);
    }
}


//Indizies neu zuordnen, falls mit doppelten Schrägstrichen aufgerufen wird
$parameter = array_values($parameter);

if(empty($parameter)) {
    fehler("Nach der Version wurde keine Methode übergeben. Prüfen Sie Ihren Aufruf!");
}





















?>