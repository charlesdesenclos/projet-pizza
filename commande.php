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
                <form >
                    <h1>Commande</h1>
                    <label><b>Pizza :</b></label> 
                    <select name="pizza" id="select-pizza">
                        <option value="">Choisisez votre pizza</option>
                        <option value="bacon_pizza">Bacon Pizza  10€</option>
                        <option value="bellacho_pizza">Bellacho Pizza 10€</option>
                        <option value="chorriza_pizza">Chorriza Pizza 10€</option>
                        <option value="diavola_pizza">Diavola Pizza 10€</option>
                    </select>

                    <label><b>Saisissez votre adresse :</b></label>
                    <input type="adresse" placeholder="Entrez une adresse valide" name="adresse" required>

                    <label><b>Saisissez vos coordonnée bancaire :</b></label>
                    <input type="bancaire" placeholder="Entrez des coordonnée bancaire valide" name="bancaire" required>

                    <a href="commande_rep.php"><input type="button" id="button" value="Commander"></a>

                    
                    
                </form>
            
        </div>

    </body>
</html>