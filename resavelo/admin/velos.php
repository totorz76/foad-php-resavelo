<?php
require_once __DIR__ . '/../config/db_connect.php';

require_once __DIR__ . '/../includes/functions_velos.php';
require_once __DIR__ . '/../includes/functions_reservation.php';
require_once __DIR__ . '/../includes/functions_calculation.php';

$veloArray = getAllVelos($pdo);
include PATH_PROJET . '/includes/partials/header.php';
?>

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
     <?php
        if (count($veloArray) === 0) :
            echo '<h3>Aucun vélo enregistré</h3>';
            echo '<a href="' . WEB_ROOT . '/admin/velos_form.php">Ajouter un vélo</a>';
            die();
        endif;

        ?>
        <h1>Liste des vélos</h1>
        <a href="<?= WEB_ROOT . './admin/velos_form.php' ?>">Ajouter un vélo</a>

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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

</body>
</html>