<?php
function connexionBase()
{
   // Paramètre de connexion serveur
   $host = "mysql:host=localhost";
   $DBName =";charset=utf8;dbname=jarditou";
   $login= "root";  // Votre loggin d'accès au serveur de BDD 
   $password="";    // Le Password pour vous identifier auprès du serveur
  

   try 
   {

        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false

        ];

        $db = new PDO($host.$DBName, $login, $password,$options);

        
        return $db;
    } 
    catch (Exception $e) 
    {
        echo 'Erreur : ' . $e->getMessage() . '<br>';
        echo 'N° : ' . $e->getCode() . '<br>';
        die('Connexion au serveur impossible.');
    } 
}

