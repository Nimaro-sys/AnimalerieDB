<?php
// animals_api.php - API qui renvoie les informations des animaux en JSON
header('Content-Type: application/json');

include 'config.php';

$sql = 'SELECT id, nom, genre, pays, date_naissance, date_arrivee, date_deces, histoire, image FROM animal ORDER BY nom ASC';

try {
    $stmt = $pdo->query($sql);
    $animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($animaux);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erreur lors de la récupération des animaux']);
}
?>
