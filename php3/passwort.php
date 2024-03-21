<?php
$db_passwort = "81dc9bdb52d04dc20036dbd8313ed055";
$passwort = "asdf";

//oneway algo
$db_passwort = password_hash($passwort, PASSWORD_DEFAULT);
echo $db_passwort;

echo "<br>";

// verify
if (password_verify($passwort, $db_passwort)) {
    echo "Passwort stimmt überein";
};
