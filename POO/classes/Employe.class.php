<?php

require 'C:/xampp/htdocs/PHP-Formation/POO/classes/agence.class.php';

class Employe extends Agence{
    private $_name;
    private $_prenom;
    private $_dateEmbauche = "23-07-1998";
    private $_fonction;
    private int $_salaire=0;
    private $_service;
    private $_agence;
    private $_enfant=array();
    protected $_ticketRestaurant =false;

    public function __construct($name,$prenom,$dateEmbauche,$fonction,$salaire,$service,$agence)
    {
        $this->_name = $name;
        $this->_prenom = $prenom;
        $this->_dateEmbauche = $dateEmbauche;
        $this->_fonction = $fonction;
        $this->_salaire = $salaire;
        $this->_service = $service;
        $this->_agence = $agence;
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
        if($interval->format("%y") >= 1){
            echo ' Vous pouvez avoir des chèques vacances ';
    }else{
        echo ' Il faut un aminimum pur bénéficier de chèques vacances ';
    }
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

    public function calcPrime($salaire,$dateEmbauche)
    {   
       $dateEmbauche = $this->_dateEmbauche;
       $dateNow = new DateTime();
       $year = $dateNow->diff(new DateTime($dateEmbauche));
       $ancienneté = $year->format("%y");
       $salaire = $this->_salaire;
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
            
            echo "la prime de " . $this->calcPrime(/*2000*/$this->_salaire, $this->_dateEmbauche /*"22-06-2006"*/) . " euros a été transférée à la banque";
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

    public function setAgence($agence)
    {
        
        return $this->_agence =$agence;
    }
    
    public function getAgence()
    {
        return $this->_agence;
    }
    public function setEnfant($enfant)
    {
       
        return $this->_enfant += $enfant;
    }
    
    public function getEnfant()
    {
        
        return $this->_enfant;
    }

   
    //si employe a des tickets restaurants, il n'y pas de restaurant dans l'agence
    public function setTicketRestaurant($ticketRestaurant)
    {
        parent::setRestaurant();
        echo 'Profitez de vos tickets restaurants de la région';
        return $this->_ticketRestaurant =$ticketRestaurant;
    }

    public function getTicketRestaurant(): bool
    {
        return $this->_ticketRestaurant;
    }

}
    


$e = new Employe("jean","jack",0,0,0,0,'true');
$f = new Employe("clm","paul",null,null,0,null,'renoir');
$g = new Employe("haaaa",'rachid',null,null,0,null,'agen');
$h = new Employe("jkhjkhkujh","mili",null,null,0,null,'yeah');

$tab = [$e,$f,$g,$h];
$nomTab = [];
for ($i=0; $i < count($tab); $i++) {
    
    //var_dump($tab[$i]->getNom());
    array_push($nomTab,$tab[$i]->getNom());
    /*var_dump($tab[$i]->getListEmploye());*/
}

if($e->getTicketRestaurant() === false){
    echo 'Venez vous restaurer à la cantine de l\'entreprise ';
}

$e->setEnfant(array('tom' => 9));
$e->setEnfant(array('ali' => 16));
$e->setEnfant(array('laura' => 16));

$val =array_values($e->getEnfant());

$ten=0;
$fifteen=0;
$eighteen=0;
foreach($val as $v){
    if ($v <= 10 ){
        $ten++;
    }elseif($v > 10 && $v <= 15){
        $fifteen++;
    }elseif($v <=18){
      $eighteen++;
    }else{
        return '';
    }
  
}
 
if($ten > 0 ){
    echo 'vous avez droit à ' . $ten . ' chèque(s) cadeau de 20 euros';
}
 
if($fifteen > 0 ){
    echo 'vous avez droit à ' . $fifteen . ' chèque(s) cadeau de 20 euros';
}
 
if($eighteen > 0 ){
    echo 'vous avez droit à ' . $eighteen . ' chèque(s) cadeau de 20 euros';
}


$nbEmp = count($tab);
echo __FILE__,' '. $nbEmp;


