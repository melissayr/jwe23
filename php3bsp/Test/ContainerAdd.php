<?php

class ContainerAdd implements ContainerInterface , \Iterator  { // php-iterator interface 

private array $add_container  = array();

public function add(ContainerAdd $containers): void  { 

$this->$add_container[] = $containers; 

}//[] array_push 

public function ausgabe(): string {
    $return = "";
    foreach ($this->$add_container as $containers) {
        $return .= $containers;
        $return .= " hinzufügen ";
    }
    return $return;
    }

    //Iterator- Interface Implementierung 
    private int $index = 0;

    public function current (): mixed {
        return $this->$add_container[ $this->index ];
    }

    public function key (): mixed {
        return $this->index;
    }

    public function next(): void {
        ++$this->index;
    }
    
    public function valid(): bool {
       return isset ($this->$add_container [$this->index]);
    }
    
    public function rewind(): void {
        $this->index = 0;
    }
}



