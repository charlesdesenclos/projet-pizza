<!DOCTYPE html>
<html lang="fr">
<?
include ("function.php");
headindex()
?>
<body>
    <?php
        session_start();
        require_once 'config.php'; // ajout connexion bdd 

        $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
        $req->execute(array($_SESSION['user']));
        $data = $req->fetch();
        ?>
        <header class="header">
            <img src="/images/Logo.png" alt="Logo Pizzeria">
            <nav class="nav">
                <a href="index.php"><li>Accueil</li></a>
                <!-- mène à l'accueil -->
                <a href="pizza.php"><li> Nos Pizzas</li></a>
                <!-- mène à la page des pizzas-->
                <?php
                    if($data['pseudo'])
                    {?>
                        <a href="commande.php"><li>Commander</li></a><?php
                        // mène à la page commande
                    }
                    else
                    {?>
                        <a href="connexion2.php"><li>Commander</li></a><?php
                    }
                ?>
                <a href="connexion.php"><li>Se Connecter</li></a>
                <!-- mène à la page de conexion-->
                <li>Vous êtes connecter en tant que : <?php echo $data['pseudo']; ?></li>
                <!-- affiche l'utilisateur si il est connecter-->
                <?php 
                    if($data['pseudo']) //affiche déconnexion et la liste des commandes quand l'utilisateur est connecté
                     {?>
                        <li><a href="deconnexion.php">Déconnexion</a></li>
                        <li><a href="liste_commande.php">Liste des commandes</a></li>
                        <li><a href="modification_pizza.php">Modifier votre commande</a></li>
                        <li><a href="suppresion_pizza.php">Supprimer votre commande</a></li><?php
                    }
                ?>
            </nav>
        </header>
            <div class="landing-page">
        <div align="center">
            <h1 class="big-title"><mark>Bienvenue sur notre site de commande en ligne !</mark></h1>
            <img src="../images/Chef.png"/></a>
            <a href="../pizza.php"><img src="../images/PassezCommande.png"/></a>
        </div>
            </div>
</body>

</html>