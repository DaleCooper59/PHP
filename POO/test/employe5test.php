<?php
spl_autoload_register(function($class) 
{
    include "classes/".$class.".class.php";
});

use PHPUnit\Framework\TestCase; // Charge le framework PhpUnit

class Employe5Test extends TestCase
{
    public $proprietePrivee = true;

    public function isPropertyPrivate($instance, $propertyName){
        $reflector = new \ReflectionProperty($instance, $propertyName);
        $reflector_instance = $reflector->isPrivate();
        return $reflector_instance;
    }

    // Teste l'instanciation d'un objet Agence
    public function testPersonnageBase() {
        $agenceATester = new Agence(null,null,null,null,true);
        $this->assertNotNull($agenceATester);
    }
    


    // Teste la visibilité du champ nom de la classe Agence
    public function testPersonnageChampNom(){
        $agenceATester = new Agence(null,null,null,null,true);
        $private = $this->isPropertyPrivate($agenceATester,'_nameAgence');
        $this->assertEquals($this->proprietePrivee,$private);
    }
    
    // Teste la valeur du champ nom à l'instanciation de la classe Agence
    public function testPersonnageChampNomDefault() {
        $agenceATester = new Agence(null,null,null,null,true);
        $this->assertNull($agenceATester->getNomAgence());
    }
    
    // Teste l'assignation du champ nom à l'instanciation de la classe Agence
    public function testPersonnageChampNomAssignation() {
        $agenceATester = new Agence(null,null,null,null,true);
        $agenceATester->setNomAgence("Agence");
        $this->assertEquals("Agence",$agenceATester->getNomAgence());
    }
    


    // Teste la visibilité du champ Adresse de la classe Agence
    public function testPersonnageChampAdresse(){
        $agenceATester = new Agence(null,null,null,null,true);
        $private = $this->isPropertyPrivate($agenceATester,'_adresse');
        $this->assertEquals($this->proprietePrivee,$private);
    }
    
    // Teste la valeur du champ adresse à l'instanciation de la classe Agence
    public function testPersonnageChampAdresseDefault() {
        $agenceATester = new Agence(null,null,null,null,true);
        $this->assertNull($agenceATester->getAdresse());
    }
    
    // Teste l'assignation du champ adresse à l'instanciation de la classe Agence
    public function testPersonnageChampAdresseAssignation() {
        $agenceATester = new Agence(null,null,null,null,true);
        $adresse = "3 rue de la paix";
        $agenceATester->setAdresse($adresse);
        $this->assertEquals($adresse,$agenceATester->getAdresse());
    }
    


    // Teste la visibilité du champ codePostal de la classe Agence
    public function testPersonnageChampCodePostal(){
        $agenceATester = new Agence(null,null,null,null,true);
        $private = $this->isPropertyPrivate($agenceATester,'_Zipcode');
        $this->assertEquals($this->proprietePrivee,$private);
    }
    
    // Teste la valeur du champ codePostal à l'instanciation de la classe Agence
    public function testPersonnageChampCodePostalDefault() {
        $agenceATester = new Agence(null,null,null,null,true);
        $this->assertNull($agenceATester->getZip());
    }
    
    // Teste l'assignation du champ codePostal à l'instanciation de la classe Agence
    public function testPersonnageChampCodePostalAssignation() {
        $agenceATester = new Agence(null,null,null,null,true);
        $codePostal = "80000";
        $agenceATester->setZip($codePostal);
        $this->assertEquals($codePostal,$agenceATester->getZip());
    }
    


    // Teste la visibilité du champ ville de la classe Agence
    public function testPersonnageChampVille(){
        $agenceATester = new Agence(null,null,null,null,true);
        $private = $this->isPropertyPrivate($agenceATester,'_ville');
        $this->assertEquals($this->proprietePrivee,$private);
    }
    
    // Teste la valeur du champ ville à l'instanciation de la classe Agence
    public function testPersonnageChampVilleDefault() {
        $agenceATester = new Agence(null,null,null,null,true);
        $this->assertNull($agenceATester->getVille());
    }
    
    // Teste l'assignation du champ ville à l'instanciation de la classe Agence
    public function testPersonnageChampVilleAssignation() {
        $agenceATester = new Agence(null,null,null,null,true);
        $ville = "Amiens";
        $agenceATester->setVille($ville);
        $this->assertEquals($ville,$agenceATester->getVille());
    }

    // Teste la visibilité du champ restaurant de la classe Agence
    public function testPersonnageChamprestaurant(){
        $agenceATester = new Agence(null,null,null,null,true);
        $private = $this->isPropertyPrivate($agenceATester,'_restaurant');
        $this->assertEquals($this->proprietePrivee,$private);
    }
    
    // Teste la valeur du champ restaurant à l'instanciation de la classe Agence
    public function testPersonnageChamprestaurantDefault() {
        $agenceATester = new Agence(null,null,null,null,true);
        $this->assertNotNull($agenceATester->getRestaurant());
    }
    
      
    // Teste la visibilité du champ agence de la classe Employe
    public function testPersonnageChampAgence(){
        $employeATester = new Employe(null,null, null, null, 0, null,null);
        $private = $this->isPropertyPrivate($employeATester,'_agence');
        $this->assertEquals($this->proprietePrivee,$private);
    }
    
    // Teste la valeur du champ agence à l'instanciation de la classe Agence
    public function testPersonnageChampAgenceDefault() {
        $employeATester = new Employe(null,null, null, null, 0, null,null);
        $this->assertNull($employeATester->getAgence());
    }
    
    // Teste l'assignation du champ agence à l'instanciation de la classe Agence
    public function testPersonnageChampAgenceAssignation() {
        $employeATester = new Employe(null,null, null, null, 0, null,null);
        $agence = new Agence(null,null,null,null,true);
        $employeATester->setAgence($agence);
        $this->assertEquals($agence,$employeATester->getAgence());
    }



}