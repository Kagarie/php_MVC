<?php
namespace app\traits;
trait hydrate{

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    /*
  fonction pour hydrater notre constructeur
  il faut que tous les setteurs soit déclaré et que la $cle pour hydrater
  corresponde au champs de notre table dans la bdd
  */
    public function hydrate($donnes)
    {
        foreach ($donnes as $cle => $valeur) {
            $method = 'set' . ucfirst($cle);
            if (method_exists($this, $method)) {
                $this->$method($valeur);
            }
        }
    }
}