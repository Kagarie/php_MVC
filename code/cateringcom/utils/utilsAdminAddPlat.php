<?php
//Ici on ajoute un plat
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



if (isset($_POST["platAjouter"])) {
    if (isset($_POST["plat"])) {
        if (!empty($_POST["plat"]["nom"]) && !empty($_POST["plat"]["type"]) && !empty($_POST["plat"]["prix"])) {
            $nom = htmlspecialchars($_POST["plat"]["nom"]);
            $type = htmlspecialchars($_POST["plat"]["type"]);
            $prix = htmlspecialchars($_POST["plat"]["prix"]);

            //On vérifie que le fichiers passé SOIT BIEN une image
            if (image_type_to_extension(getimagesize($_FILES["image"]["tmp_name"])[2])) {
                //On construit un non pour éviter de passer deux fois le même noms de fichier (mais données différentes)
                //et donc de supprimer l'ancienne
                $name = basename($_FILES["image"]["name"]);
                $path = "mesImages/$prix.$name";
                $upload_dir = "../" . $path;
                //On enregistre l'image dans le dossiers "mesImages" pour pouvoir la récupérer
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $upload_dir)) {
                    //Si tout ce passe bien on peut l'ajouter
                    $res = $admin->ajouterPlat($nom, $type, $prix, $path);

                }
                header('location:../admin.php?ajoutPlat='.$res);
            } else {
                //Si ce n'est pas une image
                header("location:../admin.php?image=" . true);
            }
        } else {
            header("location:../admin.php?champ=" . true);
        }
    } else {
        header('location: ../index.php');
    }
} else {
    //par sécuriter on le renvoit sur l'index
    header('location: ../index.php');
}