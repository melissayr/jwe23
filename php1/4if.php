<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>If Abfrage</title>
</head>
<body>
    <h1>If Abfrage</h1>


    <?php
// 0-5: Schlaf gut!
//6-9: Guten Morgen
//12/18: Mahlzeit
//19-23:Gute Nacht
//sonst: Hallo

$stunde = 5;

if ($stunde >=0 && $stunde <= 5) {
    echo "schlaf gut";
} 
else if ($stunde >= 6 && $stunde <= 9) {
    echo "Guten Morgen";
} 
else if ($stunde == 12 || $stunde ==18) {
    echo "Mahlzeit";
} else if($stunde >= 19 && $stunde <= 23 ) {
    echo "Gute Nacht";
}
else { echo "Hallo";
    }

?>
    
</body>
</html>