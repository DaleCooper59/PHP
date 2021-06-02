<?php
session_start();
unset($_SESSION["pseudo"]);
unset($_SESSION["MDP"]);

if (ini_get("session.use_cookies")) 
{
    setcookie(session_name(), '', time()-1);
}
session_destroy();

echo 'La session a été détruite, vous allez revenir sur le formulaire';
header("Refresh:3; url=loginForm.php");