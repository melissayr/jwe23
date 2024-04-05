<?php
//OOP für Projekte mit vielen Personen ist diese Variante der Programmierung übersichtlicher, da Teilabschitte

//Klassendefinition einbinden
include "Person.php";

//Erstes Object erzeugen mit new aus der Klasse "Person"
//Instanzieren / Instanz erstellen
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



