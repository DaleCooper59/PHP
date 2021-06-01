<?php
//echo session_save_path();
session_start();

require_once 'functions.php';

sessionOk($_SESSION['connected']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> <h1>Bienvenue à toi :</h1>
<p><?php echo $_SESSION['pseudo'];?></p>
<p><?php echo $_SESSION['MDP'];?></p>

</body>
</html>