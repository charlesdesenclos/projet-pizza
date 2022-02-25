<?php 
        
        
        try 
    {
        $bdd = new PDO("mysql:host=mysql-desenclos.alwaysdata.net;dbname=desenclos_pizza;charset=utf8", "desenclos", "sqK8ZUWxuvEpp!y");
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }
       

    //  GESTION DES SESSIONS
        if(!is_null($mabase)){
            if (isset($_SESSION["Connected"]) && $_SESSION["Connected"]===true){
                $access = true;
                if(isset($_SESSION["idUser"])){
                    $utilisateur1->setUserById($_SESSION["idUser"]);
                }
            }else{
                $access = false;
            // Affichage de formulaire si pas deconnexion
                $access = $utilisateur1->ConnectToi();
            }
        }else{
            $errorMessage.= "Le site n'a pas accès à la BDD.";
        }
    ?>