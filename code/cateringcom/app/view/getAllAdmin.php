<!-- On affiche tous les admins dans un tableau (présent dans la page admin du site) -->
<div>
    <table id="table1">
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>mail</th>
        </tr>
        <?php foreach ($data as $kley => $value): ?>
            <tr>
                <td><?= $value->getNom() ?></td>
                <td><?= $value->getPrenom() ?></td>
                <td><?= $value->getMail() ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>