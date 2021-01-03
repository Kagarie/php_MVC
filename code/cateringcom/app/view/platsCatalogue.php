<!--On fait la vu de chaque produits dans le page menu et seul les utiliateurs reconnu peuvent avoir la possibilité d'ajouté dans leur panier-->
<div id="catalogue"><?php foreach ($data as $key => $value): ?>
        <div id="plat">
            <h3><?= $value->getNomPlat() ?></h3>
            <p><?= $value->getTypePlat() ?><br><?= $value->getPrix() . '€' ?></p>
            <img src="<?= $value->getPathImage() ?>" alt="<?= $value->getNomPlat() ?>" width="250" height="200">
            <?php if (strcmp($_SESSION['role'], 'client') == 0 || strcmp($_SESSION['role'], 'admin') == 0) : ?>

                <!-- Dans ce form on ajoute une quantité dans notre pannier avec le nom du plat passé en champ caché -->
                <form action="../../utils/utilsPanier.php" method="POST">
                    <input type="hidden" name="plat[plat]" value="<?= $value->getNomPlat() ?>">
                    <select name="plat[nbr]" id="type" style="float: left; margin-top: 1em">
                        <option value="1" name="nbr">1</option>
                        <option value="2" name="nbr">2</option>
                        <option value="3" name="nbr">3</option>
                        <option value="4" name="nbr">4</option>
                        <option value="5" name="nbr">5</option>
                    </select>
                    <input type="hidden" name="plat[prix]" value="<?= $value->getPrix() ?>">
                    <input id="lienCatalogue" type="submit" name='addPanier' value="ajouter" style="float: right; width: 16em; margin: 8px 0 1em 0">
                </form>

            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
