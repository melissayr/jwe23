<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrationsbereich</title>
</head>
<body>

<nav>
    <ul>
        <li><a href="index.php">Start</a></li>
        <li><a href="musik_liste.php">Musik</a></li>
         <li><a href="logout.php">Ausloggen</a><?php  echo $_SESSION["benutzername"];?> </li>
         <li><a href="login.php">login</a> </li>
    </ul>
</nav>