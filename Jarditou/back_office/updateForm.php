<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>

<body>
  <?php
  require 'connexion_bdd.php';

  $db = connexionBase();

  $id = $_GET['pro_id'];

  if ($id) {
    $requete = "SELECT * FROM produits WHERE pro_id =" . $id;
    $result = $db->query($requete);
    $row = $result->fetch(PDO::FETCH_OBJ);

    $result->closeCursor();
  }

  ?>
  <div class="container">

    <h1>Produit à modifier</h1>

    <form action="script_modif.php" method="POST">
      <div class="form-group">
        <label for="ID">ID </label>
        <input type="number" name="ID" readonly class="form-control" id="ID" aria-describedby="ID" value="<?php echo $row->pro_id ?>">
      </div>


      <div class="form-group">
        <label for="categorie">Catégorie</label>
        <input type="text" name="categorie" class="form-control" id="categorie" aria-describedby="categorieProduit" value="<?php echo $row->pro_cat_id; ?>">
      </div>
      <div class="form-group">
        <label for="ref">Références</label>
        <input type="text" name="ref" class="form-control" id="ref" aria-describedby="referenceProduit" value="<?php echo $row->pro_ref ?>">
      </div>
      <div class="form-group">
        <label for="libelle">Libellé</label>
        <input type="text" name="libelle" class="form-control" id="libelle" aria-describedby="nomProduit" value="<?php echo $row->pro_libelle ?>">
      </div>
      <div class="form-group">
        <label for="desc">Description</label>
        <input type="text" name="desc" class="form-control" id="desc" aria-describedby="description" value="<?php echo $row->pro_description ?>">
      </div>
      <div class="form-group">
        <label for="prix">Prix en Euros à l'unité</label>
        <input type="number" step="0.01" name="prix" class="form-control" id="prix" aria-describedby="prix" value="<?php echo $row->pro_prix ?>">
      </div>
      <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" name="stock" class="form-control" id="stock" aria-describedby="stockRestant" value="<?php echo $row->pro_stock ?>">
      </div>
      <div class="form-group">
        <label for="color">Couleur</label>
        <input type="text" name="color" class="form-control" id="color" aria-describedby="couleur" value="<?php echo $row->pro_couleur ?>">
      </div>
      <div class="form-group">
        <label for="photo">Photo</label>
        <input type="text" name="photo" class="form-control" id="photo" aria-describedby="photo du produit" value="<?php echo $row->pro_photo ?>">
      </div>

  </div>


  <div class="d-block">
    <div class="d-flex">
      <span>Date d'ajout :</span>
      <div class="form-group mx-3">

        <input class="form-control" readonly type="date" value="<?php echo $row->pro_d_ajout ?>" id="dateAjout" name="dateAjout">
      </div>
    </div>

    <div class="d-flex">
      <span>Date de modification :</span>
      <div class="form-group mx-3">

        <input class="form-control" type="date" value="<?php echo $row->pro_d_modif ?>" id="dateModif" name="dateModif">

      </div>
    </div>


    <div class="d-flex">
      <span>Prdouit bloqué :</span>
      <div class="form-check mx-3">
        <input class="form-check-input" type="radio" name="bloque" id="bloqueOui" value="Oui" checked>
        <label class="form-check-label" for="bloqueOui">
          Oui
        </label>
      </div>
      <div class="form-check mx-3 ">
        <input class="form-check-input" type="radio" name="bloque" id="bloqueNon" value="Non">
        <label class="form-check-label" for="bloqueNon">
          Non
        </label>
      </div>




      <button type="submit" name="update" class="btn btn-warning d-block">Submit</button>

      </form>

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>