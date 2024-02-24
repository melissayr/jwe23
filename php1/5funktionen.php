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


    //HTML-Tags aus einem String entfernen

    $text = "Das ist <strong>fett</strong> und <em>kursiv</em>.";
    echo strip_tags ($text, "<strong>") ; // strong ist erleubt und em wurde entfernt

    echo "<br/>";

    //Länge eines String zählen zb Passwort prüfung in if abfrage (zb länge mind. 8)
    echo strlen ($text);
    echo "<br/>";
    // echo mb_strlen ($text, "uft-8");
    // echo "<br/>";


    //Teil aus einem Text extrahieren
    $text = "Ich bin 43 Jahre alt.";

    echo substr($text, 8, 2);
    echo "<br/>";
    
    //Zeilenumbrüche in <br/> umwandeln breaks 
    $text = "Herzlich Willkommen
    im WIFI
    Salzburg";
    echo nl2br($text);
    







    










?>

</body>
</html>