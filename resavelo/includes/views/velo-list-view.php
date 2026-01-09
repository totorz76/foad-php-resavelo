<!-- View -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Page vide (aucun vélo) -->
    <?php include PATH_PROJET . '/includes/partials/nav.php'; ?>
    <?php
    if (count($veloArray) === 0) :
        echo '<h3>Aucun vélo enregistré</h3>';
        echo '<a href="' . WEB_ROOT . '/admin/velo_add.php">Ajouter un vélo</a>';
        die();
    endif;

    ?>
    <h1>Liste des vélos</h1>
    <a href="<?= WEB_ROOT . '/admin/velo_add.php' ?>">Ajouter un vélo</a>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Description</th>
                <th>Image</th>
                <th>Date de création</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($veloArray as $velo) : ?>
                <tr>
                    <td><?= $velo['name'] ?></td>
                    <td><?= $velo['price'] ?>€</td>
                    <td><?= $velo['quantity'] ?></td>
                    <td><?= $velo['description'] ?></td>
                    <td><img src="<?= $velo['image_url'] ?>" alt="<?= $velo['name'] ?>"></td>
                    <td><?= $velo['created_at'] ?></td>
                    <td>
                        <a href="<?= WEB_ROOT ?>/admin/velo_edit.php?velo_id=<?= $velo['velo_id'] ?>">
                            Edit
                        </a>

                        <a href="<?= WEB_ROOT ?>/admin/velo_delete.php?velo_id=<?= $velo['velo_id'] ?>"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce vélo ?')">
                            Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>