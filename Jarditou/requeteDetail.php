
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Atelier PHP N°4 - page de détail</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">           
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> 

    <?php
require 'connexion_bdd.php';
$valuePourBind=$_GET["pro_id"];


$db = connexionBase(); // Appel de la fonction de connexion


$requete = $db->prepare('SELECT * FROM produits WHERE pro_id = :idNbr');

$requete->bindValue(":idNbr",$valuePourBind);

$requete->execute();

$list = $requete -> fetchAll(PDO::FETCH_OBJ);

?>

  </head>
  <body>

  <div class="container-fluid d-flex justify-content-center">

  
  <?php
$jpg = $valuePourBind;


foreach($list as $l){
    echo ' <div class="card" style="width: 40rem;">
     <img class="card-img-top" src="./jarditou_photos/'.$jpg.'.jpg." alt="Card image cap">
     <div class="card-body">
     <h5 class="card-title">'. $l->pro_id.'</h5>
     <ul class="list-group list-group-flush">
    <li class="list-group-item">'.$l->pro_ref.'</li>
    <li class="list-group-item">'.$l->pro_cat_id.'</li>
    <li class="list-group-item">'.$l->pro_libelle.'</li>
    
  </ul>

  <p class="card-text">'.$l->pro_description.'</p>
  <div>'.$l->pro_prix.' euros</div>
  <div>'.$l->pro_stock.'</div>
  <div>'.$l->pro_couleur.'</div>
 <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
  </div>
  </div>
     ';
    
     
 } 
 ?> 
 
 <form action="" method="POST" class="d-block">
 <button type="submit" name="delete" class="btn btn-warning d-block"> <a href="updateForm.php?pro_id=<?php echo $valuePourBind ?>">Modifier</button></button>

 <button type="submit" name="delete" class="btn btn-warning d-block">Détruire</button>
</form>

  </div>


<?php

/*DELETE*/
if(isset($_POST['delete'])){
  $requete = $db->prepare("DELETE FROM produits WHERE pro_id =". $_GET['pro_id']);
  $requete->execute();

  echo 'Ce produit a bien été détruit de la BDD';
  header("refresh:3;url=liste.php");
}
?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 
 </body>
</html>