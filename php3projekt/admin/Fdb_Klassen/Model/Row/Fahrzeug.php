<?php

namespace WIFI\Php3\Fdb_Klassen\Model\Row;


class Fahrzeug extends RowAbstract // vererbt von der RowAbstract(parent)

{   
    protected string $tabelle = "fahrzeuge";

    public function get_marke(): Marke
    {
        return new Marke ($this->marken_id);
    }
}