<?php
include "Tier/Hund.php";

$hund = new Hund("Rufus");//neues objekt hund - construktur Rufus übergeben 

echo $hund ->get_name();
echo $hund ->gib_laut();

