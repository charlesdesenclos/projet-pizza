<?php

class Pizza{
    
    private $id_;
    private $pizza_;
    private $prix_;
    private $pdo_;


    public function __construct($Newid, $Newpizza, $Newprix, $Newpdo)
    {
        require_once 'config.php';
        $this -> id_ = $Newid;
        $this -> pizza_ = $Newpizza;
        $this -> prix_ = $Newprix;
        $this -> pdo_ = $Newpdo;

        $this -> Newpdo = $bdd;
    }

    public function getId()
    {
        return $this -> id_;
    }

    public function getPizza()
    {
        return $this -> pizza_;
    }
    public function getPrix()
    {
        return $this -> prix_;
    }

    public function getPizzabyid($id)
    {
        $sql = " SELECT * FROM Pizza WHERE '".$id."'";
        $reponses = $this ->Newpdo -> query($sql);
        $donnees = $reponses->Newpdo;
    }

    public function getAllPizza()
    {
        $sql = "SELECT * FROM Pizza";
        $reponses = $this -> pdo_ -> query($sql);
        $TableauPizza = array();
        while ($donnees  = $reponses->fetch())
        {
            $Pizza = new Pizza ($donnees['id'], $donnees['pizza'], $donnees['prix'], $this -> pdo_);

            array_push($TableauPizza,$Pizza);
        }

        return $TableauPizza;
    }
}




?>
