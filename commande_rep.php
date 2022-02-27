<!DOCTYPE html>
<html lang="fr">
    <head>
    <title>Commande</title>
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
            </nav>
        </header>
    </nav>
        <div id="container">
            <!--commande résultat-->
                <form action="deconnexion.php" method="POST">
                    <h1>Commande</h1>
                    <label><b>Votre pizza a bien été commander</b></label> 
                    <?php
                        $prix=rand(10, 10);
                         echo ( "Le prix est de $prix euros." );
                        
                    ?>
                    <label><b>Votre pizza arrivera dans :</b></label>
                    <?php
                        $temps=rand(10, 15);
                         echo ("Le temps estimé pour la livraison est de $temps minutes.");
                        
                    ?>
                    <a href="index.php"><input type="button" id="button" value="Retour au menu"></a>
                    <a href="liste_commande.php"><input type="button" id="button" value="Liste des commandes"></a>
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