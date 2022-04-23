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
                <?php
                    if($data['pseudo'])
                    {?>
                        <a href="commande.php"><li>Commander</li></a><?php
                        // mène à la page commande
                    }
                    else
                    {?>
                        <a href="connexion2.php"><li>Commander</li></a><?php
                    }
                ?>
                <a href="connexion.php"><li>Se Connecter</li></a>
                <!-- mène à la page de conexion-->
                <li>Vous êtes connecter en tant que : <?php echo $data['pseudo']; ?></li>
                <!-- affiche l'utilisateur si il est connecter-->
                <?php 
                    if($data['pseudo']) //affiche déconnexion et la liste des commandes quand l'utilisateur est connecté
                     {?>
                        <li><a href="deconnexion.php">Déconnexion</a></li>
                        <li><a href="liste_commande.php">Liste des commandes</a></li><?php
                    }
                ?>
            </nav>
        </header>
    </nav>
    <div class="container">
        <div class="liste_commande">
            <h1>Modifier une commande</h1>
            <?php
            
            $sql = 'SELECT Pizza.pizza AS nompizza, Pizza.prix AS nomprix, utilisateurs.pseudo AS nom, panier.id_utilisateurs AS id FROM panier,Pizza,utilisateurs WHERE Pizza.id = panier.id_pizza AND utilisateurs.id = panier.id_utilisateurs ORDER BY panier.id DESC';
            $RequetStatement = $bdd->query($sql);
            $n = 1;
            
            while($tab = $RequetStatement->fetch()){    
                if($tab['id'] == $data['id'])
                {
                    echo "Commande numéro ";echo $n;echo ":";
                    ?>
                    <select>
                        
                        <option value="<?php $tab["id"];?>"><?php echo $tab["nompizza"];?></option>
                        
                    </select>
                    <label><b>Choisissez une nouvelle Pizza :</b></label> 
                <select name="id_pizza" id="select-pizza">
                    <option value="">Choisisez votre pizza</option>
                    <option value="1">Bacon Pizza  10€</option>
                    <option value="2">Bellacho Pizza 10€</option>
                    <option value="3">Chorriza Pizza 10€</option>
                    <option value="4">Diavola Pizza 10€</option>
                </select>

                    <input type="submit" name="submit" value="Modifier la commande numéro  <?php echo $n;?>">
                <?php
                $n = $n +1;
                }
                
            }
            ?>
            
                
                    
                <?php

            if(isset($_POST['id_pizza']) && isset($data['id']))
            {
                $id_pizza = htmlspecialchars($_POST['id_pizza']);
                $data = htmlspecialchars($data['id']);

    
    
                if(strlen($id_pizza) <= 11)
                { // On verifie que la longueur de id_pizza <= 11
                    $insert = $bdd->prepare('UPDATE)');
                    $insert->execute(array(
                    'id_pizza' => $id_pizza,
                    'id' => $data
                ));
                // On redirige avec le message de succès
                header('Location:commande_rep.php?reg_err=success');
                die();
                }else{ header('Location: commande.php?reg_err=id_pizza'); die();}
      
            }
        ?>
           
            
                
            
        </div>
    </div>
</body>
</html>