<?php

session_start();


    unset($_SESSION["eingeloggt"]); // entscheidet ob wir eingeloggt sind oder nicht

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout aus dem Administrationsbereich</title>
</head>
<body>
    <h1>Logout Administrationsbereich</h1>

    <p>Sie wurden ausgeloggt.</p>

    <p><a href="login.php">Hier gehts zurück zum Login</a></p>
    
</body>
</html>