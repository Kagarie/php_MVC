<?php
//Ici on ajoute un admin

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

$admin = new controllerAdmin();


if (isset($_POST["adminAjouter"])) {
    if (!isset($_POST["ajouter"])) {
        if (!empty($_POST["admin"]["nom"]) && !empty($_POST["admin"]["prenom"]) && !empty($_POST["admin"]["mail"]) && !empty($_POST["admin"]["mtp"]) && !empty($_POST["admin"]["mtpConf"])) {
            $nom = htmlspecialchars($_POST["admin"]["nom"]);
            $prenom = htmlspecialchars($_POST["admin"]["prenom"]);
            $mail = htmlspecialchars($_POST["admin"]["mail"]);
            $mtp = htmlspecialchars($_POST["admin"]["mtp"]);
            $mtpConf = htmlspecialchars($_POST["admin"]["mtpConf"]);

            //Toujours une vérification des deux mot de passe saisie
            if (strcmp($mtp, $mtpConf) == 0) {
                $res=$admin->ajouterAdmin($nom, $prenom, $mail, $mtp);
                header('location:../admin.php?ajoutAdmin='.$res);

            }//on vérifie que le mot de passe soit bien tapé
            else {
                //Si le mot de passe n'est pas le même que la confirmation
                header("location:../admin.php?mtp=" . true);
            }
        } else {
            //Si le mot de passe n'est pas le même que la confirmation
            header("location:../admin.php?adminChamp=" . true);
        }
    }
} else {
    //par sécuriter on le renvoit sur l'index
    header('location: ../index.php');
}