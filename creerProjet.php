<?php
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre_projet = $_POST['titre_projet'];
    $description = $_POST['description'];
    $id_categorie = $_POST['id_categorie'];
    $id_sous_categorie = $_POST['id_sous_categorie'];


    $stmt = $pdo->prepare("INSERT INTO projets (titre_projet, description_projet, id_categorie, id_sous_categorie) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $titre_projet, PDO::PARAM_STR);
        $stmt->bindParam(2, $description, PDO::PARAM_STR);
        $stmt->bindParam(3, $id_categorie, PDO::PARAM_INT);
        $stmt->bindParam(4, $id_sous_categorie, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Projet créé avec succès !";
    } else {
        echo "Erreur : " . $pdo->error;
    }
}
try {
    $categories = $pdo->query("SELECT id_categorie FROM Categories");
    if (!$categories) {
        die("Erreur lors de la récupération des catégories.");
    }

    $sousCategories = $pdo->query("SELECT id_sous_categorie FROM Sous_Categories");
    if (!$sousCategories) {
        die("Erreur lors de la récupération des sous-catégories.");
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
