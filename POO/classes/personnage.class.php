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

    public function setNom($name)
    {
        return $this->_name =$name;
    }
    
    public function getNom()
    {
        return $this->_name;
    }

    public function setPrenom($prenom)
    {
        return $this->_prenom =$prenom;
    }
    
    public function getPrenom()
    {
        return $this->_prenom;
    }

    public function setAge($age)
    {
        return $this->_age =$age;
    }
    
    public function getAge()
    {
        return $this->_age;
    }
    public function setSexe($sexe)
    {
        return $this->_sexe =$sexe;
    }
    
    public function getSexe()
    {
        return $this->_sexe;
    }
}