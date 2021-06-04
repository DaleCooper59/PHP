<?php
session_start();
function sessionOk($connected)
{
    if (!isset($connected) || $connected == false) {
        header('Location:userForm.php?error=5');
    }
}
sessionOk($_SESSION['connected']);
setlocale(LC_TIME, 'fr_FR', 'fra');


if (isset($_POST['addBasket'])) {
    if (isset($_POST['basket'])) {

        $basket_ids = array_column($_SESSION['basket'], 'id');

        if (!in_array($_GET['pro_id'], $basket_ids)) {
            $newBasket = array(
                'id' => $_GET['pro_id'],
                'libelle' => $_POST['libelle'],
                'prix' => $_POST['prix'],
                'quantite' => $_POST['quantite']
            );

            $_SESSION['basket'][] = $newBasket;
        }
    } else {
        $newBasket = array(
            'id' => $_GET['pro_id'],
            'libelle' => $_POST['libelle'],
            'prix' => $_POST['prix'],
            'quantite' => $_POST['quantite']
        );

        $_SESSION['basket'][] = $newBasket;
    }
}

if(isset($_GET['action'])){
    if($_GET['action'] == 'annuler'){
        unset($_SESSION['basket']);
    }
    if($_GET['action'] == 'retirer'){

        foreach($_SESSION['basket'] as $k => $v){
            if($v['id'] == $_GET['id']){
                unset($_SESSION['basket'][$k]);
            }
        }
        
    }
    
}
 

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
    <a href="./back_office/destroySession.php" class="btn btn-danger">Se déconnecter</a>

    <h1 class="text-center text-success m-5"> Bonjour à vous <?php if ($_SESSION['pseudo'] == 'admin') {
                                                                    echo 'Chris';
                                                                } else {
                                                                    echo $_SESSION['pseudo'];
                                                                }  ?>, qu' aimeriez vous en ce <?php echo strftime("%A %d %B %Y"); ?> ?</h1>
    <div class="container">
        <h1>Liste des produits</h1>

        <div class="text-right m-5">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Basket</button>

        </div>
        <?php

        //$path = $_SERVER['DOCUMENT_ROOT'].'/PHP-Formation/Jarditou/back_office/';

        require './back_office/crud.php';

        readAll();


        function displayList($listToDisplay)
        { ?>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Photo</th>
                        <th scope="col">#</th>
                        <th scope="col">Reference</th>
                        <th scope="col">Libellé</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Couleur</th>
                        <th scope="col">Ajout</th>
                        <th scope="col">Modif</th>
                        <th scope="col">Bloqué</th>
                        <th scope="col" class="mx-0">Ajout au panier</th>
                    </tr>
                </thead>
                <?php
                foreach ($listToDisplay as $l) {
                    echo '<form action="liste.php?pro_id=' . $l->pro_id . '" method="POST">
    <tbody> 
    <tr>
    
    <td>' . $l->pro_photo . '</td>
    <th scope="row"><a href="./requeteDetail.php?pro_id=' . $l->pro_id . '">' . $l->pro_id . '</a></th>
    <td>' . $l->pro_ref . '</td>
    <td><a href="./requeteDetail.php?pro_id=' . $l->pro_id . '">' . $l->pro_libelle . '</a></td>
    <td>' . number_format($l->pro_prix, 2, ',') . '</td>
    <td>' . $l->pro_stock . '</td>
    <td>' . $l->pro_couleur . '</td>
    <td>' . $l->pro_d_ajout . '</td>
    <td>' . $l->pro_d_modif . '</td>
    <td>' . $l->pro_bloque . '</td>
    
    <td><input type="submit" name="addBasket" class="btn btn-primary" value="Ajouter"></td> 
    <td><input type="hidden" name="libelle" value="' . $l->pro_libelle . '"></td>
    <td><input type="hidden" name="prix" value="' . $l->pro_prix . '"></td>
    <td><input type="number" min=0 name="quantite" value="0">Quantité</td>
    </tr>
    </tbody>
    </form>';
                }
                ?>
            </table>
        <?php
        }
        $displayBasket = '';
        $total=0;

        $displayBasket .= '
   <table class="table">
   <thead>
     <tr>
       <th scope="col">#</th>
       <th scope="col">libelle</th>
       <th scope="col">prix</th>
       <th scope="col">quantité</th>
     </tr>
   </thead>
   ';

        if (!empty($_SESSION['basket'])) {
            foreach ($_SESSION['basket'] as $k => $v) {

                $displayBasket .= '
        <tbody>
        <tr>
          <th scope="row">' . $v['id'] . '</th>
          <td>' . $v['libelle'] . '</td>
          <td>' . $v['prix'] . '</td>
          <td>' . $v['quantite'] . '</td>
          <td><a type="button" href="liste.php?action=retirer&id=' . $v['id'] . '" class="btn btn-danger" >retirer</a></td>
        </tr>
        ';

        $total += $v['quantite'] * $v['prix'];
            }
            
            $displayBasket .= '
       <tfoot>
       <tr>
           <th scope="row">total</th>
           <td>'. $total.' €</td>
       </tr>
       </tfoot>
       ';
        }
        
        

?>


        <div class="modal" id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Contenu du panier</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><?php echo $displayBasket; ?></p>
                    </div>
                    <div class="modal-footer">
                        <a type="button" href="" class="btn btn-primary">commander</a>
                        <a type="button" href="liste.php?action=annuler" class="btn btn-danger">annuler</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="script.js"></script>
</body>

</html>