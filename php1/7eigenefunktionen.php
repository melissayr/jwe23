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
    

   






   

    ?>
    
</body>
</html>