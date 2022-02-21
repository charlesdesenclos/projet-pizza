<!DOCTYPE html>
<html>
    <head>
    <title>Bacon Groovy Pizza</title>
    <link rel="icon" type="image/png" sizes="16x16" href="images/icone_pizza.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">

    </head>

    <body>
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
    
        <center><img src="images/bacon_pizza.jpg" alt="bacon_pizza" height="450px"></center>
    

    <div class="page">
    <h1 role="heading" itemprop="name" class="espace"> 
        Bacon Groovy Pizza
    </h1>
    <hr>
        <div >
            <h2 class="espace"> Les ingrédients :</h2>

            Crème fraîche légère, mozzarella, poulet rôti, oignons, bacon, sauce barbecue.

            <h2 class="espace"> Informations consommateurs </h2>

            Tous nos produits sont bio ainsi que produits en France.

            
        </div>
    </div>
    
        <center><a href="commande.php"><input class="button" type="button" value="Commander"></a></center>
    
    
    </body >
</html>