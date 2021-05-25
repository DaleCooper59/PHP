<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Inclusion de fichiers PHP</title>           
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">           
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">    
</head>
<body> 
<div class="container">
<h1>Liste des produits</h1>
<?php

require 'connexion_bdd.php';

$db = connexionBase(); // Appel de la fonction de connexion

$requete = $db->prepare('SELECT * FROM produits 
                         WHERE ISNULL(pro_bloque) 
                         ORDER BY pro_d_ajout DESC');

$requete->execute();


if (!$requete) 
{
    $tableauErreurs = $db->errorInfo();
    echo $tableauErreurs[2]; 
    die("Erreur dans la requête");
}

if ($requete->rowCount() == 0) 
{
   // Pas d'enregistrement
   die("La table est vide");
}

$list = $requete -> fetchAll(PDO::FETCH_OBJ);


    echo '<table class="table">';
    echo '<thead class="thead-light">';
    echo '<tr>';
    echo '<th scope="col">Photo</th>';
    echo '<th scope="col">#</th>';
    echo '<th scope="col">Reference</th>';
    echo '<th scope="col">Libellé</th>';
    echo '<th scope="col">Prix</th>';
    echo '<th scope="col">Stock</th>';
    echo '<th scope="col">Couleur</th>';
    echo '<th scope="col">Ajout</th>';
    echo '<th scope="col">Modif</th>';
    echo '<th scope="col">Bloqué</th>';
    echo ' </tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach($list as $l){
    echo '<tr>';
    echo '<td>'.$l->pro_photo.'</td>';
    echo '<th scope="row"><a href="./requeteDetail.php?pro_id='.$l->pro_id.'">'.$l->pro_id.'</a></th>';
    echo '<td>'.$l->pro_ref.'</td>';
    echo '<td><a href="./requeteDetail.php?pro_id='.$l->pro_id.'">'.$l->pro_libelle.'</a></td>';
    echo '<td>'.$l->pro_prix.'</td>';
    echo '<td>'.$l->pro_stock.'</td>';
    echo '<td>'.$l->pro_couleur.'</td>';
    echo '<td>'.$l->pro_d_ajout.'</td>';
    echo '<td>'.$l->pro_d_modif.'</td>';
    echo '<td>'.$l->pro_bloque.'</td>';
    echo '</tr>';
}
    echo '</tbody>';
    echo '</table>';

    ?>    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 
    </body>
    </html>