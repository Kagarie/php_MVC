<?php
session_start();

if (!strcmp($_SESSION['role'], 'admin') == 0)
    header("location:index.php");


//Pour tester les erreurs
//ini_set('display_errors', 'on');

use app\controller\controllerAdmin;
use app\controller\controllerPlat;

function __autoload($classe)
{
    $classe = str_replace('\\', '/', $classe);
    require($classe . '.php');
}

spl_autoload_register('__autoload'); //Autoload

$admin = new controllerAdmin();
$plat = new controllerPlat();
?>

<!DOCTYPE html>
<html lang="fr">
<body>
<!--==============================header=================================-->
<head>
    <?php include("corpsHtml/head.php"); ?>
    <link rel="stylesheet" href="css/table.css" type="text/css">

    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/cufon-replace.js" type="text/javascript"></script>
    <script src="js/Dynalight_400.font.js" type="text/javascript"></script>
    <script src="js/FF-cash.js" type="text/javascript"></script>
    <script src="js/tms-0.3.js" type="text/javascript"></script>
    <script src="js/tms_presets.js" type="text/javascript"></script>
    <script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
    <script src="js/jquery.equalheights.js" type="text/javascript"></script>
</head>

<!--==============================header=================================-->
<header>
    <?php require("corpsHtml/header.php"); ?>
</header>

<!--==============================content================================-->
<section id="content">

    <div id="main">
        <h3>Page administrateur</h3>

        <h4>Liste des admins</h4>
        <!--On va chercher la vue admin et on l'affiche en tableau -->
        <?= $admin->voirAdmin(); ?>

        <h4>Ajouter admin</h4>
        <?php if (isset($_GET['adminChamp'])): ?>
            <?php if ($_GET['adminChamp'] == 1) : ?>
                <p style="color: red">Tous les champs doivent être rempli</p>
            <?php endif; ?>
        <?php endif; ?>
        <form action="utils/utilsAdminAddAdmin.php" method="POST">
            <label><b>Nom</b></label>
            <input type="text" placeholder="nom" name="admin[nom]" required>

            <label><b>Prénom</b></label>
            <input type="text" placeholder="prénom" name="admin[prenom]" required>

            <label><b>Addresse mail</b></label>
            <input type="email" placeholder="mail" name="admin[mail]" required>

            <?php if (isset($_GET['mtp'])): ?>
                <?php if ($_GET['mtp'] == 1) : ?>
                    <p style="color: red">Les mots de passe ne sont pas identiques</p>
                <?php endif; ?>
            <?php endif; ?>
            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="mot de passe" name="admin[mtp]" required>
            <?php if (isset($_GET['mtp'])): ?>
                <?php if ($_GET['mtp'] == 1) : ?>
                    <p style="color: red">Les mots de passe ne sont pas identiques</p>
                <?php endif; ?>
            <?php endif; ?>
            <label><b>Confirmation du mot de passe</b></label>
            <input type="password" placeholder="mot de passe" name="admin[mtpConf]" required>

            <input type="submit" id='submit' name='adminAjouter' value="ajouter">
        </form>

        <!--On retourne un message pour dire si la demande c'est bien passé ou non. Ceci est effectué pour tous les form de cette page -->
        <?php if (isset($_GET['ajoutAdmin'])): ?>
            <?php if ($_GET['ajoutAdmin'] == 1) : ?>
                <p style="color: green"> Ajout Réussi</p>
            <?php else : ?>
                <p style="color: red">Echec de l'ajout</p>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (isset($_GET['supprimerAdminChamp'])): ?>
            <?php if ($_GET['supprimerAdminChamp'] == 1) : ?>
                <p style="color: red">Tous les champs doivent être rempli</p>
            <?php endif; ?>
        <?php endif; ?>
        <h4>Supprimer admin</h4>
        <form action="utils/supprimerAdminAdmin.php" method="POST">
            <label><b>Addresse mail</b></label>
            <input type="email" placeholder="mail" name="admin[mail]" required>

            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="mot de passe" name="admin[mtp]" required>
            <input type="submit" id='submit' name='adminSupprimer' value="Supprimer">
        </form>
        <?php if (isset($_GET['supprimerAdmin'])): ?>
            <?php if ($_GET['supprimerAdmin'] == 1) : ?>
                <p style="color: green"> Suppression réussit</p>
            <?php else : ?>
                <p style="color: red">Echec de la suppression</p>
            <?php endif; ?>
        <?php endif; ?>
        <h4>Liste des Plats</h4>

        <!--On va chercher la vue des plats et on l'affiche en tableau -->
        <?= $plat->getCatalogueAdmin(); ?>

        <h4>Ajouter plat</h4>
        <?php if (isset($_GET['image'])): ?>
            <?php if ($_GET['image'] == 1) : ?>
                <p style="color: red">Seulement une image est attendu</p>
            <?php endif; ?>
        <?php endif; ?>
        <?php if (isset($_GET['champ'])): ?>
            <?php if ($_GET['champ'] == 1) : ?>
                <p style="color: red">Tous les champs doivent être rempli</p>
            <?php endif; ?>
        <?php endif; ?>
        <form action="utils/utilsAdminAddPlat.php" method="POST" enctype="multipart/form-data">
            <label><b>Nom du plat</b></label>
            <input type="text" placeholder="nom du plat" name="plat[nom]" required>

            <label><b>Type</b></label>
            <select name="plat[type]" id="type">
                <option value="Poisson" name="plat[type]">Poisson</option>
                <option value="Viande" name="plat[type]">Viande</option>
                <option value="Soupe" name="plat[type]">Soupe</option>
                <option value="Salade" name="plat[type]">Salade</option>
            </select>

            <label><b>Prix</b></label>
            <input type="text" placeholder="prix" name="plat[prix]" required>

            <label for="file"><b>Image</b></label>
            <input type="file" name="image" accept="image/*" required/>

            <input type="submit" id='submit' name='platAjouter' value="ajouter">
        </form>
        <?php if (isset($_GET['ajoutPlat'])): ?>
            <?php if ($_GET['ajoutPlat'] == 1) : ?>
                <p style="color: green"> Ajout réussit</p>
            <?php else : ?>
                <p style="color: red">Echec de l'ajout</p>
            <?php endif; ?>
        <?php endif; ?>
        <h4>Supprimer plat</h4>
        <?php if (isset($_GET['champ'])): ?>
            <?php if ($_GET['champ'] == 1) : ?>
                <p style="color: red">Tous les champs doivent être rempli</p>
            <?php endif; ?>
        <?php endif; ?>
        <form action="utils/supprimerPlatAdmin.php" method="POST">
            <label><b>Nom du plat</b></label>
            <input type="text" placeholder="Nom du plat" name="nomPlat" required>

            <input type="submit" id='submit' name='platSupprimer' value="Supprimer">
        </form>
        <?php if (isset($_GET['supprimerChamp'])): ?>
            <?php if ($_GET['supprimerChamp'] == 1) : ?>
                <p style="color: green"> Suppression réussit</p>
            <?php else : ?>
                <p style="color: red">Echec de la suppression</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<!--==============================footer=================================-->
<?php require("corpsHtml/footer.php"); ?>

</body>

</html>