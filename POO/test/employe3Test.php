<?php
spl_autoload_register(function($class) 
{
    include "classes/".$class.".class.php";
});

//require_once "C:/xampp/htdocs/PHP-Formation/POO/classes/Employe.class.php";

use PHPUnit\Framework\TestCase; // Charge le framework PhpUnit

class Employe3Test extends TestCase
{    
    
    private $salaireTemoin = 30000;

    // Teste l'assignation du champ date d'embauche 
    public function testEmployeValeurDateEmbauche() {
        $dateTemoin = new DateTime('22-08-2009');
        $employeATester = new Employe(null,null, $dateTemoin, null, 0, null,null);
        $date = new DateTime('22-08-2009');
        $date->format("d-m-y");
        $employeATester->setDateEmbauche($dateTemoin);
        $this->assertEquals($date,$employeATester->getDateEmbauche());
    }

    // Teste l'assignation du champ salaire 
    public function testEmployeValeurSalaire() {
        $employeATester = new Employe(null,null, null, null, 0, null,null);
        $employeATester->setSalaire($this->salaireTemoin);
        $this->assertEquals($this->salaireTemoin,$employeATester->getSalaire());
    }
    
    // Teste la fonction calculerPrime() de la classe Employe
    public function testPrimeEmploye1(){
        
        $employeATester = new Employe("jean","dupont", "27-10-2015", null, 0, null,null);
        $dateTemoin = "27-10-2015";
        $montantPrime = 4500;

        $employeATester->setSalaire($this->salaireTemoin);
        $employeATester->setDateEmbauche($dateTemoin);
        $this->assertEquals($montantPrime,$employeATester->calcPrime($employeATester->getSalaire(),$dateTemoin));
    }
    
    // Teste la fonction calculerPrime() de la classe Employe
    public function testPrimeEmploye2(){
      
        $employeATester = new Employe("eric","frea", "12/07/2010", null, 30000, null,null);
        $dateTemoin = "12/07/2010";
        $montantPrime = 7500;

        //$employeATester->setSalaire($this->salaireTemoin);
        $employeATester->setDateEmbauche($dateTemoin);
        $this->assertEquals($montantPrime,$employeATester->calcPrime($employeATester->getSalaire(),$dateTemoin));
    }
    
    // Teste la fonction calculerPrime() de la classe Employe
    public function testPrimeEmploye3(){
              
        $employeATester = new Employe("hamida","ha", "12/07/2010", null, 0, null,null);
        $dateTemoin = "12/07/2010";
        $montantPrime = 6000;
        $salaireTemoin = 24000;

        $employeATester->setSalaire($salaireTemoin);
        $employeATester->setDateEmbauche($dateTemoin);
        $this->assertEquals($montantPrime,$employeATester->calcPrime($salaireTemoin,$dateTemoin));
    }
    
    // Teste la fonction calculerPrime() de la classe Employe
    public function testPrimeEmploye4(){
        $employeATester = new Employe("orwacz","julia", "12/07/2018", null, 0, null,null);
        $dateTemoin = "12/07/2018";
        $montantPrime = 4050;
        $salaireTemoin = 45000;
        
        $employeATester->setSalaire($salaireTemoin);
        $employeATester->setDateEmbauche($dateTemoin);
        $this->assertEquals($montantPrime,$employeATester->calcPrime($salaireTemoin,$dateTemoin));
    }

}