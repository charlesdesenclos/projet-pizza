<?php
class Pizzas{
    private $id_;
    private $pizza_;
    private $prix_;

    public function __construct($Newid, $Newpizza, $Newprix)
    {
        $this -> id_ = $Newid;
        $this -> pizza_ = $Newpizza;
        $this -> prix_ = $Newprix;

    }

  
    public function requet()
    {
        require_once 'config.php';

        $sql = 'SELECT Pizza.pizza AS nompizza, Pizza.prix AS nomprix, utilisateurs.pseudo AS nom, panier.id_utilisateurs AS id FROM panier,Pizza,utilisateurs WHERE Pizza.id = panier.id_pizza AND utilisateurs.id = panier.id_utilisateurs ORDER BY panier.id DESC';
        $RequetStatement = $bdd->query($sql);
    }
    public function affiche()
    {
        echo"<h2 clas='espace2'>Voici la liste des commandes :</h2>";
        while($tab = $RequetStatement->fetch())
        {
            if($tab['id'] == $data['id'])
            {
                echo"<tr><td>{$tab['nompizza']}</td><td>{$tab['nomprix']} € </td><td>{$tab['nom']}</td></tr>\n";
            } 
        }
    }
}
?>