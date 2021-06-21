<?php
spl_autoload_register(function($class) 
{
    include "classes/".$class.".class.php";
});

use PHPUnit\Framework\TestCase; // Charge le framework PhpUnit

class DirecteurTest extends TestCase
{
    
    // Teste la fonction calculerPrime() de la classe Directeur
    public function testPrimeEmploye1(){
        
        $directeurATester = new Directeur("jean","dupont", "27-10-2015", null, 0, null,null);
        $dateTemoin = "27-10-2015";
        $montantPrime = 22000;

        $directeurATester->setSalaire(100000);
        $directeurATester->setDateEmbauche($dateTemoin);
        $this->assertEquals($montantPrime,$directeurATester->calcPrime($directeurATester->getSalaire(),$dateTemoin));
    }

}