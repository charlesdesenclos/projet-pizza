<!DOCTYPE html>
<html>
    <head>
    <title>Connexion</title>
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
                    <h1>Connexion</h1>
                    <label><b>Nom d'utilisateur</b></label> 
                    <input type="text" placeholder="Entrez le nom d'utilisateur" name="username" required>

                    <label><b>Mot de passe</b></label>
                    <input type="password" placeholder="Entrez un mot de passe" name="password" required>

                    <input type="submit" id="submit" value="Conexion">

                    <a href="inscription.php">Vous n'avez pas de compte ? Inscrivez vous en cliquant ICI !</a>
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