<?php


use WIFI\JWE\Car;

//autoloader für namespaces und use
spl_autoload_register(
    function (string $klasse) {
    
        $prefix = "WIFI\\JWE\\"; 

        //Basisverzeichnis für das Projekt 
        $basis = __DIR__ . "/";

        $leange = strlen($prefix); 
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




$car = new Car("BMW") ;
echo $car->darstellen();
echo "<br>";


echo $car->get_marke();
echo"<br>";

$anothercar = new Car("Mercedes");
echo $anothercar->darstellen();
echo"<br>";




// $anothercar = new Car("VW");
// $anothercar->color = "black";
// $anothercar->power = 140; 
// $anothercar->consumption = 7;


// // print_r($car);
// // print_r($anothercar);


// $mercedes = new Car("Mercedes");
// $mercedes->color = "green";
// $mercedes->power = 150;
// $mercedes->consumption = 8;




