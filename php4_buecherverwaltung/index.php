<?php
include 'db.php'; //ohne db verbindung keine query 

// Post Abfrage 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titel = $_POST['titel'];
    $autor = $_POST['autor'];
    $genre = $_POST['genre'];
    $isbn = $_POST['isbn'];
//Spichern in Datenbank! wenn die werte wie titel,autor,genre und isbn drin sind dann wird das Buch erfolgreich hinzugefügt (true) 
    $sql = "INSERT INTO buecher (titel, autor, genre, isbn) VALUES ('$titel', '$autor', '$genre', '$isbn')";
    if ($conn->query($sql) === TRUE) {
        echo "Neues Buch erfolgreich hinzugefügt!";
    } else { //ansonsten Fehlermeldung von db.php
        echo "Fehler: " . $conn->error;
    }
}
//Datenbank Abfrage aus der tabelle buecher
$sql = "SELECT * FROM buecher";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Bücherverwaltung</title>
<!-- einbinden von jquery und javascript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js" defer></script>
</head>
<body>
    <h1>Bücherliste</h1>
    <ul id="buecher-liste">
        <?php // ist min ein datensatz zurück gegeben worden 
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li>" . $row["titel"] . " von " . $row["autor"] . " (Genre: " . $row["genre"] . ", ISBN: " . $row["isbn"] . ")</li>";
            }
        } else { //Wenn nicht dann Info das nichts gefunden wurde
            echo "<li>Keine Bücher gefunden</li>";
        }
        ?>
    </ul>
    <!--normales formular-->
    <h2>Neues Buch hinzufügen</h2>
    <form id="buch-formular" method="post">
        <label for="titel">Titel:</label><br>
        <input type="text" id="titel" name="titel" required><br> <!-- Muss vorher ausgefüllt sein bevors abgeschickt wird (required) -->

        <label for="autor">Autor:</label><br>
        <input type="text" id="autor" name="autor" required><br>

        <label for="genre">Genre:</label><br>
        <input type="text" id="genre" name="genre" required><br>

        <label for="isbn">ISBN:</label><br>
        <input type="text" id="isbn" name="isbn" required><br><br>

        <input type="submit" value="Buch hinzufügen"> <!-- button" -->
    </form>
</body>
</html>
