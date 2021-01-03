<?php
//On supprime un admin par son mail et son mot de passe
namespace utils;

//Pour tester les erreurs
ini_set('display_errors', 'on');


use app\controller\controllerAdmin;

function __autoload($classe)
{
    $classe = str_replace('\\', '/', $classe);
    require("../" . $classe . '.php');
}

spl_autoload_register('utils\__autoload'); //Autoload

$admin  = new controllerAdmin();

if (isset($_POST["adminSupprimer"]) ) {
    if(!empty($_POST["admin"]["mail"]) && !empty($_POST["admin"]["mtp"])){
        $mail = htmlspecialchars($_POST["admin"]["mail"]);
        $mtp = htmlspecialchars($_POST["admin"]["mtp"]);
        $res = $admin->supprimerAdmin($mail , $mtp);
        header("location:../admin.php?supprimerAdmin=".$res);

    } else {
        header("location:../admin.php?supprimerAdmin=".true);
    }

} else {
    //par sécuriter on le renvoit sur l'index
    header('location: ../index.php');
}
