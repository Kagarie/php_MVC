<?php
//vue pour la page admin on afficher tous les plats dans un tableau

//petite fonction pour rendre le chemin plus lisible dans le tableau
function path(string $picturePath): string{
    $path = explode( "/",$picturePath);
    return $path[1];
}
?>
<div>
    <table id="table2">
        <tr>
            <th>Plat</th>
            <th>type</th>
            <th>prix</th>
            <th>path (mesImages/)</th>
        </tr>
        <?php foreach ($data as $key => $value): ?>
            <tr>
            <td><?=$value->getNomPlat() ?></td>
            <td><?= $value->getTypePlat()?></td>
            <td><?= $value->getPrix() . '€'?></td>
            <td><?= path($value->getPathImage())?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>