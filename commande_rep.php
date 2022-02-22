<!DOCTYPE html>
<html>
    <head>
    <title>Commande</title>
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
        <div id="container">
            <!--conexion-->
                <form action="verification.php" method="POST">
                    <h1>Commande</h1>
                    <label><b>Votre pizza a bien été commander</b></label> 
                    <?php
                        $prix=rand(1, 10);
                         echo ( "Le prix est de " $prix "euros" );
                        
                    ?>
                    <label><b>Votre pizza arrivera dans :</b></label>
                    <?php
                        $temps=rand(1, 2)
                         echo ("Le temps estimé pour la livraison est de " $temps "heures");
                        
                    ?>
                </form>
            
        </div>

    </body>
</html>