<?php

require_once('./init.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']) && isset($_POST['password'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];
    $credentials = getCredentials($login, $password);

    if ($credentials) {
        $_SESSION['login'] = $login;
        $_SESSION['prenom'] = $credentials -> prenom;
        $_SESSION['nom'] = $credentials -> nom;
        $_SESSION['poste'] = $credentials -> poste;
        $_SESSION['isConnected'] = true;
    } else {
        die('idetifiants incorect');
    }

    header('Location: ./index.php');
    exit();
}

function getCredentials ($login, $password) {

    global $connexion;

    $sql = 'SELECT *nom, prenom,post FROM personel WHERE login = :login AND password = :password';

    /* $statement qui contient la requete prete a être exécutée */

    try{
        $statement = $connexion -> prepare($sql);
        $params = [
            ':login' => $login,
            ':password' => $password
        ];
        $statement -> execute($params);

        return $statement -> fetch(PDO::FETCH_OBJ);
    } 
    
    catch (PDOException $e) {
        echo 'Erreur : ' . $e -> getMessage();
    }
}