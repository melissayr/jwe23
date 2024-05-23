<?php

namespace WIFI\getajob\Klassen\Model\Row;


class Job extends RowAbstract // vererbt von der RowAbstract(parent)

{   
    protected string $tabelle = "jobs";

    public function get_kategorie(): Kategorie
    {
        return new Kategorie ($this->$kategorien_id);
    }
}




