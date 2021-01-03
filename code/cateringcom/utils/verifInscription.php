<?php

namespace utils;

//Pour tester les erreurs
ini_set('display_errors', 'on');


use app\controller\controllerClient;
use app\entity\client;

function __autoload($classe)
{
    $classe = str_replace('\\', '/', $classe);
    require("../" . $classe . '.php');
}

spl_autoload_register('utils\__autoload'); //Autoload


$client = new controllerClient();
//test si on passe bien par notre formulaire
if (isset($_POST["ins"])) {
    //on vérifie que tous les champs soient bien rempli
    if (!empty($_POST["inscription"]["nom"]) && !empty($_POST["inscription"]["prenom"]) && !empty($_POST["inscription"]["email"]) && !empty($_POST["inscription"]["mtp"]) && !empty($_POST["inscription"]["mtpConf"])) {

        // on récupére les données passé avec htmlspecialchars pour la sécuritée
        $nom = htmlspecialchars($_POST["inscription"]["nom"]);
        $prenom = htmlspecialchars($_POST["inscription"]["prenom"]);
        $mail = htmlspecialchars($_POST["inscription"]["email"]);
        $mtp = htmlspecialchars($_POST["inscription"]["mtp"]);
        $mtpConf = htmlspecialchars($_POST["inscription"]["mtpConf"]);

        //on vérifie que le mot de passe soit bien tapé
        if (strcmp($mtp, $mtpConf) == 0) {
            if ($client->ajouter($nom, $prenom, $mail, $mtp) != NULL){
                var_dump("ok");
                header('location:../connexion.php');
            }

        } else {
            //Si le mot de passe n'est pas le même que la confirmation
            header("location:../inscription.php?mtpEchec=" . true);
        }
    } else {
        header("location:../inscription.php?champVide=" . true);
    }
} else {
    header('location:../inscription.php');
}


?>