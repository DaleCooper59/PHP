<?php

class Agence{
    private $_nameAgence ;
    private $_adresse ;
    private $_Zipcode;
    private $_ville;
    private $_restaurant =true;

    public function __construct($nameAgence,$adresse,$Zipcode,$ville,$restaurant)
    {
        $this->_nameAgence = $nameAgence;
        $this->_adresse = $adresse;
        $this->_Zipcode = $Zipcode;
        $this->_ville = $ville;
        $this->_restaurant = $restaurant;
    }

    public function setNomAgence($nameAgence)
    {
        return $this->_nameAgence =$nameAgence;
    }
    
    public function getNomAgence()
    {
        return $this->_nameAgence;
    }

    public function setAdresse($adresse)
    {
        return $this->_adresse =$adresse;
    }
    
    public function getAdresse()
    {
        return $this->_adresse;
    }

    public function setZip($Zipcode)
    {
        return $this->_Zipcode=$Zipcode;
    }
    
    public function getZip()
    {
        return $this->_Zipcode;
    }

    public function setVille($ville)
    {
        return $this->_ville =$ville;
    }
    
    public function getVille()
    {
        return $this->_ville;
    }

    public function setRestaurant()
    {
        return $this->_restaurant =false;
    }

    public function getRestaurant()
    {
        return $this->_restaurant;
    }


}