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

<body id="page7">
<!--==============================header=================================-->
<header>
    <?php require("corpsHtml/header.php"); ?>
</header>
<!--==============================content================================-->
<section id="content">
    <div class="main">

        <!--FORMULAIRE DE CONNEXION-->
        <div id="inscription">
            <p>Si vous avez pas de compte veuillez suivre ce lien </p>
            <a href="inscription.php">Inscription</a>
        </div>
        <div id="container">
            <form action="utils/verifConnexion.php" method="POST">
                <h1>Connexion</h1>

                <label><b>Addresse mail</b></label>
                <input type="email" placeholder="Entrer le nom Addresse mail" name="connexion[mail]" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="connexion[mtp]" required>

                <input type="submit" id='submit' name="co" value='LOGIN'>
                <!-- affichage en cas d'échec de connexion -->
                <?php if (isset($_GET['echec'])): ?>
                    <?php if ($_GET['echec'] == 1) : ?>
                        <p style="color: red; text-align: center"> Connexion échoué</p>
                    <?php endif; ?>
                <?php endif; ?>
            </form>
        </div>
    </div>
</section>

<!--==============================footer=================================-->
<?php require("corpsHtml/footer.php"); ?>

</body>