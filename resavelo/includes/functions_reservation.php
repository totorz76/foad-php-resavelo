<?php
// Fonctions reservations

function createReservation(PDO $pdo, int $veloId, string $startDate, string $endDate, float $totalPrice): bool
{
    $pdo->beginTransaction();
    try {
        // Vérifier le stock disponible
        $sql = 'SELECT quantity FROM velos WHERE velo_id = :velo_id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':velo_id' => $veloId]);
        $available = (int) $stmt->fetchColumn();

        if ($available < 1) {
            // Plus de vélos dispo → on stoppe et rollback
            $pdo->rollBack();
            return false;
        }

        // 1. Insérer la réservation
        $sqlInsert = 'INSERT INTO reservations (velo_id, start_date, end_date, total_price)
                      VALUES (:velo_id, :start_date, :end_date, :total_price)';
        $stmtInsert = $pdo->prepare($sqlInsert);
        $stmtInsert->execute([
            ':velo_id' => $veloId,
            ':start_date' => $startDate,
            ':end_date' => $endDate,
            ':total_price' => $totalPrice
        ]);

        // 2. Décrémenter le stock du vélo
        $sqlUpdate = 'UPDATE velos SET quantity = quantity - 1 WHERE velo_id = :velo_id AND quantity > 0';
        $stmtUpdate = $pdo->prepare($sqlUpdate);
        $stmtUpdate->execute([':velo_id' => $veloId]);

        $pdo->commit();
        return true;

    } catch (Exception $e) {
        $pdo->rollBack();
        return false;
    }
}



function getAllReservations($pdo)
{
    $sql = 'SELECT * FROM reservations';
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll();
};

function updateReservationStatus($pdo, $id, $status)
{
    $sql = 'UPDATE reservations SET status = :status WHERE id = :id';
    $query = $pdo->prepare($sql);
    $query->bindValue(':status', $status);
    $query->bindValue(':id', $id);
    $query->execute();
};

function cancelReservation($pdo, $id)
{
    $sql = 'DELETE FROM reservations WHERE id = :id';
    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
};

function checkAvailability(PDO $pdo, int $veloId, string $startDate, string $endDate): int
{
    // Quantité totale du vélo
    $sqlTotal = 'SELECT quantity FROM velos WHERE velo_id = :velo_id';
    $stmtTotal = $pdo->prepare($sqlTotal);
    $stmtTotal->execute([':velo_id' => $veloId]);
    $totalQuantity = (int) $stmtTotal->fetchColumn();

    // Somme des quantités déjà réservées sur la période
    $sqlReserved = "
        SELECT COALESCE(SUM(quantity), 0) FROM reservations
        WHERE velo_id = :velo_id
        AND NOT (
            end_date < :start_date OR start_date > :end_date
        )
    ";
    $stmtReserved = $pdo->prepare($sqlReserved);
    $stmtReserved->execute([
        ':velo_id' => $veloId,
        ':start_date' => $startDate,
        ':end_date' => $endDate,
    ]);
    $reservedQuantity = (int) $stmtReserved->fetchColumn();

    return $totalQuantity - $reservedQuantity;
}
