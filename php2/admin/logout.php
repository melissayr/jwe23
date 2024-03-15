<?php

    //LOGOUT 
    
    session_start();

    unset($_SESSION["eingeloggt"]);

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout aus dem Rezepte-Administrationsbereich</title>
</head>
<body>
    <h1>Logout aus dem Rezepte-Administrationsbereich</h1>

    <p>Sie wurden ausgeloggt.</p>
    
</body>
</html>