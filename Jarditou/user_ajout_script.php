<?php

require 'connexion_bdd.php';
require 'functions.php';


$nom = $prenom = $mail = $login = $MDP= "";

/*CREATE User*/

if(isset($_POST['userLog']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['login']) && !empty($_POST['MDP'])){
    
  $nom = test_input($_POST["nom"]);
  $prenom = test_input($_POST["prenom"]);
  $mail = test_input($_POST["mail"]);
  $mailValid = preg_match ( " /^.+@.+\.[a-zA-Z]{2,}$/ " , $mail );
  $login = test_input($_POST["login"]);
  $MDP = test_input($_POST["MDP"]);
  $datetime = date_create()->format('Y-m-d H:i:s');

  if($mailValid == false){
      header('Location:userForm.php?error=2');
  }elseif(strlen($MDP)<8){
      header('Location:userForm.php?error=3');
  }else{
            
    $db = connexionBase(); // Appel de la fonction de connexion

    $sql = 'INSERT INTO users (use_nom,use_prenom, use_mail, use_login, use_MDP, use_date_inscription, use_date_connexion)
    VALUES (:nom,:prenom ,:mail,:log_in,:MDP,:inscr,:conn)';

    $requete = $db->prepare($sql);
    $requete->bindParam(':nom',$nom);
    $requete->bindParam(':prenom',$prenom);
    $requete->bindParam(':mail',$mail);
    $requete->bindParam(':log_in',$login);
    $requete->bindParam(':MDP',$MDP);
    $requete->bindParam(':inscr',$datetime);
    $requete->bindParam(':conn',$datetime);
    
    $requete->execute();

    echo 'Vous avez bien été inscrit';

    //header("refresh:3;url=liste.php");
  }
  
}


?>