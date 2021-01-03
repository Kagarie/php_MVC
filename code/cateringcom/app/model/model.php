<?php

namespace app\model;


use app\config\database;

class model
{
    //point de connexion
    private $connexion;
    protected $table;

    /**
     * model constructor.
     * @param $connexion
     * @param $table
     */
    //notre constructeur fait la connexion avec notre bdd
    protected function __construct($table)
    {
        $db = new database();
        $this->connexion = $db->getConnection();
    }

    //petite fonction pour savoir si un élèment est déjà présent dans
    protected function dejaPresent(string $champ, $data): bool
    {
        $requete = "SELECT * FROM $this->table WHERE $champ='$data'";
        $res = $this->connexion->query($requete);
        //on compte le nombre de ligne du retour de notre requete
        if ($res->rowCount() == 0)
            return false;
        // si la requete et vide le mail n'est pas présent et donc on peut l'ajouter
        return true;
    }

    //function pour récupérer toute notre table qui sera passé en héritage
    protected function find($order)
    {
        $sql = "SELECT * FROM $this->table ORDER BY $order";
        $resultat = $this->connexion->query($sql);
        return $resultat->fetchAll(\PDO::FETCH_OBJ);
    }

    //Passage d'une requête entière
    protected function requete(string $requete)
    {
        $resultat = $this->connexion->query($requete);
        return $resultat->fetchAll(\PDO::FETCH_OBJ);

    }

    //retourn le plat chercher
    protected function unPanier()
    {
        $res = array();
        foreach ($_SESSION['panier'] as $cle => $valeur) {
            foreach ($valeur as $key => $value) {
                if (strcmp($key, 'plat') == 0) {
                    $sql = "SELECT * FROM  $this->table  WHERE nomPlat=  '$value'";
                    $resultat = $this->connexion->query($sql);
                    array_push($res, $resultat->fetch(\PDO::FETCH_OBJ));
                }
            }
        }
        return $res;
    }

    //fonction pour se connecter au site
    public function connexion($mail, $table)
    {
        $sql = "SELECT nom,prenom,mail,mtp FROM $table WHERE mail='$mail'";
        $resultat = $this->connexion->query($sql);
        $resultat = $resultat->fetch(\PDO::FETCH_OBJ);

        return $resultat;
    }


    /*-------------------------------------------------------------------------------*/
    /*-------------------------------------------------------------------------------*/
    /*--------------------- METHODE RESERVER POUR LES ADMINS ------------------------*/
    /*-------------------------------------------------------------------------------*/
    /*-------------------------------------------------------------------------------*/

    //petite fonction pour savoir si un élèment est déjà présent dans
    protected
    function dejaPresentTable(string $table, string $champ, $data)
    {
        $requete = "SELECT * FROM $table WHERE $champ='$data'";
        $res = $this->connexion->query($requete);
        //on compte le nombre de ligne du retour de notre requete
        if ($res->rowCount() == 0)
            return false;
        // si la requete et vide le mail n'est pas présent et donc on peut l'ajouter
        return true;
    }


    protected
    function execute(string $requete): bool
    {
        return $this->connexion->exec($requete);
    }

    //function pour retoruner une table en particulier (seul la class admin l'utilise)
    protected
    function findTable(string $table, string $order)
    {
        $sql = "SELECT * FROM  $table order by '$order'";
        $resultat = $this->connexion->query($sql);
        return $resultat->fetchAll(\PDO::FETCH_OBJ);
    }

}

?>