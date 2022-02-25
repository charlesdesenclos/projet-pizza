<?php 
    session_start();
    require_once 'config.php'; // On inclue la connexion à la bdd
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();

    // Si les variables existent et qu'elles ne sont pas vides
    if(isset($_POST['id_pizza']) && !empty($_POST['adresse']) && !empty($_POST['bancaire']))
    {
        $id_pizza = htmlspecialchars($_POST['id_pizza']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $bancaire = htmlspecialchars($_POST['bancaire']);

        

        if(strlen($adresse) <= 100){ // On verifie que la longueur de pizza <= 100
            if(strlen($bancaire) <= 100){ // On verifie que la longueur de l'addresse <= 100
                if(strlen($id_pizza) <= 100){ // On verifie que la longueur de bancaire <= 100
                    $insert = $bdd->prepare('INSERT INTO Commande(adresse, bancaire, id_pizza) VALUES(:adresse, :bancaire, :id_pizza)');
                    $insert->execute(array(
                        'adresse' => $adresse,
                        'bancaire' => $bancaire,
                        'id_pizza' => $id_pizza,
                        ));
                        // On redirige avec le message de succès
                        header('Location:commande_rep.php?reg_err=success');
                        die();
                }else{ header('Location: commande.php?reg_err=id_pizza'); die();}
            }else{ header('Location: commande.php?reg_err=bancaire'); die();}
        }else{ header('Location: commande.php?reg_err=adresse'); die();}
    }

?>