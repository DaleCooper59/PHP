<?php

require 'C:\xampp\htdocs\PHP-Formation\POO\classes\Employe.class.php';

class Directeur extends Employe{

    
    public function calcPrime($salaire,$dateEmbauche)
    {   
       $dateEmbauche = Parent::getDateEmbauche();
       $dateNow = new DateTime();
       $year = $dateNow->diff(new DateTime($dateEmbauche));
       $ancienneté = $year->format("%y");
       $salaire = Parent::getSalaire();
       $primeSalaire = $salaire * 0.07;
       $primeAncienneté = ($salaire * 0.03) * intVal($ancienneté);
       $primeTotale = $primeAncienneté + $primeSalaire;

       return $primeTotale;
    }

    public function verserPrime()
    {
        $date = new DateTime();
        
        $dateMonth = $date->format("d m");
        
        if($dateMonth == "30 11"){
            
            echo "la prime de " . $this->calcPrime(/*2000*/$this->_salaire, $this->_dateEmbauche /*"22-06-2006"*/) . " euros a été transférée à la banque";
        }
    }

}