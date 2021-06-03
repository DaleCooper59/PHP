<?php

$reference = $categorie = $libelle = $description = $prix= 
$stock = $couleur = $photo = $dateAjout = $dateModif = $bloque = "";

if(isset($_POST['create'])){

require 'crud.php';  

createProduct();

require 'errorUpload.php';

if (isset($_FILES["uploadPhoto"]['name'])) 
{ 

$aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

$finfo = finfo_open(FILEINFO_MIME_TYPE);

$mimetype = finfo_file($finfo, $_FILES["uploadPhoto"]["tmp_name"]);

finfo_close($finfo);


if (in_array($mimetype, $aMimeTypes))
{
   echo 'okay';  
   move_uploaded_file($_FILES["uploadPhoto"]["tmp_name"], "jarditou_photos/nbr.jpg");       
} 
else 
{
  
   echo "Type de fichier non autorisé";    
   exit;
}    
} 
 
}
