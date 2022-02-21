<!DOCTYPE html>
<html>
    <head>
    <title>Inscription</title>
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
                <a href="pizza.php"><li> Nos Pizza</li></a>
                <!-- mène à la page des pizza-->
                <a href="commande.php"><li>Commander</li></a>
                <!-- mène à la page commande-->
                <a href="connexion.php"><li>Se Connecter</li></a>
                <!-- mène à la page de conexion-->
            </nav>
        </header>
    </nav>
    <div id="container">
            <!--conexion-->
                <form action="verification_inscription.php" method="POST">
                    <h1>Inscription</h1>
                    <label><b>Nom d'utilisateur</b></label> 
                    <input type="text" placeholder="Entrez un nom d'utilisateur" name="username" required>

                    <label><b>Mot de passe</b></label>
                    <input type="password" placeholder="Entrez un mot de passe" name="password" required>

                    <a href="connexion.php"><input type="submit" id="submit" value="Inscription"></a>

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