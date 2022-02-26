<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
    <title>Connexion</title>
    <link rel="icon" type="image/png" sizes="16x16" href="images/icone_pizza.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">

    </head>

<body>
    <?php
        session_start();
        require_once 'config.php'; // ajout connexion bdd 

        $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
        $req->execute(array($_SESSION['user']));
        $data = $req->fetch();
    ?>
    <nav>
        <!-- nav permet de mettre un ensemble de lien de navigation-->
        <header class="header">
            <img src="/images/Logo.png" alt="Logo Pizzeria">
            <nav class="nav">
                <a href="index.php"><li>Accueil</li></a>
                <!-- mène à l'accueil -->
                <a href="pizza.php"><li> Nos Pizzas</li></a>
                <!-- mène à la page des pizzas-->
                <a href="commande.php"><li>Commander</li></a>
                <!-- mène à la page commande-->
                <a href="connexion.php"><li>Se Connecter</li></a>
                <!-- mène à la page de conexion-->
            </nav>
        </header>
    </nav>
        <div id="container">
            <!--connexion-->
            <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?>
                <form action="verification_connexion2.php" method="POST"> 
                    <h1>Connexion</h1>
                    <label><b>Email :</b></label> 
                    <input type="text" placeholder="Entrez votre email" name="email" required>

                    <label><b>Mot de passe</b></label>
                    <input type="password" placeholder="Entrez un mot de passe" name="password" required>

                    <input type="submit" id="submit" value="Connexion">
                    

                    <a href="inscription.php">Vous n'avez pas de compte ? Inscrivez vous en cliquant ICI !</a>
                    <?php
                    if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                        if($err==1 || $err==2) {
                            echo "<p style = 'color:red'>Utilisateur ou mot de passe incorrect</p>";
                        }
                    }
                    ?>
                </form>
            
        </div>


    <footer class="footer">
        <img src="/images/Logo.png" alt="Logo Pizzeria">
        <nav class="nav">
            <li>Vous êtes connecter en tant que : <?php echo $data['pseudo']; ?></li>
            <!-- affiche l'utilisateur si il est connecter-->
            <?php 
                if($data['pseudo']) //affiche déconnexion et la liste des commandes quand l'utilisateur est connecté
                    {?>
                    <li><a href="deconnexion.php">Déconexion</a></li>
                    <li><a href="liste_commande.php">Liste des commandes</a></li><?php
                }
            ?>  
        </nav>
    </footer>
</body>
</html>