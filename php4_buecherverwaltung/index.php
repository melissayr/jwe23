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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bücherverwaltung</title>
    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS -->
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Bücherverwaltung</h1>

        <!-- Normales Formular -->
        <form id="buch-formular">
            <div class="form-group">
                <label for="titel">Titel:</label>
                <input type="text" id="titel" name="titel" class="form-control" required> <!-- Textfeld befüllt? (required) -->
            </div>
            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <input type="text" id="genre" name="genre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Buch hinzufügen</button>
        </form>

        <h2 class="text-center mt-5 mb-4">Bücherliste</h2>
        <ul id="buecher-liste" class="list-group">
<body>
    
    <ul id="buecher-liste">
        <?php // ist mind. ein Datensatz zurück gegeben worden (größer 0) 
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li>" . $row["titel"] . " von " . $row["autor"] . " (Genre: " . $row["genre"] . ", ISBN: " . $row["isbn"] . ")</li>";
            }
        } else { //Wenn nicht dann Info das nichts gefunden wurde
            echo "<li>Keine Bücher gefunden</li>";
        }
        ?>
    </ul>
    
      <!-- Bootstrap und jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
