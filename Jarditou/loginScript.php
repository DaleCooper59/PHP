<?php
$login = isset($_POST['login']) && !empty($_POST['login']) ? $_POST['login'] : '';
$mdp = isset($_POST['MDP']) && !empty($_POST['MDP']) ? $_POST['MDP'] : '';

if($login && $mdp){
    if($mdp != 'ttt'){
        header('location:form.php?error=3');
    }else{
    session_start();
    
    $_SESSION['pseudo'] = $login;
    $_SESSION['MDP'] = $mdp;
    $_SESSION['connected'] = true;

    header("location:sessionPage.php");
    }
}elseif($login==''){
    header('Location:form.php?error=1');
}elseif($mdp ==''){
    header('Location:form.php?error=2');
}else{
    header('Location:form.php?error=5');
}
?>
