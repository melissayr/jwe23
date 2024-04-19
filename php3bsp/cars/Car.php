<?php

class Car {

    private $sound;

    public function __construct(string $loud ) {
        $this->sound = $loud;
    }

    public function honk(): string {
        return $this->sound;
    }

    
}

