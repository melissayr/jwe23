<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array in PHP</title>
</head>


<body class="<?php echo $cssClass; ?>" >

<?php 
echo "<h1>Array in PHP</h1>";


//Nummerische Array definieren
$namen = array("Katharina", "Jonathan", "Julia", "Peter");

//Katharina und Julia
echo $namen[0] . " und " . $namen[2];
echo "<br/>";

//Werte im Nachhinein an das Array anhängen (nr 4 nach Peter)
$namen[] = "Mario";
echo "<br/>";

//Index als Variable
$index = 3;
echo $namen[$index+1];
echo "<br/>";

//Nur zur überprüfung für UNS nicht für den Endbenutzer
echo"<pre>";
print_r($namen);
echo"</pre>";

//Assoziatives Array definieren (Indes ist ein Text)
$person = array(
          //value
 "name" => "Simon",
 "alter" => 40,
 "ort" => "Salzburg"
);

echo"<pre>";
print_r($person);
echo"</pre>";

//Ausgabe: "Simon (40) aus Salzburg"

echo $person["name"] . " (" . $person["alter"] .  ") aus " . $person["ort"];
echo "<br/>";
echo "{$person["name"]} ({$person["alter"]}) aus {$person["ort"]}";
echo "<br/>";

//Im Nachhinein einen Wert dem Array anfügen
$person["guthaben"] = 100;

echo"<pre>";
print_r($person);
echo"</pre>";

//Mehrdimensionale Array (verschachtelt)
$personen = array (
    array( //index 0
    "name" => "Lukas",
    "alter" => 50,
    "ort" => "Linz"),
    array( //index 1
        "name" => "Lisa",
        "alter" => 18,
        "ort" => "Wien",
    ),
    $person
);

echo"<pre>";
print_r($personen);
echo"</pre>";

echo $personen[0]["ort"];
echo "<br/>";

//Ich bin Lukas und habe ein Guthaben von 100.

echo "Ich bin " . $personen[0]["name"] . " und habe ein Guthaben von " . $person["guthaben"];

?>
    
</body>
</html>