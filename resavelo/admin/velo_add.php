<?php

include dirname(__DIR__) . '/includes/functions_velos.php';
require dirname(__DIR__) . '/config/db_connect.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {

    // traitement du formulaire
    $name = $_POST['name'] ?? null;
    $price = $_POST['price'] ?? null;
    $quantity = $_POST['quantity'] ?? null;
    $description = $_POST['description'] ?? null;
    $image_url = $_POST['image_url'] ?? null;
    addVelo($pdo, compact('name', 'price', 'quantity', 'description', 'image_url'));
    header('Location: velos.php');
}


include PATH_PROJET . '/includes/views/velo-add-view.php';
?>