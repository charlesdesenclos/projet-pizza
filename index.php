<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Accueil</title>
    <link rel="icon" type="image/png" sizes="16x16" href="images/icone_pizza.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
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
            <div class="landing-page">
        <div align="center">
            <h1 class="big-title"><mark>Bienvenue sur notre site de commande en ligne !</mark></h1>
            <img src="../images/Chef.png"/></a>
            <a href="../pizza.php"><img src="../images/PassezCommande.png"/></a>
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