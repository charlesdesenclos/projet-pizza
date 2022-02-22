<?php 
        
    try 
    { // connection à la base de donnée
        $bdd = new PDO("mysql:host=mysql-desenclos.alwaysdata.net;dbname=desenclos_pizza;charset=utf8", "desenclos", "sqK8ZUWxuvEpp!y");
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    ?>