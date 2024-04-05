<?php
error_reporting(E_ALL);

include "Magic.php";

$m = new Magic ();

// magic method __set()
$m->vorname = "Maria";
$m->nachname = "Hauser";
echo"<br>";


// magic method __get()
echo $m->nachname;
echo"<br>";


//magic method __call()
$m->speichern("benutzer", "insert", 5);

//Magic method: __toString()
echo $m;