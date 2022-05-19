<?php 
    $tab = array();
    $tab [0] = "Offre  execptionnelle de ".rand(5,30)."%";
    echo json_encode($tab);
    $temps = array();
    $temps [0] = "Le temps de livraison est de ".rand(8,20)."min";
    echo json_encode($temps);
    
?>