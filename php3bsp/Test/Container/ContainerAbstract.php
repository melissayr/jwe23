<?php
namespace WIFI\JWE\Test;

abstract class ContainerAbstract {

    
public function rechnen() {
    return ($this->nutz) + ($this->leer);
    }

}

//eigentlisch wollte ich diese funktion in Container und container 2 includieren 
//sodass man diese nicht mehr in den jewiligen klassen schreiben muss sondern nur noch vererbt
//waren errors wo ich mich aufgehangen habe - deshalb lasse ich es so 
