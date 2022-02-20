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
        <ul>
            <li><a class="nav-color" href="index.php">Accueil</a>
                <!-- mène à l'accueil / la class nav-color permet de mettre le texte en blanc-->
            </li>
            <li>
                <a class="nav-color" href="pizza.php">Pizza</a>
                <!-- mène à la page des pizza-->
            </li>
            <li>
                <a class="nav-color" href="contact.html">Commande</a>
                <!-- mène à la page A propos-->
            </li>
            <li>
                <a class="nav-color" href="conexion.php">Connexion</a>
                <!-- mène à la page de conexion-->
            </li>
            
            
            
        </ul>
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