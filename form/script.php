<?php

if (empty($_POST["societe"])){
    echo "Le nom doit être renseigné";
    header("Refresh:1.5; url=formulaire.php");
    exit;
} else{
    echo 'alllll good';
}


?>