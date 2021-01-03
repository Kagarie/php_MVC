<?php

namespace app\entity;

use app\traits\hydrate;

class client
{
    private $nom;
    private $prenom;
    private $mail;
    private $mtp;

    use hydrate;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @param mixed $mtp
     */
    public function setMtp($mtp): void
    {
        $this->mtp = $mtp;
    }

    /**
     * @return mixed
     */
    public function getMtp()
    {
        return $this->mtp;
    }


}