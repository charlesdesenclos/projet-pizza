<?php
    class commande{
        private $id_;
        private $pizza_;
        private $utilisateurs_;

        public function __construct($Newid, $Newpizza, $Newutilisateurs)
        {
            $this -> id_ = $Newid;
            $this -> pizza_ = $Newpizza;
            $this -> utilisateurs_ = $Newutilisateurs;
        }
    }




?>