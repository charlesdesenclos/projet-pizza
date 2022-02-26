<?php 
    session_start();
    require_once 'config.php'; // On inclue la connexion à la bdd
    
    $req = ('SELECT * FROM utilisateurs WHERE token = ?');
    $requetStatementutilisateurs = $bdd->query($req);

    // Si les variables existent et qu'elles ne sont pas vides
    if(isset($_POST['id_pizza']) && !empty($_POST['adresse']) && !empty($_POST['bancaire']) && isset($_POST['pseudo']))
    {
        $id_pizza = htmlspecialchars($_POST['id_pizza']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $bancaire = htmlspecialchars($_POST['bancaire']);
        $id_utilisateurs = htmlspecialchars($_POST['pseudo']);

        if(strlen($adresse) <= 100){ // On verifie que la longueur de adresse <= 100
            if(strlen($bancaire) <= 100){ // On verifie que la longueur de l'bancaire <= 100
                if(strlen($id_pizza) <= 11){ // On verifie que la longueur de id_pizza <= 11
                    $req = "INSERT INTO panier(adresse, bancaire, id_pizza, id_utilisateurs) VALUES('".$adresse."','".$bancaire."','".$id_pizza."','".$id_utilisateurs."')";
                    $requetStatementutilisateurs =$bdd->query($req);

                    
                        // On redirige avec le message de succès
                        header('Location:commande_rep.php?reg_err=success');
                        die();
                }else{ header('Location: commande.php?reg_err=id_pizza'); die();}
            }else{ header('Location: commande.php?reg_err=bancaire'); die();}
        }else{ header('Location: commande.php?reg_err=adresse'); die();}
    }

?>