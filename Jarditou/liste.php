<?php
session_start();
echo '<br>';
setlocale(LC_TIME, 'fr_FR','fra');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Inclusion de fichiers PHP</title>           
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">           
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">    
</head>
<body> 
<h1 class="text-center text-success m-5"> Bonjour à vous <?php echo $_SESSION['pseudo'];?>, qu'est qui vous ferez plaisir en ce <?php echo strftime("%A %d %B %Y");?> ?</h1>
<div class="container">
<h1>Liste des produits</h1>


<?php

require 'connexion_bdd.php';
require 'functions.php';

$db = connexionBase(); // Appel de la fonction de connexion

/*READ*/
$requete = $db->prepare('SELECT * FROM produits 
                         /*WHERE ISNULL(pro_bloque) */
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

displayList($list);

    ?>    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 
    </body>
    </html>