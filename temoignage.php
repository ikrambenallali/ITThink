<?php
require_once 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $commentaire = $_POST['commentaire'];

    if (!empty($commentaire) ) {
        try {
            $stmt = $pdo->prepare("INSERT INTO Temoignages (commentaire) VALUES (:commentaire)");
            $stmt->bindParam(':commentaire', $commentaire, PDO::PARAM_STR);

            if ($stmt->execute()) {
                echo "Témoignage ajouté avec succès.";
            } else {
                echo "Erreur lors de l'ajout du témoignage.";
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    
}
} 
?>
