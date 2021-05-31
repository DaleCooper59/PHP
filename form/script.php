<?php

if (empty($_POST["societe"])){
    echo "Le nom doit être renseigné";
    header("Refresh:1.5; url=formulaire.php");
    exit;
} else{
    echo 'alllll good';
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
?>