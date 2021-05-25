<?php

require 'connexion_bdd.php';

/*$ID = */ $reference = $categorie = $libelle = $description = $prix= 
$stock = $couleur = $photo = $dateAjout = $dateModif = $bloque = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  /*$ID = test_input($_POST["ID"]);*/
  $categorie = test_input($_POST["categorie"]);
  $reference = test_input($_POST["ref"]);
  $libelle = test_input($_POST["libelle"]);
  $description = test_input($_POST["desc"]);
  $prix = test_input($_POST["prix"]);
  $stock = test_input($_POST["stock"]);
  $couleur = test_input($_POST["color"]);
  $photo = test_input($_POST["photo"]);
  $dateAjout = test_input($_POST["dateAjout"]);
  $dateModif = test_input($_POST["dateModif"]);
  $bloque = test_input($_POST["bloque"]);

  echo 'all is alrigth!!!';

  $db = connexionBase(); // Appel de la fonction de connexion

  $sql = 'INSERT INTO produits (pro_cat_id,pro_ref, pro_libelle, pro_description, pro_prix, 
  pro_stock, pro_couleur, pro_photo, pro_d_ajout, pro_d_modif, pro_bloque)
  VALUES (:cat,:ref ,:lib,:de,:prix,:sto,:couleur,:photo,:ajo,:mod,:blo)';

  $requete = $db->prepare($sql);
  $requete->bindParam(':cat',$categorie);
  $requete->bindParam(':ref',$reference);
  $requete->bindParam(':lib',$libelle);
  $requete->bindParam(':de',$description);
  $requete->bindParam(':prix',$prix);
  $requete->bindParam(':sto',$stock);
  $requete->bindParam(':couleur',$couleur);
  $requete->bindParam(':photo',$photo);
  $requete->bindParam(':ajo',$dateAjout);
  $requete->bindParam(':mod',$dateModif);
  $requete->bindParam(':blo',$bloque);

  $requete->execute();

  header("Location:liste.php");
 
}
function test_input($data) {
if(isset($data) && !empty($data)){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
}




?>