<?php
$err= isset($_GET['error']) ? $_GET['error'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="loginScript.php" method="POST">
<label for="login">login</label>
<input type="text" name="login">

<label for="MDP">MDP</label>
<input type="password" name="MDP">

<input type="submit" placeholder="connexion">
<a href="destroySession.php">destroy</a>

</form>

<?php
switch($err){
    case 1 :
        echo 'Le login doit etre renseigné';
        break;

    case 2 :
        echo 'Le Mot de passe doit etre renseigné';
        break;

    case 3 :
        echo 'Le Mot de passe ne correspond pas';
        break;

    case 4 :
        echo 'Vous devez vous connecter à votre session';
        break;

    case 5 :
        echo 'Il y a une autre erreur';
        break;

    default : echo '';
        break;
}
?>

   
</body>
</html>