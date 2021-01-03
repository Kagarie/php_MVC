<?php
session_start();
//Pour tester les erreurs
//ini_set('display_errors', 'on');

function __autoload($classe)
{
    $classe = str_replace('\\', '/', $classe);
    require($classe . '.php');
}

spl_autoload_register('__autoload'); //Autoload


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include("corpsHtml/head.php"); ?>
    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/cufon-replace.js" type="text/javascript"></script>
    <script src="js/Dynalight_400.font.js" type="text/javascript"></script>
    <script src="js/FF-cash.js" type="text/javascript"></script>
    <script src="js/tms-0.3.js" type="text/javascript"></script>
    <script src="js/tms_presets.js" type="text/javascript"></script>
    <script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
    <script src="js/jquery.equalheights.js" type="text/javascript"></script>

    <script src="xhr.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5.js"></script><![endif]-->
</head>

<body id="page1">
<!--==============================header=================================-->
<header>
    <?php include("corpsHtml/header.php"); ?>

    <div class="row-bot">
        <div class="row-bot-bg">
            <div class="main">
                <h2>Bienvenu chez <span>Gégé</span></h2>
                <div class="slider-wrapper">
                    <div class="slider">
                        <ul class="items">
                            <li><img src="images/slider-img1.jpg" alt=""/></li>
                            <li><img src="images/slider-img2.jpg" alt=""/></li>
                            <li><img src="images/slider-img3.jpg" alt=""/></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--==============================content================================-->
<section id="content">
    <div class="main">
        <div class="wrapper img-indent-bot">
            <article class="col-1"><img class="img-border" src="images/banner-1.jpg" alt=""></article>
            <article class="col-1"><img class="img-border" src="images/banner-2.jpg" alt=""></article>
            <article class="col-2"><img class="img-border" src="images/banner-3.jpg" alt=""></article>
        </div>
        <div class="wrapper">
            <article class="column-1">
                <div class="indent-left">
                    <div class="maxheight indent-bot">
                        <h3>Nos services</h3>
                        <ul class="list-1">
                            <li><a href="#">Repas de qualité</a></li>
                            <li><a href="#">Ambiance calme</a></li>
                            <li><a href="#">Lieux chaleureux</a></li>
                            <li><a href="#">Personnel agréable</a></li>
                            <li><a href="#">Ouvert tous les jours</a></li>
                            <li><a href="#">Grand parking</a></li>
                            <li><a href="#">Lancer de couteau sur les cuisiniers</a></li>
                        </ul>
                    </div>
            </article>
            <article class="column-2">
                <div class="maxheight indent-bot">
                    <h3 class="p1">About the Catering</h3>
                    <h6 class="p2">Catering is one of free website templates created by TemplateMonster.com team. This
                        website template is optimized for 1280X1024 screen resolution. It is also XHTML &amp; CSS
                        valid.</h6>
                    <p class="p2">This Catering Template goes with two packages – with PSD source files and without
                        them. PSD source files are available for free for the registered members of
                        TemplatesMonster.com. The basic package (without PSD source) is available for anyone without
                        registration.</p>
                    This website template has several pages: <a href="index.php">About</a>, <a
                            href="menu.php">Menu</a>, <a href="plats.php">Catalogue</a>,
                    <a href="faq.php">FAQ</a>,(note that contact us form – doesn’t
                    work).
                </div>
            </article>
            <div id="coordonees">
                <p>Adresse : 17000 place de Verdun La Rochelle</p>
                <p>Téléphone : 06 06 06 06 06</p>
            </div>
        </div>
    </div>
</section>
<!--==============================footer=================================-->
<?php require("corpsHtml/footer.php"); ?>


<script type="text/javascript">
    Cufon.now();
</script>
<script type="text/javascript">
    $(window).load(function () {
        $('.slider')._TMS({
            duration: 1000,
            easing: 'easeOutQuint',
            preset: 'slideDown',
            slideshow: 7000,
            banners: false,
            pauseOnHover: true,
            pagination: true,
            pagNums: false
        });
    });
</script>
</body>

</html>
