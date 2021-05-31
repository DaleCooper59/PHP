<?php
if(isset($_POST['login']) && isset($_POST['MDP']) && !empty($_POST['login'])&& !empty($_POST['MDP'])){
    session_start();
    $_SESSION['pseudo'] = $_POST['login'];
    $_SESSION['MDP'] = $_POST['MDP'];
    $_SESSION['connected'] = true;
    
    header("location:session-page.php");
}



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

<form action="session-page.php" method="POST">
<label for="login">login</label>
<input type="text" name="login">

<label for="MDP">MDP</label>
<input type="password" name="MDP">

<input type="submit" placeholder="connexion">
<a href="destroySession.php">destroy</a>

</form>


   
</body>
</html>