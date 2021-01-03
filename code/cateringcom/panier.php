<?php
session_start();

use app\controller\controllerPlat;

//Si la personne na pas de role alors elle n'est pas connecté
if (empty($_SESSION['role']))
    header("location:index.php");

function __autoload($classe)
{
    $classe = str_replace('\\', '/', $classe);
    require($classe . '.php');
}

spl_autoload_register('__autoload'); //Autoload

//Pour tester les erreurs
//ini_set('display_errors', 'on');
$plat = new controllerPlat();


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include("corpsHtml/head.php"); ?>
    <link rel="stylesheet" href="css/form.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/panier.css" type="text/css" media="screen">
    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/cufon-replace.js" type="text/javascript"></script>
    <script src="js/Dynalight_400.font.js" type="text/javascript"></script>
    <script src="js/FF-cash.js" type="text/javascript"></script>
    <script src="js/tms-0.3.js" type="text/javascript"></script>
    <script src="js/tms_presets.js" type="text/javascript"></script>
    <script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
    <script src="js/jquery.equalheights.js" type="text/javascript"></script>
</head>

<body>
<!--==============================header=================================-->
<header>
    <?php require("corpsHtml/header.php"); ?>
</header>
<!--==============================content================================-->
<section id="content">
    <div class="main">
        <h2 style="color: black">Votre Panier</h2>
        <!-- Si le panier est vide on donne le chemin pour commander-->
        <?php if (nombreElementPanier() == 0): ?>
            <h3 style="text-align: center;">Votre Panier est vide</h3>
            <div style="text-align: center"><a id="panierVide" href="menu.php">Cliquer ici pour passer une commande </a>
            </div>
        <?php else : ?>
            <?= $plat->voirPanier() ?>
            <div id="paiement">
                <h3>Total du panier: <?= prixTotal() ?>€</h3>
                <button onclick="paiement()">Paiement</button>
            </div>
        <?php endif; ?>

    </div>
</section>

<!--==============================footer=================================-->
<?php require("corpsHtml/footer.php"); ?>

</body>
<script> function paiement() {
        alert("Paiement non abouti... Pour raison évidente");
    }</script>