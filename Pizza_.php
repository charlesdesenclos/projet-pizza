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
}




?>
