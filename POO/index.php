<?php

class Animal{
    private $_espece ="batard";
    public $_regimeAlimentaire;
    public $_taille;
    public $_poids;

    public function espece(){
        echo $this->_espece;
    }
}

$chien = new Animal();
//$chien -> _espece ="batard";

$chien->espece();

$x=5;
echo $x;

function testt_portee(){
  echo $GLOBALS['x'];
  global $x;
  echo $x;
  $x++;
}

testt_portee();
testt_portee();
testt_portee();