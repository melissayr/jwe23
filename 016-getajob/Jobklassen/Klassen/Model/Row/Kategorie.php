<?php

namespace WIFI\getajob\Klassen\Model\Row;


class Kategorie extends RowAbstract // vererbt von der RowAbstract(parent)

{   
    protected string $tabelle = "kategorien";

    public function get_kategorie(): Kategorie
    {
        return new Marke ($this->kategorien_id);
    }
}



