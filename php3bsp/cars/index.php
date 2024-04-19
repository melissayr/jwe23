<?php

include "Car.php";

$car = new Car("Beeep") ;
$car->color = "white";
$car->power = 90; //ps
$car->consumption = 5; //L/100km



$anothercar = new Car("Beep Beep");
$anothercar->color = "black";
$anothercar->power = 140; 
$anothercar->consumption = 7;


// print_r($car);
// print_r($anothercar);


$mercedes = new Car("Düüüd");
$mercedes->color = "green";
$mercedes->power = 150;
$mercedes->consumption = 8;




$ich = new Person ("Melissa"); // Wenn Parameter Melissa mitgegeben wird, dann geht er in die function __contruct (Person.php) AUTOMATISCH 
echo $ich->vorstellen();
echo"<br>";

$ich->set_vorname("Melissa");

echo $ich->get_vorname();
echo"<br>";

//Weiter Objekt erstellen 
$sie = new Person("Sabrina");
echo $sie->vorstellen();
echo"<br>";