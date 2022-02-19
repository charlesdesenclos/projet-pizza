<?php
session_start();
include('bd/connexionDB.php'); // Fichier PHP contenant la connexion à votre BDD
 
    // S'il y a une session alors on ne retourne plus sur cette page
    if (isset($_SESSION['id'])){
        header('Location: index.php');
         exit;
    }
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM utilisateur where 
              nom_utilisateur = '".$username."' and mot_de_passe = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $username;
           header('Location: commande.php');
        }
        else
        {
           header('Location: conexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: conexion.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: conexion.php');
}
mysqli_close($db); // fermer la connexion
?>