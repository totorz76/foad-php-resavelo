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
    <title>Document</title>
</head>
<body>
    <!-- Page vide (aucun vélo) -->
     <?php
        if (count($veloArray) === 0) :
            echo '<h3>Aucun vélo enregistré</h3>';
            echo '<a href="' . WEB_ROOT . '/driver/add-driver.php" class="btn btn-secondary mb-3">Ajouter un conducteur</a>';
            die();
        endif;

        ?>
</body>
</html>