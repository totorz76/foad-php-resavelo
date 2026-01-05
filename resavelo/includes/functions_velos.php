<?php

define('PATH_PROJET', $_SERVER['DOCUMENT_ROOT'] . '/foad-php-resavelo/resavelo');
define('WEB_ROOT', '/foad-php-resavelo/resavelo');

// Fonctions velos
function getAllVelos($pdo)
{
    $sql = 'SELECT * FROM velos';
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll();
};

function getVeloById($pdo, $id)
{
    $sql = 'SELECT * FROM velos WHERE id = :id';
    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
    return $query->fetch();
};

function addVelo($pdo, $data)
{
    $sql = 'INSERT INTO velos (name, price, quantity, description, image_url) VALUES (:name, :price, :quantity, :description, :image_url)';
    $query = $pdo->prepare($sql);
    $query->bindValue(':name', $data['name']);
    $query->bindValue(':price', $data['price']);
    $query->bindValue(':quantity', $data['quantity']);
    $query->bindValue(':description', $data['description']);
    $query->bindValue(':image_url', $data['image_url']);
    $query->execute();
};

function updateVelo($pdo, $id, $data)
{
    $sql = 'UPDATE velos SET name = :name, price = :price, quantity = :quantity, description = :description, image_url = :image_url WHERE id = :id';
    $query = $pdo->prepare($sql);
    $query->bindValue(':name', $data['name']);
    $query->bindValue(':price', $data['price']);
    $query->bindValue(':quantity', $data['quantity']);
    $query->bindValue(':description', $data['description']);
    $query->bindValue(':image_url', $data['image_url']);
    $query->bindValue(':id', $id);
    $query->execute();
};

function deleteVelo($pdo, $id)
{
    $sql = 'DELETE FROM velos WHERE id = :id';
    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
};

// Fonctions reservations

function createReservation($pdo, $user_id, $equipment_id, $start_date, $end_date)
{
    $sql = 'INSERT INTO reservations (user_id, equipment_id, start_date, end_date) VALUES (:user_id, :equipment_id, :start_date, :end_date)';
    $query = $pdo->prepare($sql);
    $query->bindValue(':user_id', $user_id);
    $query->bindValue(':equipment_id', $equipment_id);
    $query->bindValue(':start_date', $start_date);
    $query->bindValue(':end_date', $end_date);
    $query->execute();
};

function getAllReservations($pdo)
{
    $sql = 'SELECT * FROM reservations';
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll();
};

function updateReservationStatus ($pdo, $id, $status) {
    $sql = 'UPDATE reservations SET status = :status WHERE id = :id';
    $query = $pdo->prepare($sql);
    $query->bindValue(':status', $status);
    $query->bindValue(':id', $id);
    $query->execute();
};

function cancelReservation ($pdo, $id) {
    $sql = 'DELETE FROM reservations WHERE id = :id';
    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
};

function checkAvailability ($pdo, $equipment_id, $start_date, $end_date) {
    $sql = 'SELECT * FROM reservations WHERE equipment_id = :equipment_id AND (start_date BETWEEN :start_date AND :end_date OR end_date BETWEEN :start_date AND :end_date)';
    $query = $pdo->prepare($sql);
    $query->bindValue(':equipment_id', $equipment_id);
    $query->bindValue(':start_date', $start_date);
    $query->bindValue(':end_date', $end_date);
    $query->execute();
    return $query->fetchAll();
};

// Fonction de calcul

calculatePrice($price_per_day, $start_date, $end_date)
{
    $total_price = ($end_date - $start_date) * $price_per_day;
    return $total_price;
};