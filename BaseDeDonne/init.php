<?php

global $connexion;

$dns = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';port=' . Port_DB . ';charset=utf8';

try {
    $connexion = new PDO($dns, DB_USER, DB_PASS);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
?>