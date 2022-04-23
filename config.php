<?php 
        
        $tableauUser =array();
        try 
    {
        $bdd = new PDO("mysql:host=mysql-desenclos.alwaysdata.net;dbname=desenclos_pizza;charset=utf8", "desenclos", "sqK8ZUWxuvEpp!y");

        $req2= "SELECT * FROM utilisateurs WHERE token = ?";
        $reponse = $bdd ->query($req2);
        while ($donnees = $reponse->fetch())
        {
            array_push($tableauUser,new User($donnees['pseudo'],$donnees['email'],$donnees['password']));
        }
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }
       

    
    ?>