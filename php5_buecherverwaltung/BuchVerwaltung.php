<?php
// BuchVerwaltung.php
class BuchVerwaltung {
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        // Datenbankverbindung herstellen
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        // Überprüfen der Verbindung
        if ($this->conn->connect_error) {
            die("Verbindung fehlgeschlagen: " . $this->conn->connect_error);
        }
    }

    public function buchHinzufuegen(Buch $buch) {
        $stmt = $this->conn->prepare("INSERT INTO buecher (titel, autor, genre, isbn) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $buch->getTitel(), $buch->getAutor(), $buch->getGenre(), $buch->getIsbn());
        $stmt->execute();
        $stmt->close();
    }

    public function buchListeAnzeigen() {
        $sql = "SELECT * FROM buecher";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li class='list-group-item'>" . $row["titel"] . " von " . $row["autor"] . " (Genre: " . $row["genre"] . ", ISBN: " . $row["isbn"] . ")</li>";
            }
        } else {
            echo "<li class='list-group-item'>Keine Bücher gefunden</li>";
        }
    }

    public function __destruct() {
        $this->conn->close();
    }
}
?>
