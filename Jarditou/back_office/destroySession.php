<?php
session_start();
$login = $_SESSION['pseudo'];
unset($_SESSION["pseudo"]);
unset($_SESSION["MDP"]);

if (ini_get("session.use_cookies")) 
{
    setcookie(session_name(), '', time()-1);
}
session_destroy();

echo 'Vous avez été déconnecté, au revoir ' . $login .' à très vite !';
header("Refresh:2; url=../loginForm.php");