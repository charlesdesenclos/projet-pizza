<?php

class User
{
    private $pseudo_;
    private $email_;
    private $password_;
    private $adresse_;
    private $bancaire_;

    public function __construct($NewPseudo, $NewEmail, $NewPassword)
    {
        $this -> pseudo_ = $NewPseudo;
        $this-> email_ = $NewEmail;
        $this -> password = $NewPassword;
    }

    public function getPseudo()
    {
        return $this-> pseudo_;
    }

    public function getEmail()
    {
        return $this-> email_;
    }
    public function inscription($pseudo,$email,$password,$password_retype,$adresse,$bancaire)
    {
        require_once 'config.php';

        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $bancaire = htmlspecialchars($_POST['bancaire']);

        // On vérifie si l'utilisateur existe
        $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour avoir deux compte différents 
        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($row == 0){ 
            if(strlen($pseudo) <= 100){ // On verifie que la longueur du pseudo <= 100
                if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                        if($password === $password_retype){ // si les deux mdp saisis sont bon

                            // On hash le mot de passe avec Bcrypt, via un coût de 12
                            $cost = ['cost' => 12];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);
                            
                            // On stock l'adresse IP
                            $ip = $_SERVER['REMOTE_ADDR']; 

                            // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, password,adresse, bancaire, ip, token) VALUES(:pseudo, :email, :password, :adresse, :bancaire, :ip, :token)');
                            $insert->execute(array(
                                'pseudo' => $pseudo,
                                'email' => $email,
                                'password' => $password,
                                'adresse' => $adresse,
                                'bancaire' => $bancaire,
                                'ip' => $ip,
                                'token' => bin2hex(openssl_random_pseudo_bytes(64))
                            ));
                            // On redirige avec le message de succès
                            header('Location:connexion.php?reg_err=success');
                            die();
                        }else{ header('Location: inscription.php?reg_err=password'); die();}
                    }else{ header('Location: inscription.php?reg_err=email'); die();}
                }else{ header('Location: inscription.php?reg_err=email_length'); die();}
            }else{ header('Location: inscription.php?reg_err=pseudo_length'); die();}
        }else{ header('Location: inscription.php?reg_err=already'); die();}
    }

    public function connection($email, $password)
    {
        require_once 'config.php';
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        
        $email = strtolower($email); // email transformé en minuscule
        
        // On regarde si l'utilisateur est inscrit dans la table utilisateurs
        $check = $bdd->prepare('SELECT pseudo, email, password, token FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        

        // Si > à 0 alors l'utilisateur existe
        if($row > 0)
        {
            // Si le mail est bon niveau format
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // Si le mot de passe est le bon
                if(password_verify($password, $data['password']))
                {
                        // On créer la session et on redirige sur commande.php
                    $_SESSION['user'] = $data['token'];
                    header('Location: commande.php');
                    die();
                    }else{ header('Location: connexion2.php?login_err=password'); die(); }
                }else{ header('Location: connexion2.php?login_err=email'); die(); }
            }else{ header('Location: connexion2.php?login_err=already'); die(); }
        

    }
    public function affiche()
    {
        
    }


}
?>