<?php
require 'connexion_bdd.php';

$valuePourBind=$_GET["pro_id"];


$db = connexionBase(); // Appel de la fonction de connexion

$requete = $db->prepare('SELECT * FROM produits WHERE pro_id = :idNbr');

$requete->bindValue(":idNbr",$valuePourBind);

$requete->execute();

$list = $requete -> fetchAll(PDO::FETCH_OBJ);
