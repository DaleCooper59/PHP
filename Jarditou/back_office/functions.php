<?php
// Fichier 'functions.php'

function writeMessage($sText) 
{
   $sHtml = "<h1>".$sText."</h1>";
   echo $sHtml;
}  


function test_input($data) {
   if(isset($data) && !empty($data)){
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
     }
   }

   
function mailExist($mail){
   $db = connexionBase(); // Appel de la fonction de connexion
 
   $sql = 'SELECT * FROM `users` WHERE use_mail = ?';
   $requete = $db->prepare($sql);
   $requete->bindParam(1,$mail);
   $requete->execute();
 
   $res = $requete->fetch();

   if($res['use_mail']){
     return true; 
   }
  
 }


  