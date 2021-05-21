<?php

$ID = $photo = $reference = $categorie = $libelle = $description = $prix= 
$stock = $couleur = $bloque = $dateAjout = $dateModif = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $ID = test_input($_POST["ID"]);
  $photo = test_input($_POST["photo"]);
  $reference = test_input($_POST["ref"]);
  $categorie = test_input($_POST["categorie"]);
  $libelle = test_input($_POST["libelle"]);
  $description = test_input($_POST["desc"]);
  $prix = test_input($_POST["prix"]);
  $stock = test_input($_POST["stock"]);
  $couleur = test_input($_POST["color"]);
  $bloque = test_input($_POST["bloque"]);
  $dateAjout = test_input($_POST["dateAjout"]);
  $dateModif = test_input($_POST["dateModif"]);

  echo 'all is alrigth!!!';
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function is_Set($p){
    if(isset($p) && !empty($p)){
        return true;
    }
}



?>