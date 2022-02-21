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
                    <label><b>Pizza :</b></label> 
                    <select name="pizza" id="select-pizza">
                        <option value=""> Choisisez votre pizza</option>
                        <option value="bacon_pizza">Bacon Pizza</option>
                        <option value="bellacho_pizza">Bellacho Pizza</option>
                        <option value="chorriza_pizza">Chorriza Pizza</option>
                        <option value="cannibale_pizza">Cannibale Pizza</option>
                        <option value="deluxe_pizza">Deluxe Pizza</option>
                        <option value="diavola_pizza">Diavola Pizza</option>
                        <option value="forestiere_pizza">Forestière Pizza</option>
                        <option value="fromage_pizza">Fromage Pizza</option>
                        <option value="gamberetti_pizza">Gamberetti Pizza</option>
                        <option value="raclette_pizza">Raclette Pizza</option>
                    </select>

                    <label><b>Saisissez votre adresse :</b></label>
                    <input type="adresse" placeholder="Entrez une adresse valide" name="adresse" required>

                    <label><b>Saisissez vos coordonnée bancaire :</b></label>
                    <input type="bancaire" placeholder="Entrez des coordonnée bancaire valide" name="bancaire" required>

                    <input type="submit" id="submit" value="Commander">

                    
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

    </body>
</html>