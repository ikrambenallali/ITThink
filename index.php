<?php
try {
    $host = 'localhost';
    $dbname = 'itthink';
    $username = 'root';
    $password = '';

    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connexion réussie à la base de données !";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}
?>