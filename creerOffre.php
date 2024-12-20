<?php
require_once "config.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $montant = $_POST['montant'];
    $delai = $_POST['delai'];
    $id_projet = $_POST['id_projet'];

    
        $stmt = $pdo->prepare(" INSERT INTO Offres (montant, delai, id_projet)  VALUES (?, ?,? )");
        $stmt->bindParam(1, $montant, PDO::PARAM_STR);
        $stmt->bindParam(2, $delai, PDO::PARAM_STR);
        $stmt->bindParam(3, $id_projet, PDO::PARAM_INT);
        if ($stmt->execute()) {
            echo "offre créé avec succès !";
        } else {
            echo "Erreur : " . $pdo->error;
        }

    
}

?>
