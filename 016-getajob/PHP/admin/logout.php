<<<<<<< Updated upstream

<!-- Link zum css -->
<link href="style.css" rel="stylesheet" type="text/css" />
<link
rel="stylesheet"
href="../vendor/bootstrap-5.3.2-dist/css/bootstrap.css"
/>
<?php

    //LOGOUT 

    session_start();

    //einer dieser befehle würde reichen!!! :


    //löscht alle Session variablen
    unset($_SESSION["eingeloggt"]); // entscheidet ob wir eingeloggt sind oder nicht


?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout aus dem Jobs-Administrationsbereich</title>
</head>
<body>
    <h1>Logout aus dem Jobs-Administrationsbereich</h1>

    <p>Sie wurden ausgeloggt.</p>

    <p><a href="login.php">Hier gehts zurück zum Login</a></p>
    
</body>
</html>

<?php
include "../fuss.php";
=======

<!-- Link zum css -->
<link href="style.css" rel="stylesheet" type="text/css" />
<link
rel="stylesheet"
href="../vendor/bootstrap-5.3.2-dist/css/bootstrap.css"
/>
<?php

    //LOGOUT 

    session_start();

    //einer dieser befehle würde reichen!!! :


    //löscht alle Session variablen
    unset($_SESSION["eingeloggt"]); // entscheidet ob wir eingeloggt sind oder nicht


?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout aus dem Jobs-Administrationsbereich</title>
</head>
<body>
    <h1>Logout aus dem Jobs-Administrationsbereich</h1>

    <p>Sie wurden ausgeloggt.</p>

    <p><a href="login.php">Hier gehts zurück zum Login</a></p>
    
</body>
</html>

<?php
include "../fuss.php";
>>>>>>> Stashed changes
?>