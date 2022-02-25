<?php 
    require_once 'config.php'; // On inclue la connexion à la bdd

    // Si les variables existent et qu'elles ne sont pas vides
    if(isset($_POST['pizza']) && !empty($_POST['adresse']) && !empty($_POST['bancaire']))
    {
        $pizza = htmlspecialchars($_POST['pizza']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $bancaire = htmlspecialchars($_POST['bancaire']);