<?php

require 'connexion_bdd.php';

$db = connexionBase(); // Appel de la fonction de connexion

$requete = $db->prepare('SELECT * FROM produits');

$requete->execute();

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
    echo '<td>'.$l->pro_libelle.'</td>';
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

