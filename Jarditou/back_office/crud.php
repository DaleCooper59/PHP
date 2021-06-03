<?php
require 'connexion_bdd.php';
require 'functions.php';


/*CREATE Product*********************************************************************************************/
function createProduct(){
    
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
  
    echo 'ce produit a bien été ajouté';
  
    header("refresh:3;url=../liste.php");
  
  }
}

/*READ************************************************************************************************************/
function readAll()
{
    $db = connexionBase(); // Appel de la fonction de connexion   

    $requete = $db->prepare('SELECT * FROM produits 
                         /*WHERE ISNULL(pro_bloque) */
                         ORDER BY pro_d_ajout DESC');

    $requete->execute();


    if (!$requete) {
        $tableauErreurs = $db->errorInfo();
        echo $tableauErreurs[2];
        die("Erreur dans la requête");
    }

    if ($requete->rowCount() == 0) {
        // Pas d'enregistrement
        die("La table est vide");
    }

    $list = $requete->fetchAll(PDO::FETCH_OBJ);

    displayList($list);
}



/*UPDATE***********************************************************************************************************/

function updateProduct(){
    if(isset($_POST['update'])){
        
        $db = connexionBase(); // Appel de la fonction de connexion   

        $id = test_input($_POST["ID"]);
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
        
        
      
        $requete = $db->prepare("UPDATE produits SET 
            pro_cat_id=:cat,
            pro_ref=:ref,
            pro_libelle=:lib,
            pro_description=:de,
            pro_prix=:prix,
            pro_stock=:sto,
            pro_couleur=:couleur,
            pro_photo=:photo,
            pro_d_ajout=:ajo,
            pro_d_modif=:mod,
            pro_bloque=:blo
           
            WHERE pro_id=:id");

$requete->bindValue(':cat',$categorie,PDO::PARAM_INT);
$requete->bindValue(':ref',$reference,PDO::PARAM_STR);
$requete->bindValue(':lib',$libelle,PDO::PARAM_STR);
$requete->bindValue(':de',$description,PDO::PARAM_STR);
$requete->bindValue(':prix',$prix,PDO::PARAM_INT);
$requete->bindValue(':sto',$stock,PDO::PARAM_INT);
$requete->bindValue(':couleur',$couleur,PDO::PARAM_STR);
$requete->bindValue(':photo',$photo,PDO::PARAM_STR);
$requete->bindValue(':ajo',$dateAjout);
$requete->bindValue(':mod',$dateModif);
$requete->bindValue(':blo',$bloque);
$requete->bindValue(':id',$id,PDO::PARAM_INT);
  
         $requete->execute();

         $requete->closeCursor();
    
   
        echo 'Ce produit a bien été modifié';
        header("refresh:2;url=../liste.php");

        exit;
    }   
}

/*DELETE***********************************************************************************************************/
function deleteProduct()
{
    if (isset($_POST['delete'])) {
        $db = connexionBase(); // Appel de la fonction de connexion;

        $requete = $db->prepare("DELETE FROM produits WHERE pro_id =" . $_GET['pro_id']);
        $requete->execute();

        echo 'Ce produit a bien été détruit de la BDD';
        header("refresh:2;url=../liste.php");
    }
}
