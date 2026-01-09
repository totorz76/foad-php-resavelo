<?php
require_once __DIR__ . '/../config/db_connect.php';

require_once __DIR__ . '/../includes/functions_velos.php';
require_once __DIR__ . '/../includes/functions_reservation.php';
require_once __DIR__ . '/../includes/functions_calculation.php';

$veloArray = getAllVelos($pdo);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Client</title>
</head>

<body>
    <h1>Bienvenue sur Resavelo</h1>

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
                        <a href="reservation_form.php?velo_id=<?= $velo['velo_id'] ?>">
                            Réserver
                        </a>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>