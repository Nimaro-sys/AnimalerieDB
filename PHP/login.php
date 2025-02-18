<?php
session_start();
include 'config.php'; // Connexion PDO

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Remplissez tous les champs.']);
        exit;
    }

    // Vérifier l'utilisateur
    $stmt = $pdo->prepare("SELECT * FROM employes WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification du mot de passe (suppose que les mots de passe sont hashés en BDD)
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Email ou mot de passe incorrect.']);
    }
    exit;
}

echo json_encode(['success' => false, 'message' => 'Méthode non autorisée.']);
?>
