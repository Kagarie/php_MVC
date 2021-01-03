<?php

namespace app\model;

use app\entity\admin;
use app\entity\plat;


class adminModel extends model
{
    public function __construct()
    {
        $this->table = "admin";
        parent::__construct($this->table);
    }

    // fonction pour récupérer toute notre table
    public function findAll()
    {
        $arrayAdmin = $this->find('nom');
        $tab = array();
        foreach ($arrayAdmin as $admin)
            $tab[] = new admin($admin);
        return $tab;
    }

    //retourne un tableau contenant des objet plats
    public function voirPlat()
    {
        return $this->findTable("plat", "typePlat");
    }

    //fonction pour ajouter un admin seule un admin peut en ajouoter un autre
    public function ajouterAdmin($nom, $prenom, $mail, $mtp): bool
    {
        //on regarde s'il n'est pas déjà présent dans la bdd
        if (!$this->dejaPresent("mail", $mail)) {
            $mtp = password_hash($mtp, PASSWORD_DEFAULT);
            $sql = "INSERT INTO $this->table (nom, prenom, mail, mtp) VALUES ('$nom','$prenom','$mail','$mtp')";
            return $this->execute($sql);
        }
        return false;
    }

    //fonction pour ajouter un admin seule un admin peut en ajouoter un autre
    public function ajouterPlat($nomPlat, $typePlat, $prix, $pathImage): bool
    {
        //on regarde s'il n'est pas déjà présent dans la bdd
        if (!$this->dejaPresentTable("plat", "nomPlat", $nomPlat)) {
            $sql = "INSERT INTO plat (nomPlat, typePlat, prix, pathImage) VALUES ( '$nomPlat','$typePlat','$prix','$pathImage')";
            return $this->execute($sql);
        }
        return false;
    }

    // on supprime un admin par son mail car le mail est unique
    public function supprimerAdmin($mail, $mtp): bool
    {
        $arrayAdmin = $this->requete("SELECT * FROM $this->table WHERE mail = '$mail'");
        var_dump($arrayAdmin);
        $admin = new admin($arrayAdmin[0]);
        if (password_verify($mtp, $admin->getMtp()))
            return $this->execute("DELETE FROM $this->table WHERE mail = '$mail'");
        return false;
    }

}