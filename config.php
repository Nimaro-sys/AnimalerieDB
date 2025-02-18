<?php
// animaux.php - Affiche les cartes des animaux depuis la base de données

// Connexion à la base de données avec PDO
$dsn = 'mysql:host=localhost;dbname=refuge_animaux;charset=utf8';
$user = 'root';
$password = '';
try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

// Requête pour récupérer les animaux
$query = $pdo->query('SELECT nom, pays, date_arrivee, image FROM animal ORDER BY nom ASC');
$animaux = $query->fetchAll(PDO::FETCH_ASSOC);
?>