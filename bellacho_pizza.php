<!DOCTYPE html>
<html lang="fr">
    <head>
    <title>Bellacho Pizza</title>
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
    
    <center><img src="images/bellacho_pizza.png" alt="bellacho_pizza" height="450px"></center>
    

    <div class="page">
    <h1 role="heading" itemprop="name" class="espace"><mark>
        Bellacho Pizza
        </mark></h1>
    <hr>
        <div >
            <h2 class="espace"><mark>Les ingrédients : Sauce tomate, mozarella, chrorizo, merguez, duo de poivrons.</mark></h2>

            <h2 class="espace"><mark>Informations consommateurs : Tous nos produits sont bio ainsi que produits en France.</mark></h2>

            
        </div>
    </div>
    
    <?php 
        if($data['pseudo']) //affiche la page commande si on est connecté sinon cela nous permet de nous connecter pour commander
        {?>
            <center><a href="commande.php"><input class="button" type="button" value="Commander"></a></center><?php
        }
        else
        {?>
            <center><a href="connexion2.php"><input class="button" type="button" value="Commander"></a></center><?php
        }
    ?>
    
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
    
</body >
</html>