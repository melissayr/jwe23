<?php //LOGOUT 

    session_start();

    //einer dieser befehle würde reichen!!! :

    //löscht alle Session variablen
    unset($_SESSION["eingeloggt"]); // entscheidet ob wir eingeloggt sind oder nicht

    //Vernichtet die Session samt Cookies
    session_destroy();

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration Jobs</title>
</head>
<body>
    <h1>Logout aus dem Administrationsbereich</h1>

    <p>Sie wurden ausgeloggt.</p>

    <p><a href="login.php">Hier gehts zurück zum Login</a></p>
    
</body>
</html>