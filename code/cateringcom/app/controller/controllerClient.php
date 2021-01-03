<?php

namespace app\controller;

use app\entity\client;
use app\model\clientModel;

class controllerClient
{

    private $model;

    /**
     * controllerAdmin constructor.
     * @param $model
     */
    public function __construct()
    {
        $this->model = new clientModel();
    }

    //ajouter un nouveau client
    public function ajouter($nom, $prenom, $email, $mtp)
    {
        return $this->model->insertNewClient($nom, $prenom, $email, $mtp);
    }

    //On test la connexion d'un client en regardant par son mail s'il existe
    //Puis on compare les mots de passe pour certifier la connexion
    public function connexion($mail, $mtp)
    {
        $arrayClient = $this->model->connexion($mail, "client");
        $client = new client($arrayClient);
        if (password_verify($mtp, $client->getMtp()))
            return $client;
        return false;


    }

}
