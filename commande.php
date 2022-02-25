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
            <!--conexion-->
                <form action="verification_commande.php" method="POST" >
                    <h1>Commande</h1>
                    <label><b>Pizza :</b></label> 
                    <select name="id_pizza" id="select-pizza">
                        <option value="">Choisisez votre pizza</option>
                        <option value="1">Bacon Pizza  10€</option>
                        <option value="2">Bellacho Pizza 10€</option>
                        <option value="3">Chorriza Pizza 10€</option>
                        <option value="4">Diavola Pizza 10€</option>
                    </select>

                    <label><b>Saisissez votre adresse :</b></label>
                    <input type="adresse" placeholder="Entrez une adresse valide" name="adresse" required>

                    <label><b>Saisissez vos coordonnée bancaire :</b></label>
                    <input type="bancaire" placeholder="Entrez des coordonnée bancaire valide" name="bancaire" required>

                    <input type="submit" id="submit" value="Commander">

                    
                    
                </form>
            
        </div>

</body>
</html>