<?php

namespace utils;
session_start();

//On supprime un plat du panier
if (isset($_POST["delete"])) {
    foreach ($_SESSION['panier'] as $cle => $valeur) {
        foreach ($valeur as $key => $value) {
            if (strcmp($value, $_POST["plat"]) == 0) {
                unset($_SESSION['panier'][$cle]);
            }
        }
    }
    header('location: ../panier.php');
} else {
    //par sécuriter on le renvoit sur l'index
    header('location: ../index.php');
}
?>