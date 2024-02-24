<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schleifen in PHP</title>
</head>
<body>

<h1>Schleifen</h1>
    <?php

    //while Schleife

    //limitiert Ausführungszeit auf 1 Sekunde
    set_time_limit(1);

    //1-10 ausgeben mit einer while-Schleife
    $zahl = 1;

    while ($zahl <= 10) {
        echo $zahl++ . "<br/>";
    }

    // Array der Reihe nach ausgeben mit foreach
    $staedte = array("Bregenz", "Innsbruck", "Salzburg", "Klagenfurt", "Linz", "Graz", "St.Pölten", "Wien");
    foreach ($staedte as $index => $stadt) {
        echo $index . " ";
        echo $stadt;
        echo "<br/>";
    }










?>
</body>
</html>