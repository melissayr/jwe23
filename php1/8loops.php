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

    echo "<br/>";

    // Array der Reihe nach ausgeben mit foreach
    $staedte = array("Bregenz", "Innsbruck", "Salzburg", "Klagenfurt", "Linz", "Graz", "St.Pölten", "Wien");
    foreach ($staedte as $index => $stadt) {
        echo $index . " ";
        echo $stadt;
        echo "<br/>";
    }

    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
?>

<!-- HTML TABELLE FOR SCHLEIFE -->

<?php

echo "<table border='1'>";


for($zeile = 1; $zeile <=10; $zeile++){
echo "<tr>";

<<<<<<< HEAD
if ($zeile == 6) continue; // Zeile 6 wird übersprungen
=======
if ($zeile == 6) continue;
>>>>>>> a3e05647b03fe6fad42db8bebee650d5a5fa7227

for ($spalte = 1; $spalte<=10; $spalte++){ //Spalte mal zeile multiplizieren
    echo "<td>";
    //Division durch 7: Wenn NICHT (!=) 0, dann wird Zelle mit einem Wert befüllt

<<<<<<< HEAD
    if (($spalte * $zeile) % 7 != 0) echo $spalte * $zeile; //Alles durch 7 Teilbare ausblenden Spalte und Zeile
=======
    if (($spalte * $zeile) % 7 != 0) echo $spalte * $zeile; //Alles durch 7 Teilbare ausblenden
>>>>>>> a3e05647b03fe6fad42db8bebee650d5a5fa7227
    echo "</td>";

}

echo "</tr>";
}

<<<<<<< HEAD
echo "</table>";

=======


echo "</table>";




>>>>>>> a3e05647b03fe6fad42db8bebee650d5a5fa7227
echo "<br/>";
echo "<br/>";
echo "<br/>";


<<<<<<< HEAD
=======


>>>>>>> a3e05647b03fe6fad42db8bebee650d5a5fa7227
?>

<table border="1">

<tr>
    <td>1</td>
    <td>2</td>
    <td>3</td>
</tr>

<tr>
    <td>2</td>
    <td>4</td>
    <td>6</td>
</tr>

<tr>
    <td>3</td>
    <td>6</td>
    <td>9</td>
</tr>

<<<<<<< HEAD
</table>

=======




</table>


>>>>>>> a3e05647b03fe6fad42db8bebee650d5a5fa7227
</body>
</html>