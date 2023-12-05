<?php
try {
    // Domain Server Name (chaine de connexion à la base)
    $dsn = 'mysql:host=localhost;dbname=netto;charset=UTF8;port=3306';

    // Ouverture de la connexion à la base (DSN, login, pass)
    $connexion = new PDO($dsn, 'root', '');

    // On demande à PDO de lever des exceptions en cas d'erreur
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) { // gestion des exceptions

    echo 'Erreur PDO : ' . $e->getCode() . '<br>';
    echo 'Erreur PDO : ' . $e->getMessage() . '<br>';
    // en s'appyant sur $e->getCode(), on peut personnaliser le message d'erreur
}
?>