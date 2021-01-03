<?php

namespace app\controller;

use app\entity\admin;

use app\model\adminModel;

class controllerAdmin
{
    private $model;

    /**
     * controllerAdmin constructor.
     * @param $model
     */
    public function __construct()
    {
        $this->model = new adminModel();
    }

    public function connexion($mail, $mtp)
    {
        $arrayAdmin = $this->model->connexion($mail, "admin");
        $admin = new admin($arrayAdmin);
        if (password_verify($mtp, $admin->getMtp())) {
            return $admin;
        }
        return false;
    }

    public function voirAdmin()
    {
        $data = $this->model->findAll();
        include("app/view/getAllAdmin.php");
    }

    public function ajouterAdmin($nom, $prenom, $mail, $mtp): bool
    {
        return $this->model->ajouterAdmin($nom, $prenom, $mail, $mtp);
    }

    public function supprimerAdmin($mail, $mtp): bool
    {
        return $this->model->supprimerAdmin($mail, $mtp);

    }

    public function ajouterPlat($nomPlat, $typePlat, $prix, $pathimage): bool
    {
        return $this->model->ajouterPlat($nomPlat, $typePlat, $prix, $pathimage);
    }


}
