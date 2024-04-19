<?php
namespace WIFI\JWE;

use WIFI\JWE\Test\Container\ContainerAbstract;



 class Container //extends Container
 
 {

        private $nutz;
        private $leer;
        private $warengewicht =  12.55;
    
        public function __construct($gesamt) {
            $this->nutz = 21.67;
            $this->leer = 2.33;
        }


    
        public function rechnen(){
        return "Maximal Gewicht in Tonnen: " . ($this->nutz) + ($this->leer) . "t";
        }


        public function rechnen_ist() {
            $gesamt = $this->leer + $this->warengewicht;
            return "Istgewicht(Leergewicht + Warengewicht): " .  $gesamt;

            echo "<br>";
        }


        
        
        //exception werfen
                
        public function rechnen_neu(float $neu): void {
            if(($this->leer) + ($this->warengewicht)>= $nutz ) {

                throw new Exception("Das übersteigt die Nutzlast."); 
            } 
    
            $this->rechnen = $neu;
        }
    
    }
    
   
    


