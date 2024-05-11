<?php

//Es wird unbedingt benötigt, bei include nur wenn es gebraucht wird
require "admin/funktionen.php";

//Schaltet auf eine andere Gestaltung
header("Content-Type: application/json");

function fehler($message) {
    header("HTTP/1.1 404 Not Found");
    echo json_encode(array(
        "status" => 0, //status gibt man meist mit, das man nicht in HTTP Code analysieren muss, 
                        //dann erkennt man gleich am Status ob es funktioniert hat
        "error" => $message
    ));
    exit;
}

//GET-Parameter aus request uri
$request_uri_ohne_get = explode("?", $_SERVER["REQUEST_URI"])[0];

$teile = explode("/api/", $request_uri_ohne_get, 2);  // an der Stelle API oben in der URL wird es in 2 Teile gesplittet ab dann geht $teile 1 los
$parameter = explode("/", $teile[1]);

$api_version = ltrim(array_shift($parameter), "vV"); //kleines u. großes V auf der LINKEN Seite entfernen

if (empty($api_version)) {
    fehler("Bitte geben Sie eine API-Version an.");
}

//Leere Einträge aus Parameter-Array entfernen
foreach ($parameter as $k => $v) {
    if (empty($v)) {
        unset($parameter[$k]);
    } else {
        //alle Parameter in Kleinbuchstaben umwandeln, falls diese falsch daherkommen
        $parameter[$k] = mb_strtolower($v);
    }
}

//Indizies neu zuordnen, falls mit doppelten Schrägstrichen aufgerufen wird
$parameter = array_values($parameter);

if (empty($parameter)) {
    fehler("Nach der Version wurde keine Methode übergeben. Prüfen Sie Ihren Aufruf!");
}



//BIS HIER API GENERELL

if($parameter[0] == "jobs") { // STELLE 0 NACH DER SPLITTUNG ist Jobs
    //Jobs 
        $ausgabe = array(
        "status" => 1,
        "result" => array()
    )  else (fehler("Spezifizierung Stelle falsch"));
    }


        
if($parameter[1] == "list"){
    //Liste aller Jobs 
        $ausgabe = array(
        "status" => 1,
        "result" => array()
    ) else (fehler("Richtige Ausgabe prüfen."));
    

        $result = query("SELECT * FROM jobs Order by id ASC");
        while($row = mysqli_fetch_assoc($result)){
        $ausgabe["result"][] = $row;
    }

        echo json_encode($ausgabe); // Umwandlung eines Arrays in JSON
    exit;
    }

