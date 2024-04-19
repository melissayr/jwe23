<?php

include "Car.php";


$car = new Car("BMW") ;
echo $car->darstellen();
echo "<br>";


echo $car->get_marke();
echo"<br>";

$anothercar = new Car("Mercedes");
echo $anothercar->darstellen();
echo"<br>";






// $ich = new Person ("Melissa"); // Wenn Parameter Melissa mitgegeben wird, dann geht er in die function __contruct (Person.php) AUTOMATISCH 
// echo $ich->vorstellen();
// echo"<br>";


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




