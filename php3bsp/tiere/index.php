<?php
include "Tier/TierAbstract.php";
include "Tier/Hund.php";
include "Tier/Katze.php";
include "Tier/Maus.php";

$hund = new Hund("Rufus");//neues objekt hund - construktur Rufus übergeben - Das "new" ist der Aufruf für den Konstruktor

echo $hund ->get_name();
echo "<br>";
echo $hund ->gib_laut();
echo "<br>";


$katze = new Katze("Tom");
echo $katze ->get_name();
echo "<br>";
echo $katze ->gib_laut();
echo "<br>";

$maus = new Maus("Jerry");
echo $maus ->get_name();
echo "<br>";
echo $maus ->gib_laut();

