<?php


namespace app\model;


class clientModel extends model
{

    public function __construct()
    {
        $this->table = "client";
        parent::__construct($this->table);
    }

    //un nouveau client  s'ajoute à notre bdd
    public function insertNewClient($nom, $prenom, $mail, $mtp)
    {
        //on vérifie si la personne n'est pas déjà présent
        if (!$this->dejaPresent('mail', $mail)) {
            //tout d'abord on hash le mot de passe pour le sécuriser
            $mtp = password_hash($mtp, PASSWORD_DEFAULT);
            //enfin on prépare notre requete
            $sql = "INSERT INTO client(nom, prenom, mail, mtp) VALUES ('$nom','$prenom','$mail','$mtp')";
            //On envoit notre requête dans notre bdd

            if ($this->requete($sql)) {
                return true;
            } else {
               header("location:../inscription.php?erreur=" . true);
            }
        } else {
            //Si la personne est déjà enregistré pas besoin de l'enregistrer à nouveau
             header("location:../inscription.php?mail=" . true);
        }
    }


}