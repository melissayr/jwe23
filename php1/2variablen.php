<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variablen mit PHP</title>
</head>
<body>

<h1>Variablen mit PHP</h1>
    

<?php 


//Ganzzahl (integer) definieren
$alter = 28;

echo "Ich bin $alter Jahre alt <br/>";

//Kommazahl (float) definieren und ausgeben
$kontostand = 9.81;

echo $kontostand;


echo "<br/>";

// Text (string) einer Variable zuweisen und ausgeben

$name = "Melissa";

echo "Ich heiße $name ";
echo "<br/>";
echo 'Ich heiße ' ;
echo $name;
echo "<br/>";
echo 'Ich heiße ' . $name;

echo "<br/>";
echo "Ich habe" . $name . "s Stift."; //String Verkettung mit . (Punkt)

//Datentypen: Boolean (kurz: bool)
echo "<br/>";
$wahr = true;
echo ">" . $wahr . "<";
echo "<br/>";
// 1 ist in PHP true

$falsch = false;
echo ">" .  $falsch . "<"; 
echo "<br/>";
// false ist leer 


//null: "nichts oder "undefiniert"
$nichts = null;
echo ">" . $nichts . "<";
echo "<br/>";

//Eine Konstante definieren und verwenden
        //name       //Wert
define("datenbank", "php23");
echo datenbank;
echo "<br/>";

//Neuere Schreibweise
const datenbank2 = "php24";
echo datenbank2;
echo "<br/>";






?>





</body>
</html>