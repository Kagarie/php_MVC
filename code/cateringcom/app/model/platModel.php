<?php

namespace app\model;

use app\entity\plat;


class platModel extends model
{
    public function __construct()
    {
        $this->table = "plat";
        parent::__construct($this->table);
    }

    // fonction pour récupérer toute notre table
    public function findAll()
    {
        $arrayPlat = $this->find('typePlat');
        $tab = array();
        foreach ($arrayPlat as $plat)
            $tab[] = new plat($plat);
        return $tab;
    }
    //on supprime le plat par son nom car dans notre bdd
    // il ne peut y avoir deux fois le même non de plat
    // on supprime aussi l'image qu'il lui est associé dans le dossier "mesImages/"
    public function supprimerPlat($nomPlat): bool
    {
        $arrayPlat = $this->requete("SELECT * FROM $this->table WHERE nomPlat = '$nomPlat'");
        $plat = new plat($arrayPlat[0]);
        unlink("../" . $plat->getPathImage());
        return $this->execute("DELETE FROM plat WHERE nomPlat = '$nomPlat'");
    }

    //fonction pour récupérer un élément de notre table
    public function panier()
    {
        $arrayPlat = $this->unPanier();
        $tab = array();
        foreach ($arrayPlat as $plat)
            $tab[] = new plat($plat);
        return $tab;
    }
}