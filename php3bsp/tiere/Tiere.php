<?php
namespace WIFI\JWE;

use WIFI\JWE\Tier\TierAbstract;

 

    class Tiere implements TiereInterface , \Iterator { // einfügen von php-iterator interface 

    private array $herde  = array();

    //Typdeclaration (Type-Hint): TierAbstract
    //Nur Objekte die von "TierAbstract" erben, oder selbst "Tierabstract sind
    //fürfen als Argument an diese Methode übergeben werden.
    public function add(TierAbstract $tier): void  { //void"" nichts wird zurück gegeben wenn string steht, dann string

    $this->herde[] = $tier; 
    
    }//[] array_push herde

    public function ausgabe(): string {
        $return = "";
        foreach ($this->herde as $tier) {
            $return .= $tier->get_name();
            $return .= " macht ";
            $return .= $tier->gib_laut();
            $return .="<br>";
        }
        return $return;
    }

    //Iterator- Interface Implementierung 
    private int $index = 0;

    public function current (): mixed {
        return $this->herde[ $this->index ];
    }

    public function key (): mixed {
        return $this->index;
    }

    public function next(): void {
        ++$this->index;
    }
    
    public function valid(): bool {
       return isset ($this->herde [$this->index]);
    }
    
    public function rewind(): void {
        $this->index = 0;
    }
    
}

