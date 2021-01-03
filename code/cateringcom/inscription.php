<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include("corpsHtml/head.php"); ?>
    <link rel="stylesheet" href="css/form.css" type="text/css" media="screen">
    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/cufon-replace.js" type="text/javascript"></script>
    <script src="js/Dynalight_400.font.js" type="text/javascript"></script>
    <script src="js/FF-cash.js" type="text/javascript"></script>
    <script src="js/tms-0.3.js" type="text/javascript"></script>
    <script src="js/tms_presets.js" type="text/javascript"></script>
    <script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
    <script src="js/jquery.equalheights.js" type="text/javascript"></script>
</head>

<body id="page8">
<!--==============================header=================================-->
<header>
    <?php require("corpsHtml/header.php"); ?>
</header>

<!--==============================content================================-->
<section id="content">
    <div class="main">

        <!--FORMULAIRE DE CONNEXION-->
        <div id="container">
            <form action="utils/verifInscription.php" method="POST">
                <!-- Selon d'ou provient l'erreur un message différent sera retourner -->
                <?php if (isset($_GET['erreur'])): ?>
                    <?php if ($_GET['erreur'] == 1) : ?>
                        <p style="color: red; text-align: center"> Une erreur est survenu veuillez réessayer</p>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (isset($_GET['mail'])): ?>
                    <?php if ($_GET['mail'] == 1) : ?>
                        <p style="color: red; text-align: center"> Adreese mail déjà présente</p>
                    <?php endif; ?>
                <?php endif; ?>
                <h1>Inscription</h1>

                <label><b>Nom</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="inscription[nom]" required>

                <label><b>Prénom</b></label>
                <input type="text" placeholder="Entrer votre prénom" name="inscription[prenom]" required>

                <label><b>Addresse mail</b></label>
                <input type="email" placeholder="Entrer votre addresse mail" name="inscription[email]" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="inscription[mtp]" required>
                <?php if (isset($_GET['mtpEchec'])): ?>
                    <?php if ($_GET['mtpEchec'] == 1) : ?>
                        <p style="color: red; text-align: center"> Les mots de passes ne sont pas identique</p>
                    <?php endif; ?>
                <?php endif; ?>

                <label><b>Confirmation du mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="inscription[mtpConf]" required>
                <?php if (isset($_GET['mtpEchec'])): ?>
                    <?php if ($_GET['mtpEchec'] == 1) : ?>
                        <p style="color: red; text-align: center"> Les mots de passes ne sont pas identique</p>
                    <?php endif; ?>
                <?php endif; ?>

                <input type="submit" id='submit' name='ins' value="SIGN UP">
                <?php if (isset($_GET['champVide'])): ?>
                    <?php if ($_GET['champVide'] == 1) : ?>
                        <p style="color: red; text-align: center"> Compléter tous les champs</p>
                    <?php endif; ?>
                <?php endif; ?>
            </form>
        </div>
    </div>
</section>


<!--==============================footer=================================-->
<?php require("corpsHtml/footer.php"); ?>
</body>