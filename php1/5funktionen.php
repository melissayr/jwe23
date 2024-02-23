<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funktionen</title>
</head>
<body>
    <h1>Funktionen für Strings</h1>


    <?php
    //String in Kleinbuchstaben umwandeln

    $text = "    Herzlich Wilkommen";

    echo"<pre>";
    echo strtolower ($text);
    echo"</pre>";

    echo "<br/>";

    //Leerzeichen vor/nach einem Text entfernen 
    echo"<pre>";
    echo trim($text, "n e");
    echo"</pre>";






?>
</body>
</html>