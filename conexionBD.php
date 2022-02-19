<?php
    class conexionBD{
        private $host = 'localhost';
        private $name ='desenclos';
        private $user ='desenclos_pizza';
        private $pass = 'sqK8ZUWxuvEpp!y';
        private $connexion;
        $db_username = 'desenclos';
    

        function__construct($host = null, $name = null, $user = null, $pass = null){
            if($host !=null){
                $this->host = $host;
                $this->name = $name;
                $this->user = $user;
                $this->pass = $pass;
            }
            try{
                $this->connexion = new PDO('mysql;host=' . $this->host . ';dbname=' . $this->name,$this->user,$this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
            }catch(PDOException $e){
                echo 'Erreur : Impossible de se connecter à la BDD ';
                die();
            }
        }
    }

    $DB = new connexionBD();