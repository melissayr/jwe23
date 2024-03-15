<?php

// alte methode md5
$db_passwort = "81dc9bdb52d04dc20036dbd8313ed055";
$passwort = "asdf";
$salt = "köakkäkk234";


if ($db_passwort == md5($passwort)) {
    echo "passwort ist richtig";
    echo "<br>";
}


echo $passwort;
echo "<br>";
echo md5($passwort);
echo "<br>";
echo md5($passwort.$salt);
// nicht oneway - man kann zurück rechnen 

echo "<br>";

// neue methode mit password_hash


// oneway - geht in eine Richtung und man erkennt den unrsprung nicht mehr

$db_passwort = password_hash($passwort, PASSWORD_DEFAULT);
echo $db_passwort;

echo "<br>";

// und überprüfung mit verify
if (password_verify($passwort, $db_passwort)) {
    echo "Passwort stimmt überein";
};

?>