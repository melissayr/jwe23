<?php
namespace WIFI\JWE;

use WIFI\JWE\Test\Container\ContainerAbstract;


 class Container2 //extends ContainerAbstract
 
 {


        private $nutz;
        private $leer;
        private $warengewicht =  12.55;
    
        public function __construct($gesamt2) {
            $this->nutz = 26.48;
            $this->leer = 4.00;
        }


        public function rechnen() {
            return "Maxinmal Gewicht in Tonnen: " . ($this->nutz) + ($this->leer) . "t";
            }


            public function rechnen_ist() {
                $gesamt2 = $this->leer + $this->warengewicht;
                return "Istgewicht(Leergewicht + Warengewicht): " .  $gesamt2;

                echo "<br>";
            }

           



        
            public function rechnen_neu(float $neu2): void {
                if(($this->leer) + ($this->warengewicht)>= $nutz ) {
    
                    throw new Exception("Das übersteigt die Nutzlast."); 
                } 
        
                $this->rechnen = $neu2;
            }

    }
    
   
    
