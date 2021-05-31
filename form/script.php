<?php
/*
$societeErr = $contactErr = $adEntErr = $CPErr = $villeErr = $mailErr = $telErr= $envErr = "";
$name = $contact = $adEnt = $CP = $ville = $mail = $tel = $env = "";*/


if(isset($_POST['submit']) && !empty($_POST['societe']) && !empty($_POST['contact']) && !empty($_POST['adEntreprise']) && !empty($_POST['CP']) && !empty($_POST['ville']) && !empty($_POST['mail']) && !empty($_POST['tel']) && !empty($_POST['env'])){
 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

$societe = test_input($_POST["societe"]);
$contact = test_input($_POST["contact"]);
$adEnt = test_input($_POST["adEntreprise"]);
$CP = test_input($_POST["CP"]);
$ville = test_input($_POST["ville"]);
$mail = test_input($_POST["mail"]);
$tel = test_input($_POST["tel"]);
$env = test_input($_POST["env"]);


  echo $societe;
  echo $contact;
  echo $adEnt ;
  echo $CP ;
  echo $ville;
  echo $mail ;
  echo $tel ;
  echo $env ;

  
  header("Refresh:5; url=formulaire.php");
 exit;

}else{
    echo '<span> Vous n\'avez pas tous remplis</span>';
 }
 




require 'error.php';

if (isset($_FILES["fichier"]['name'])) 
{ 

$aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

$finfo = finfo_open(FILEINFO_MIME_TYPE);

$mimetype = finfo_file($finfo, $_FILES["fichier"]["tmp_name"]);

finfo_close($finfo);


if (in_array($mimetype, $aMimeTypes))
{
   echo 'okay';  
   move_uploaded_file($_FILES["fichier"]["tmp_name"], "img/photo.jpg");       
} 
else 
{
  
   echo "Type de fichier non autorisé";    
   exit;
}    
} 
