<?php 
    session_start();
    require_once 'config.php'; // On inclue la connexion à la bdd
    
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();

    echo $data['id'];

    

    
    // Si les variables existent et qu'elles ne sont pas vides
    if(isset($_POST['id_pizza']) && isset($data['id']))
    {
        $id_pizza = htmlspecialchars($_POST['id_pizza']);
        $data = htmlspecialchars($data['id']);

        
        
        if(strlen($id_pizza) <= 11){ // On verifie que la longueur de id_pizza <= 11
             $insert = $bdd->prepare('INSERT INTO panier( id_pizza, id_utilisateurs) VALUES(:id_pizza, :id)');
            $insert->execute(array(
                'id_pizza' => $id_pizza,
                'id' => $data
                ));
                // On redirige avec le message de succès
                header('Location:verification_commande.php?reg_err=success');
                die();
                }else{ header('Location: commande.php?reg_err=id_pizza'); die();}
          
    }

?>