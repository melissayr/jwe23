<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eigene Funktionen</title>
</head>
<body>
    <h1>Eigene Funktionen</h1>

    <?php

    //Funktionen zum Umrechnen von °C in °F
    //Formel °F = °C * 1.8 + 32



    function celius_in_fahrenheit($celsius) {
        $fahrenheit = $celsius * 1.8 + 32;
        return $fahrenheit;
    }

<<<<<<< HEAD
    //$grad = 20;
=======


    //$grad = 20;

>>>>>>> a3e05647b03fe6fad42db8bebee650d5a5fa7227
    echo celius_in_fahrenheit(15);
    echo "<br/>";
    //echo celius_in_fahrenheit ($grad);
    echo "<br/>";
    echo celius_in_fahrenheit (30);
    echo "<br/>";
    echo celius_in_fahrenheit (-30);
    echo "<br/>";
    echo celius_in_fahrenheit (20);


<<<<<<< HEAD

=======
>>>>>>> a3e05647b03fe6fad42db8bebee650d5a5fa7227
    //Datum neu formatieren

    $datum_mysql = "2024-02-24";

    echo"<pre>";
    print_r($datum_mysql);
    echo"</pre>";

    echo "<br/>";

    //Ziel: 24.02.2024

    // $datum_mysql = date("d.m.y");
    // echo"<pre>";
    // print_r($datum_mysql);
    // echo"</pre>";

    echo "<br/>";

    function date_to_newDate($date) {
        $datum_mysql = date("d.m.y");
        return $datum_mysql;
    }

    echo date_to_newDate($datum_mysql);

    echo "<br/>";
    echo "<br/>";

<<<<<<< HEAD
    //Datum formatieren: weitere Variante mit . Verketten
=======
    //Datum formatieren: weitere Variante
>>>>>>> a3e05647b03fe6fad42db8bebee650d5a5fa7227
    function de_datum_weitere ($datum_falsch) {
        $teile = explode('-', $datum_falsch); // explode ist splitten
        return $teile[2] . "." . $teile[1] . "." . $teile[0];
    }

    echo de_datum_weitere($datum_mysql);

    echo "<br/>";
    echo "<br/>";

    //Text nach 10 Zeichen abschneiden und "..." anhängen


<<<<<<< HEAD
    function text_abschneiden($text_lang, $länge = 10) {
=======
    function text_abschneiden($text_lang) {
>>>>>>> a3e05647b03fe6fad42db8bebee650d5a5fa7227
        if (strlen($text_lang) >= 10){
            $text_kurz = substr($text_lang, 0, 10);
            return $text_kurz . "...";
        } else{
            $text_lang;
        }
    }

    $text = "Lorem ipsum dolor.";
    echo text_abschneiden($text);
<<<<<<< HEAD
    echo text_abschneiden($text, 45); // HIER WIRD DIE 10 ÜBERSCHRIEBEN
    
=======

>>>>>>> a3e05647b03fe6fad42db8bebee650d5a5fa7227
    // function text_abschneiden($text) {
    //     if (strlen($text) <= 10 ) {
    //         return $text;
    //     } 
    //     else { substr($text, 0, 10);
    //         return $text;
    // }}

  









   






   

    ?>
    
</body>
</html>