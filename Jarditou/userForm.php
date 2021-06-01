<?php
$err= isset($_GET['error']) ? $_GET['error'] : '';
$error1 ='Votre email ne respecte pas le formalisme';
$error2 = 'Le pseudo existe déjà';
$error3 = 'Le mot de passe est trop court';


?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <title>formulaire ajout</title>

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">           
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">    

</head>
<body>
  <div class="container">

  <h1 class="text-center m-5">Déjà venu ? Connectez vous sinon inscrivez vous</h1>
  

  <div class="container">

<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<header class="card-header">
	<a href="loginForm.php" class="float-right btn btn-outline-primary mt-1">Se connecter</a>
	<h4 class="card-title mt-2">S'inscrire</h4>
</header>
<article class="card-body">
<form action="user_ajout_script.php" method="POST">
	<div class="form-row">
		<div class="col form-group">
			<label for="nom">Nom </label>   
		  	<input type="text" class="form-control" name="nom" required placeholder="bla">
		</div> <!-- form-group end.// -->
		<div class="col form-group">
			<label for="prenom">Prénom</label>
		  	<input type="text" class="form-control" name="prenom" required placeholder="bla">
		</div> <!-- form-group end.// -->
	</div> <!-- form-row end.// -->
	<div class="form-group">
		<label for="mail">Adresse mail</label>
		<br>
		<span><?php if($err){echo '<b class="text-danger">' . $error1 .'</b>';}?></span>
		<input type="email" class="form-control" name="mail" required placeholder="bla@bla.bla">
		<small class="form-text text-muted">Votre adresse mail ne sera jamais partagée</small>
	</div> <!-- form-group end.// -->
		
	<div class="form-group">
		<label for="login">Créer votre pseudo</label>
	    <input type="text" class="form-control" required name="login" >
	</div> <!-- form-group end.// -->  
    <div class="form-group">
		<label for="MDP">Créer un mot de passe fort, consulter un <a href="https://passwordsgenerator.net/">générateur</a> pour vous aider </label>
		<span><?php if($err){echo '<b class="text-danger">' . $error3 .'</b>';}?></span>
		<input type="password" class="form-control" required name="MDP">
	</div> <!-- form-group end.// -->  
    <div class="form-group">
        <button type="submit" name="userLog" class="btn btn-primary btn-block"> S'inscrire</button>
    </div> <!-- form-group// -->      
    <small class="text-muted">En cliquant sur le bouton s'inscrire vous acceptez nos termes et conditions.</small>                                          
</form>
</article> <!-- card-body end .// -->
<div class="border-top card-body text-center">Vous avez un compte? <a href="loginForm.php">Se connecter</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div> 
<!--container end.//-->
 
</form>


<?php /*
switch($err){
    case 1 :
        echo 'Le login est déjà utilisé';
        break;

    case 2 :
        echo $error2;
        break;

    case 3 :
        echo 'Il y a une autre erreur';
        break;

    default : echo '';
        break;
}*/
?>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 

</body>
</html>
