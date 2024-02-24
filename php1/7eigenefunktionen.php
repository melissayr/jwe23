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



    //$grad = 20;

    echo celius_in_fahrenheit(15);
    echo "<br/>";
    //echo celius_in_fahrenheit ($grad);
    echo "<br/>";
    echo celius_in_fahrenheit (30);
    echo "<br/>";
    echo celius_in_fahrenheit (-30);
    echo "<br/>";
    echo celius_in_fahrenheit (20);


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

    //Datum formatieren: weitere Variante
    function de_datum_weitere ($datum_falsch) {
        $teile = explode('-', $datum_falsch); // explode ist splitten
        return $teile[2] . "." . $teile[1] . "." . $teile[0];
    }

    echo de_datum_weitere($datum_mysql);

    echo "<br/>";
    echo "<br/>";

    //Text nach 10 Zeichen abschneiden und "..." anhängen


    function text_abschneiden($text_lang) {
        if (strlen($text_lang) >= 10){
            $text_kurz = substr($text_lang, 0, 10);
            return $text_kurz . "...";
        } else{
            $text_lang;
        }
    }

    $text = "Lorem ipsum dolor.";
    echo text_abschneiden($text);

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