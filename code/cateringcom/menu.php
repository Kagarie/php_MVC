<?php
session_start();

use app\controller\controllerPlat;

function __autoload($classe)
{
    $classe = str_replace('\\', '/', $classe);
    require($classe . '.php');
}

spl_autoload_register('__autoload'); //Autoload

$plat = new controllerPlat();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include("corpsHtml/head.php"); ?>
    <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/catalogue.css" type="text/css">

    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/cufon-replace.js" type="text/javascript"></script>
    <script src="js/Dynalight_400.font.js" type="text/javascript"></script>
    <script src="js/FF-cash.js" type="text/javascript"></script>
    <script src="js/jquery.prettyPhoto.js" type="text/javascript"></script>
    <script src="js/hover-image.js" type="text/javascript"></script>
    <script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
    <script src="js/jquery.bxSlider.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#slider-2').bxSlider({
                pager: true,
                controls: false,
                moveSlideQty: 1,
                displaySlideQty: 4
            });
            $("a[data-gal^='prettyPhoto']").prettyPhoto({
                theme: 'facebook'
            });
        });
    </script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5.js"></script><![endif]-->
</head>

<body id="page3">
<!--==============================header=================================-->
<header>
    <?php require("corpsHtml/header.php"); ?>
</header>
<!--==============================content================================-->
<section id="content">

    <h3 class="prev-indent-bot">Nos différents plats</h3>

    <?= $plat->getCatalogue(); ?>

</section>
<!--==============================footer=================================-->
<?php require("corpsHtml/footer.php"); ?>

<script type="text/javascript">
    Cufon.now();
</script>
</body>

</html>