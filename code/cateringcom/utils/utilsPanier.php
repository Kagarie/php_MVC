<?php
session_start();


//Pour tester les erreurs
ini_set('display_errors', 'on');

if (isset($_POST["addPanier"])) {
    if (empty($_SESSION['panier']))
        $_SESSION['panier'] = array();

    // on ajoute le nom du plat et le nombre demandé
    array_push($_SESSION['panier'], $_POST['plat']);
    header('location:../menu.php');


} else {
    header('location:../menu.php');
}

