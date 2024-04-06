<?php

class Hund {
    private string $name;

    public function __construct(string $tiername) {
        $this->name = $tiername;
    }

    public function get_name(): string {
        return $this->name;
    }

    public function gib_laut(): string {
        return "Wuff!";
    }

}