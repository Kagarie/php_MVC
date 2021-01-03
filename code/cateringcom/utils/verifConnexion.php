<?php

namespace utils;

//Pour tester les erreurs
ini_set('display_errors', 'on');


use app\controller\controllerAdmin;
use app\controller\controllerClient;

//Pour tester les erreurs
ini_set('display_errors', 'on');

function __autoload($classe)
{
    $classe = str_replace('\\', '/', $classe);
    require("../" . $classe . '.php');
}

spl_autoload_register('utils\__autoload'); //Autoload

//Dans ma conception le client et l'admin sont deux objets avec des droits différents
$client = new controllerClient();
$admin = new controllerAdmin();

//test si on passe bien par notre formulaire
if (isset($_POST["co"])) {
    //on vérifie que tous les champs soient bien rempli
    if (!empty($_POST["connexion"]["mail"]) && !empty($_POST["connexion"]["mtp"])) {
        $mail = htmlspecialchars($_POST["connexion"]["mail"]);
        $mtp = htmlspecialchars($_POST["connexion"]["mtp"]);

        //On test la connexino d'un client puis d'un admin (une personne ne peut pas être dans les deux tables)
        $client = $client->connexion($mail, $mtp);
        $admin = $admin->connexion($mail, $mtp);

        //si le client est trouvé on démarre une session et ou lui ajoute son role
        if ($client) {
            session_start();
            $_SESSION['login'] = $client;
            $_SESSION['role'] = 'client';
            header('location:../index.php');
        } //idem si c'est l'admin
        elseif ($admin) {
            session_start();
            $_SESSION['login'] = $admin;
            $_SESSION['role'] = 'admin';
            header('location:../index.php');
        } //Sinon on retourn ce la page de connexion et on affiche une erreur
        else {
            header("location:../connexion.php?echec=" . true);
        }

    } else {
        header("location:../connexion.php?echec=" . true);
    }
} else {
    header('location:../connexion.php');
}
