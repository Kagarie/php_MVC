<?php

namespace app\entity;

use app\traits\hydrate;

class plat
{
    private $nomPlat;
    private $typePlat;
    private $prix;
    private $pathImage;

    use hydrate;

    /**
     * @return mixed
     */
    public function getNomPlat()
    {
        return $this->nomPlat;
    }

    /**
     * @param mixed $nomPlat
     */
    public function setNomPlat($nomPlat): void
    {
        $this->nomPlat = $nomPlat;
    }

    /**
     * @return mixed
     */
    public function getTypePlat()
    {
        return $this->typePlat;
    }

    /**
     * @param mixed $typePlat
     */
    public function setTypePlat($typePlat): void
    {
        $this->typePlat = $typePlat;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix): void
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getPathImage()
    {
        return $this->pathImage;
    }

    /**
     * @param mixed $pathImage
     */
    public function setPathImage($pathImage): void
    {
        $this->pathImage = $pathImage;
    }

    public function __toString()
    {
        return $this->nomPlat." ". $this->typePlat." ". $this->prix." ".$this->pathImage;
    }


}