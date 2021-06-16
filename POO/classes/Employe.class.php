<?php

class Employe{
    private $_name;
    private $_prenom;
    private $_dateEmbauche;
    private $_fonction;
    private $_salaire;
    private $_service;

    public function __construct($name,$prenom,$dateEmbauche,$fonction,$salaire,$service)
    {
        $this->_name = $name;
        $this->_prenom = $prenom;
        $this->_dateEmbauche = $dateEmbauche;
        $this->_fonction = $fonction;
        $this->_salaire = $salaire;
        $this->_service = $service;
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

    public function setDateEmbauche($dateEmbauche)
    {
        return $this->_dateEmbauche =$dateEmbauche;
    }
    
    public function getDateEmbauche()
    {
        return $this->_dateEmbauche;
    }

    public function getAnciennete($dateEmbauche)
    {
        $dateNow = new DateTime();
        
        $interval = $dateNow->diff(new DateTime($dateEmbauche));
        echo $interval-> format('%y année(s) d\'ancienneté');
    }

    public function setFonction($fonction)
    {
        return $this->_fonction=$fonction;
    }
    
    public function getFonction()
    {
        return $this->_fonction;
    }
    public function setSalaire($salaire)
    {
        return $this->_salaire =$salaire;
    }
    
    public function getSalaire()
    {
        return $this->_salaire;
    }

    public function calcSalaire($salaire,$dateEmbauche)
    {   
       //$dateEmbauche = $this->_dateEmbauche;
       $dateNow = new DateTime();
       $year = $dateNow->diff(new DateTime($dateEmbauche));
       $ancienneté = $year->format("%y");
       //$salaire = $this->_salaire;
       $primeSalaire = $salaire * 0.05;
       $primeAncienneté = ($salaire * 0.02) * intVal($ancienneté);
       $primeTotale = $primeAncienneté + $primeSalaire;

       return $primeTotale;
    }

    public function verserPrime()
    {
        $date = new DateTime();
        
        $dateMonth = $date->format("d m");
        
        if($dateMonth == "30 11"){
            
            echo "la prime de " . $this->calcSalaire(2000/*$this->_salaire*/, /*$this->_dateEmbauche */"22-06-2006") . " euros a été transférée à la banque";
        }
    }

    public function setService($service)
    {
        return $this->_service =$service;
    }
    
    public function getService()
    {
        return $this->_service;
    }
}
/*
$e = new Employe;

echo $e->verserPrime();*/