<?php
require_once __DIR__ . '/../config/db_connect.php';

require_once __DIR__ . '/../includes/functions_velos.php';
require_once __DIR__ . '/../includes/functions_reservation.php';
require_once __DIR__ . '/../includes/functions_calculation.php';

$veloArray = getAllVelos($pdo);
include PATH_PROJET . '/includes/views/velo-list-view.php';
?>

