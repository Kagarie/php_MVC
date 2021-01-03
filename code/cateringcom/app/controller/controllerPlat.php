<?php

namespace app\controller;

use app\model\platModel;

class controllerPlat
{
    //Important ne pas oublier
    private $model;

    /**
     * controllerVille constructor.
     * @param $model
     */
    public function __construct()
    {
        $this->model = new platModel();
    }

    public function getCatalogue()
    {
        $data = $this->model->findAll();
        include("app/view/platsCatalogue.php");
    }

    public function getCatalogueAdmin()
    {
        $data = $this->model->findAll();
        include("app/view/getAllPlat.php");
    }

    public function supprimerPlat($nomPlat): bool
    {
        return $this->model->supprimerPlat($nomPlat);
    }

    public function voirPanier()
    {
        $data = $this->model->panier();
        include("app/view/contenuPanier.php");
    }
}