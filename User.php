<?php
class User
{
    private $pseudo_;
    private $email_;
    private $password_;
    private $adresse_;
    private $bancaire_;

    public function __construct($NewPseudo, $NewEmail, $NewPassword)
    {
        $this -> pseudo_ = $NewPseudo;
        $this-> email_ = $NewEmail;
        $this -> password = $NewPassword;
    }

    public function getEmail()
    {
        return $this-> email_;
    }


}
?>