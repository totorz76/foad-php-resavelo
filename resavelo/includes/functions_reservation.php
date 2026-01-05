<?php
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
