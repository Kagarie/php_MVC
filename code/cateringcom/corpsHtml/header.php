<?php

namespace corpsHtml;

include_once("utils/fonctionPanier.php");

//Selon le role (client / admin ) l'header sera différent par exemple un client n'aura pas accés à la page administration
//Si il n'a pas de role donc la personnes n'est pas connecté au site (affiche simple de l'headers)
$role = $_SESSION['role'];
$perso = $_SESSION['login'];
$res = -1;
if (strcmp($role, 'client') == 0)
    $res = 0;
elseif (strcmp($role, 'admin') == 0)
    $res = 1;


?>
    <?php switch ($res):

    //CLIENT
    case 0: ?>
        <div class="row-top">
            <div class="main">
                <div class="wrapper">
                    <h1><a href="../index.php">Gégé<span>.com</span></a></h1>
                    <nav>
                        <ul class="menu">
                            <li><a href="../index.php">Accueil</a></li>
                            <li><a href="../menu.php">Menu</a></li>
                            <li><a href="../panier.php">Panier</a></li>
                            <li><a href="../utils/deconnexion.php">déconnexion</a></li>
                            <li style="margin-top: -4px; color: white">
                                <span><?= $perso->getNom() ?></span>
                                <span><?= $perso->getPrenom() ?></>
                            </li>
                            <li>
                                <?php if (nombreElementPanier() == 0): ?>
                                    <a href="../panier.php">Panier vide</a>
                                <?php else : ?>
                                    <a href="../panier.php">Panier : <?= nombreElementPanier(); ?> éléments. Total
                                        : <?= prixTotal(); ?> €</a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <?php break; ?>


        <!--ADMIN-->
    <?php
    case
    1: ?>

        <div class="row-top">
            <div class="main">
                <div class="wrapper">
                    <h1><a href="../index.php">Gégé<span>.com</span></a></h1>
                    <nav>
                        <ul class="menu">
                            <li><a href="../index.php">Accueil</a></li>
                            <li><a href="../menu.php">Menu</a></li>
                            <li><a href="../panier.php">Panier</a></li>
                            <li><a href="../admin.php">Administration</a></li>
                            <li><a href="../utils/deconnexion.php">Déconnexion</a></li>
                            <li style="margin-top: -4px; color: white">
                                <span><?= $perso->getNom() ?></span>
                                <span><?= $perso->getPrenom() ?></span>
                            </li>
                            <li>
                                <?php if (nombreElementPanier() == 0): ?>
                                    <a href="../panier.php">Panier vide</a>
                                <?php else : ?>
                                    <a href="../panier.php">Panier:<?= nombreElementPanier(); ?> éléments. Total:<?= prixTotal(); ?>€</a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <?php break; ?>


        <!--DEFAULT-->
    <?php
    default: ?>
        <div class="row-top">
            <div class="main">
                <div class="wrapper">
                    <h1><a href="../index.php">Gégé<span>.com</span></a></h1>
                    <nav>
                        <ul class="menu">
                            <li><a href="../index.php">Accueil</a></li>
                            <li><a href="../menu.php">Menu</a></li>
                            <li><a href="../connexion.php">Connexion</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    <?php endswitch; ?>