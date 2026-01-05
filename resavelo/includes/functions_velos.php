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
    $sql = 'SELECT * FROM velos WHERE velo_id = :id';
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
    $sql = 'UPDATE velos SET name = :name, price = :price, quantity = :quantity, description = :description, image_url = :image_url WHERE velo_id = :id';
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
    $sql = 'DELETE FROM velos WHERE velo_id = :id';
    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
};

