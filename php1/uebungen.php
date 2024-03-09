<!--  array -->
<?php
$namen = array("Katharina", "Jonathan", "Julia", "Peter");

echo $namen[0] . " und " . $namen[3];
echo "<br/>";

$namen[] = "Mario"; 
echo "<br/>";

echo"<pre>";
print_r($namen);
echo"</pre>";


$person = array(
    //value
"name" => "Mel",
"alter" => 28,
"ort" => "Salzburg"
);

echo"<pre>";
print_r($person);
echo"</pre>";


// 3-7: Sleepingmode!
//8-11: Good Morning
//12/18: Tasty
//19-23:Sleep well
//sonst: Hi everbody

// $stunde = 5;

$stunde = date("G");

echo"<pre>";
print_r($stunde);
echo"</pre>";

if ($stunde >= 3 && $stunde <= 7) {
    echo "Sleepingmode";
}

if ($stunde >= 8 && $stunde <= 11) {
    echo "Good morning";
}

if ($stunde == 12 || $stunde == 18) {
    echo "Tasty";
}

if ($stunde >= 19 && $stunde <= 23) {
    echo "Sleep well";
}

else {echo "Hi everybody";} 
echo "<br/>";
echo"<pre>";
print_r($stunde);
echo"</pre>";
echo "<br/>";

$text = "Herzlich Wilkommen";
echo "<br/>";
echo trim($text, "n e m" );
echo "<br/>";
echo strlen ($text);
echo "<br/>";
echo count($namen);









?>