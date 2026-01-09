<?php
require dirname(__DIR__) . '/config/db_connect.php';
require dirname(__DIR__) . '/includes/functions_velos.php';
require dirname(__DIR__) . '/includes/functions_reservation.php';

if (!isset($_GET['velo_id']) || !is_numeric($_GET['velo_id'])) {
    header('Location: index.php');
    exit;
}

$veloId = (int) $_GET['velo_id'];
$velo = getVeloById($pdo, $veloId);

if (!$velo) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {
    $startDate = $_POST['start_date'] ?? null;
    $endDate   = $_POST['end_date'] ?? null;

    if (!$startDate || !$endDate || $startDate > $endDate) {
        $error = "Dates invalides";
    } elseif (!checkAvailability($pdo, $veloId, $startDate, $endDate)) {
        $error = "Ce vélo est déjà réservé sur cette période.";
    } else {
        // Calcul du prix total
        $days = (new DateTime($startDate))->diff(new DateTime($endDate))->days + 1;
        $totalPrice = $days * (float) $velo['price'];

        createReservation($pdo, $veloId, $startDate, $endDate, $totalPrice);

        header('Location: index.php');
        exit;
    }
}

include PATH_PROJET . '/public/views/reservation-form-view.php';
