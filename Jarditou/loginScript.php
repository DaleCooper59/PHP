<?php
$login = isset($_POST['login']) && !empty($_POST['login']) ? $_POST['login'] : '';
$mdp = isset($_POST['MDP']) && !empty($_POST['MDP']) ? $_POST['MDP'] : '';

require './back_office/connexion_bdd.php';
require './back_office/functions.php';

$db = connexionBase(); // Appel de la fonction de connexion

if($login && $mdp){
    $login = test_input($_POST["login"]);
    $mdp = test_input($_POST["MDP"]);

    $sql = "SELECT * FROM users WHERE use_login = ?";

    $requete = $db->prepare($sql);   
    $requete->bindParam(1,$login);

    $requete->execute();

    $user = $requete->fetch();
    
    if(password_verify($mdp,$user['use_MDP'])){
    session_start();
    
    $_SESSION['pseudo'] = $login;
    $_SESSION['MDP'] = $mdp;
    $_SESSION['connected'] = true;

    echo '<h1>Contents de vous revoir ' . $login .' !</h1>';

    header("Refresh: 2; url=liste.php");
    
    }else{
        header('location:loginForm.php?error=3');
    }
}elseif($login==''){
    header('Location:loginForm.php?error=1');
}elseif($mdp ==''){
    header('Location:loginForm.php?error=2');
}else{
    header('Location:loginForm.php?error=6');
}
?>
