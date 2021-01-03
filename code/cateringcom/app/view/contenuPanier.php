<?php
$nbr = array();
foreach ($_SESSION['panier'] as $cle => $valeur) {
    foreach ($valeur as $key => $value) {
        if (strcmp($key, 'nbr') == 0)
            array_push($nbr, $value);
    }
}
$i = 0;
?>
<!-- On récapitule le panier-->
<div id="panier"><?php foreach ($data as $key => $value): ?>
        <div id="platPanier">
            <h4><?= $value->getNomPlat() ?></h4>
            <p><?= $value->getTypePlat() ?><br><?= $value->getPrix() . '€' ?><br>Quantité : <?= $nbr[$i] ?></p>
            <img src="<?= $value->getPathImage() ?>" alt="<?= $value->getNomPlat() ?>" width="200" height="150">
            <form action="../../utils/deletePlat.php" method="POST"
                  style="padding: 0; margin: 1em 0 0 10em; width:7em; ">
                <input type="hidden" name="plat" value="<?= $value->getNomPlat() ?>">
                <input style="padding: 5px;margin: 0px" type="submit" name="delete" value="supprimer">
            </form>

        </div>
        <input type="hidden" <?= $i += 1 ?>>
    <?php endforeach; ?>
</div>
