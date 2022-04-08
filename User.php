<?php
class User
{
    private $pseudo_;
    private $email_;
    private $password_;
    private $adresse_;
    private $bancaire_;

    public function __construct()
    {

    }

    public function getEmail()
    {
        return $this-> email_;
    }


}
?>