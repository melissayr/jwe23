<?php

namespace WIFI\getajob\Klassen\Model\Row;


class Job extends RowAbstract // vererbt von der RowAbstract(parent)

{   
    protected string $tabelle = "kategorie";

    public function get_kategorie(): Kategroie
    {
        return new Kategroie ($this->kategorie_id);
    }
}