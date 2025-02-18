<?php
// config.php - Configuration et connexion à la base de données refuge_animaux

// Informations de connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=refuge_animaux;charset=utf8';
$user = 'root';
$password = '';

try {
    // Création d'une instance PDO pour se connecter à la base de données
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher le message d'erreur et arrêter l'exécution
    die('Erreur de connexion : ' . $e->getMessage());
}

// Requête SQL pour récupérer toutes les informations des animaux
$sql = 'SELECT id, nom, genre, pays, date_naissance, date_arrivee, date_deces, histoire, image FROM animal ORDER BY nom ASC';

try {
    $stmt = $pdo->query($sql);
    $animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('Erreur lors de la récupération des animaux : ' . $e->getMessage());
}

// À partir d'ici, vous pouvez inclure ce fichier dans vos pages et utiliser la variable $animaux
?>
