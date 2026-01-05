<?php 
require_once __DIR__ . '/../config/db_connect.php';

require_once __DIR__ . '/../includes/functions_velos.php';
require_once __DIR__ . '/../includes/functions_reservation.php';
require_once __DIR__ . '/../includes/functions_calculation.php';
 
if (isset($_GET['velo_id'])) {
    $id = $_GET['velo_id'];
    deleteVelo($pdo, $id);
    header('Location: velos.php');
}

?>