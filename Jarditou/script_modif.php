<?php
    
    require 'functions.php';
   require 'updateForm.php';
 
   try {
 
      if(isset($_POST['update'])){
        $id = test_input($_POST["ID"]);
        $categorie = test_input($_POST["categorie"]);
        $reference = test_input($_POST["ref"]);
        $libelle = test_input($_POST["libelle"]);
        $description = test_input($_POST["desc"]);
        $prix = test_input($_POST["prix"]);
        $stock = test_input($_POST["stock"]);
        $couleur = test_input($_POST["color"]);
        $photo = test_input($_POST["photo"]);
       /* $dateAjout = test_input($_POST["dateAjout"]);
        $dateModif = test_input($_POST["dateModif"]);*/
        $bloque = test_input($_POST["bloque"]);
        
        
      
        $requete = $db->prepare("UPDATE produits SET 
           /* pro_cat_id=:cat,*/
            pro_ref=:ref,
            pro_libelle=:lib,
            pro_description=:de,
            pro_prix=:prix,
            pro_stock=:sto,
            pro_couleur=:couleur,
            pro_photo=:photo,
          /*  pro_d_ajout=:ajo,
            pro_d_modif=:mod,*/
            pro_bloque=:blo
           
            WHERE pro_id=:id");

/*$requete->bindValue(':cat',$categorie,PDO::PARAM_INT);*/
$requete->bindValue(':ref',$reference,PDO::PARAM_STR);
$requete->bindValue(':lib',$libelle,PDO::PARAM_STR);
$requete->bindValue(':de',$description,PDO::PARAM_STR);
$requete->bindValue(':prix',$prix,PDO::PARAM_INT);
$requete->bindValue(':sto',$stock,PDO::PARAM_INT);
$requete->bindValue(':couleur',$couleur,PDO::PARAM_STR);
$requete->bindValue(':photo',$photo,PDO::PARAM_STR);
/*$requete->bindValue(':ajo',$dateAjout);
$requete->bindValue(':mod',$dateModif);*/
$requete->bindValue(':blo',$bloque);
$requete->bindValue(':id',$id,PDO::PARAM_INT);
  
         $requete->execute();

         $requete->closeCursor();
      }
    }
      catch (Exception $e) {

        echo "La connexion à la base de données a échoué ! <br>";
        echo "Merci de bien vérifier vos paramètres de connexion ...<br>";
        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode();
        die("Fin du script");
}

        echo 'Ce produit a bien été modifié';
        /*header("refresh:3;url=liste.php");*/

        exit;
     
    ?>