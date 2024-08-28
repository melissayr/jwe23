<?php
// Buch.php
class Buch {
    private $titel;
    private $autor;
    private $genre;
    private $isbn;

    public function __construct($titel, $autor, $genre, $isbn) {
        $this->titel = $titel;
        $this->autor = $autor;
        $this->genre = $genre;
        $this->isbn = $isbn;
    }

    // Getter-Methoden
    public function getTitel() {
        return $this->titel;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function getIsbn() {
        return $this->isbn;
    }
}
?>
