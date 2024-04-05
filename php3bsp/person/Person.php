<?php
//Klasse DEFINIEREN, die Später als Objekt verwendet werden kann
class Person {

    //Eigenschaft (property) festlegen: 
    //Platzhalter für spätere Werte (wie Variable)
    //private Eigenschaften (oder Methoden)können nur innerhalb der Klasse angesprochen werden!!
    private $vorname;

    //Konstruktor: Wird automatisch aufgerufen, sobald das Objekt erzeugt wird
    //zb: new Person();
    public function __construct($name) {
        $this->vorname = $name;
    }

    //öffentliche Methode (public), die von außen angesprochen werden kann
    public function vorstellen() {
        return "Hallo, ich bin " . $this->vorname; // $this = GANZE class Person
    }

    //methode zum holen des privaten vornamens - Ein sogenannter "getter"
    public function get_vorname() {
        return $this->vorname;
    }

    //Methode zum Ändern des Privaten Vornamens - ein sogenannter "setter"
    public function set_vorname($neuer_name) {
        //Durch diese Methode haben wir die Möglichkeit, Überprüfungen vor dem Setzen des neuen Namens einzufügen
        if ($this->vorname == $neuer_name) {
            echo "<strong>So heiße ich bereits!</strong>";
        } else {
            $this->vorname = $neuer_name;
        }
    }
}