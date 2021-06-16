<?php
spl_autoload_register(function($class) 
{
    include "classes/".$class.".class.php";
});

require_once "C:/xampp/htdocs/PHP-Formation/POO/classes/Employe.class.php";

use PHPUnit\Framework\TestCase; // Charge le framework PhpUnit

class Employe3Test extends TestCase
{
    public $salaireTemoin = 30000;
   // public $dateTemoin = '12-07-2015';
    
    
    // Teste l'assignation du champ date d'embauche 
    public function testEmployeValeurDateEmbauche() {
        $dateTemoin=new DateTime('12-07-2015');
        $employeATester = new Employe(null,null, $dateTemoin, null, null, null);
        $date = new DateTime('22-08-2009');
        $date->format("d-m-y");
        $employeATester->setDateEmbauche($dateTemoin);
        $this->assertEquals($date,$employeATester->getDateEmbauche());
    }


}