<?php

//Es wird unbedingt benötigt, bei include nur wenn es gebraucht wird
require "admin/funktionen.php";
//Schaltet auf eine andere Gestaltung
header("Content-Type: application/json");

function fehler($message) {
    header("HTTP/1.1 404 Not Found");
    echo json_encode(array(
        "status" => 0,//status gibt man meist mit, das man nicht in HTTP Code analysieren muss,dann erkennt man gleich am Status ob es funktioniert hat
        "error" => $message
    ));
    exit;
}


//GET-Parameter aus request uri
$request_uri_ohne_get = explode("?", $_SERVER["REQUEST_URI"])[0];

$teile = explode("/api/", $request_uri_ohne_get, 2);  // an der Stelle API oben in der URL wird es in 2 Teile gesplittet ab dann geht $teile 1 los

if (count($teile) < 2) {
    fehler("Ungültiger API-Aufruf.");
}

$parameter = explode("/", $teile[1]);
$api_version = ltrim(array_shift($parameter), "vV"); // Version der API mit v

if (empty($api_version)) {
    fehler("API-Version angeben."); // Wenn leer dann fehlermeldung
}

foreach ($parameter as $k => $v) { //foreach schaut nach ob v leer ist ansonsten alle parameter in kleinbuchstaben
    if (empty($v)) {
        unset($parameter[$k]);
    } else {
        $parameter[$k] = mb_strtolower($v);
    }
}

$parameter = array_values($parameter);

if (empty($parameter)) {
    fehler("Richtige ausgabe prüfen!");
}

$ausgabe = array(
    "status" => 1,
    "result" => array()
);



if ($parameter[0] == "jobs") {
    if ($parameter[1] == "list") {
        $result = query("SELECT * FROM jobs ORDER BY id ASC");
        while ($row = mysqli_fetch_assoc($result)) {
            $ausgabe["result"][] = $row;
        }

    } elseif ($parameter[1] == "123") {
        $result = query("SELECT * FROM jobs WHERE id = 123");
        while ($row = mysqli_fetch_assoc($result)) {
            $ausgabe["result"][] = $row;
        }

    } else {
        fehler("Ungültige Methode für 'jobs'.");
    }

} elseif ($parameter[0] == "categories") {
    if ($parameter[1] == "list") {
        $result = query("SELECT * FROM kategorien ORDER BY id ASC");
        while ($row = mysqli_fetch_assoc($result)) {
            $ausgabe["result"][] = $row;
        }

    } elseif ($parameter[1] == "123") {
        $result = query("SELECT * FROM kategorien WHERE id = 123");
        while ($row = mysqli_fetch_assoc($result)) {
            $ausgabe["result"][] = $row;
        }

    } elseif (isset($parameter[2]) && $parameter[2] == "jobs") {
        $result = query("SELECT * FROM jobs WHERE category_id = 123");
        while ($row = mysqli_fetch_assoc($result)) {
            $ausgabe["result"][] = $row;
        }

    } else {
        fehler("Ungültige Methode für 'categories'.");
    }
} else {
    fehler("Unbekannter API-Endpunkt.");
}

echo json_encode($ausgabe);
exit;
?>