<?php
    session_start();
    include 'connexionBD.php'; // Fichier PHP contenant la connexion de la BDD
 
    // S'il y a une session alors on ne retourne plus sur cette page
    if (isset($_SESSION['id'])){
        header('Location: index.php');
         exit;
    }
 
    // Si la variable "$_Post" contient des informations alors on les traitres
    if(!empty($_POST)){
        extract($_POST);
        $valid = true;
 
        // On se place sur le bon formulaire grâce au "name" de la balise "input"
        if (isset($_POST['inscription'])){
            $nom  = htmlentities(trim($nom)); // On récupère le nom
            
            
            $mdp = trim($mdp); // On récupère le mot de passe 
            
 
            //  Vérification du nom
            if(empty($nom)){
                $valid = false;
                $er_nom = ("Le nom d' utilisateur ne peut pas être vide");
            }
            // Vérification du mot de passe
            if(empty($mdp)) {
                $valid = false;
                $er_mdp = "Le mot de passe ne peut pas être vide";
 
            }
 
            // Si toutes les conditions sont remplies alors on fait le traitement
            if($valid){
 
                $mdp = crypt($mdp, "$6$rounds=5000$macleapersonnaliseretagardersecret$");
                $date_creation_compte = date('Y-m-d H:i:s');
 
                // On insert nos données dans la table utilisateur
                 $DB->insert("INSERT INTO utilisateur (nom, mdp, date_creation_compte) VALUES
                    (?, ?, ?)",
                    array($nom, $mdp, $date_creation_compte));
 
                header('Location: index.php');
                exit;
            }
        }
    }
?>