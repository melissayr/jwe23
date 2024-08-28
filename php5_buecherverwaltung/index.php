<?php // hier kann man noch den autoloader hinzufügen und it use und namespace codezeilen sparen (vererbungen)
require 'Buch.php';
require 'BuchVerwaltung.php';

// Erstelle eine Instanz der BuchVerwaltung-Klasse und verbinde mit der Datenbank
$verwaltung = new BuchVerwaltung("localhost", "root", "", "buchdatenbank");

// Prüfen, ob ein neues Buch hinzugefügt werden soll
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $buch = new Buch($_POST['titel'], $_POST['autor'], $_POST['genre'], $_POST['isbn']);
    $verwaltung->buchHinzufuegen($buch); //public function in BuchVerltung.php
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bücherverwaltung</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Bücherverwaltung</h1>

        <form id="buch-formular" method="post" action="index.php">
            <div class="form-group">
                <label for="titel">Titel:</label>
                <input type="text" id="titel" name="titel" class="form-control" required>
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
            <?php
            // Anzeigen der Bücherliste
            $verwaltung->buchListeAnzeigen(); // function in BuchVerwaltung.php
            ?>
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
