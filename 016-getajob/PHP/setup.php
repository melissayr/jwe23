
<?php
//Konfiguration für das Projekt
const MYSQL_HOST = "localhost";
const MYSQL_USER = "root";
const MYSQL_PASSWORT = "";
const MYSQL_DATENBANK = "getajob";






session_start();//immer mit $_SESSION 

function ist_eingeloggt(){
    if (empty ($_SESSION["eingeloggt"])){ //wenn leer (benutzer nicht eingeloggt, dann umleiten zu login.php)
        header("Location: login.php");
        exit; 
    }
}







// AUTOLOADER FÜR DIE NAMESPACES UND USES 

spl_autoload_register(
    function (string $klasse) {
        //Projekt-spezifisches namespace prefix
        $prefix = "WIFI\\Php3\\"; //Prefix und namespace MUSS zusammenpassen

        //Basisverzeichnis für das Projekt 
        $basis = __DIR__ . "/";

     
        //Wenn die Klasse das prefix nicht verwendet dann abbrechen
        //Wir sind nicht für das Laden von Dateien anderer Projekte verantwortlich
        $leange = strlen($prefix); //zählt die bustaben von prefix string oben - muss nicht jedes mal neu angepasst werden
        if (substr($klasse, 0, $leange) !== $prefix ) {
            return;
        }

        //Klasse ohne Prefix
        $klasse_ohne_prefix = substr($klasse, $leange);
        

        //Dateipfad erstellen
        $datei =$basis . $klasse_ohne_prefix . ".php"; //Dateipfad für autoloader
        $datei = str_replace("\\", "/", $datei);

        //Wenn die Datei existiert, einbinden
        if (file_exists($datei)) {
            include $datei;

        }
    }
);
