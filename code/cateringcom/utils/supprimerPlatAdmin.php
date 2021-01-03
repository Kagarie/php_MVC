<?php

namespace utils;

//Pour tester les erreurs
ini_set('display_errors', 'on');


use app\controller\controllerPlat;

function __autoload($classe)
{
    $classe = str_replace('\\', '/', $classe);
    require("../" . $classe . '.php');
}

spl_autoload_register('utils\__autoload'); //Autoload

$plat = new controllerPlat();

if (isset($_POST["platSupprimer"])) {
    if (!empty($_POST["nomPlat"])) {
        $nomPlat = htmlspecialchars($_POST["nomPlat"]);
        $res = $plat->supprimerPlat($nomPlat);
        header("location:../admin.php?supprimerPlat=" . $res);
    } else {
        header("location:../admin.php?supprimerChamp=" . true);
    }


} else {
    //par sécuriter on le renvoit sur l'index
    header('location: ../index.php');
}
