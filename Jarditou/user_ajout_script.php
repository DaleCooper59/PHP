<?php

require './back_office/connexion_bdd.php';
require './back_office/functions.php';


$nom = $prenom = $email = $login = $MDP=/* $MDPconfirmed = $hashedMDP = $datetime =*/  "";

/*CREATE User*/

if(isset($_POST['userLog']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['login']) && !empty($_POST['MDP']) && !empty($_POST['MDPconfirmed'])){
    
  $nom = test_input($_POST["nom"]);
  $prenom = test_input($_POST["prenom"]);
  $email = test_input($_POST["mail"]);
  $mailValid = preg_match ( " /^.+@.+\.[a-zA-Z]{2,}$/ " , $email );
  $login = test_input($_POST["login"]);
  $MDP = test_input($_POST["MDP"]);
  $MDPconfirmed = test_input($_POST['MDPconfirmed']);
  $hashedMDP = password_hash($MDP,PASSWORD_DEFAULT);
  $datetime = date_create()->format('Y-m-d H:i:s');

  if($mailValid == false){
      header('Location:userForm.php?error=1');
  }elseif(strlen($MDP)<8){
      header('Location:userForm.php?error=3');
  }elseif($MDP != $MDPconfirmed){
    header('Location:userForm.php?error=4');
  }elseif(mailExist($email) == 'oui'){
    header('Location:userForm.php?error=2');
  }else{
            
    $db = connexionBase(); // Appel de la fonction de connexion

    $sql = 'INSERT INTO users (use_nom,use_prenom, use_mail, use_login, use_MDP, use_date_inscription, use_date_connexion)
    VALUES (:nom,:prenom ,:mail,:log_in,:MDP,:inscr,:conn)';

    $requete = $db->prepare($sql);
    $requete->bindParam(':nom',$nom);
    $requete->bindParam(':prenom',$prenom);
    $requete->bindParam(':mail',$email);
    $requete->bindParam(':log_in',$login);
    $requete->bindParam(':MDP',$hashedMDP);
    $requete->bindParam(':inscr',$datetime);
    $requete->bindParam(':conn',$datetime);
    
    $requete->execute();

    echo 'Vous avez bien été inscrit';

    //header("refresh:2;url=loginForm.php");
  }
  
}


?>