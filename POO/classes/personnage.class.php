<?php

class Personnage{
    private $_name;
    private $_prenom;
    private $_age;
    private $_sexe;

    public function __construct($name,$prenom,$age,$sexe)
    {
        $this->_name = $name;
        $this->_prenom = $prenom;
        $this->_age = $age;
        $this->_sexe = $sexe;
    }
}