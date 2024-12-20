<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Projet</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Créer un Projet</h2>
        <form action="creerProjet.php" method="POST">
          

            <!-- Titre Projet -->
            <div class="mb-4">
                <label for="titre_projet" class="block text-gray-700 font-medium">Titre du Projet :</label>
                <input 
                    type="text" 
                    name="titre_projet" 
                    id="titre_projet" 
                    required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-300 focus:border-rose-300">
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium">Description :</label>
                <textarea 
                    name="description" 
                    id="description" 
                    rows="4" 
                    required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-300 focus:border-rose-300"></textarea>
            </div>

            <!-- ID Catégorie -->
            <?php 
    $req = "SELECT id_categorie, nom_categorie FROM categories"; 
    $reponse = $pdo->query($req)->fetchAll();
    ?>

            <div class="mb-4 ">
                <label for="id_categorie" class="block text-gray-700 font-medium">ID Catégorie :</label>
                <select name="id_categorie" id="id_categorie" required>
    <option value="">Catégorie</option>

    
    <?php foreach($reponse as $rep): ?>
        <option value="<?php echo $rep['id_categorie']; ?>"><?php echo $rep['nom_categorie']; ?></option>
    <?php endforeach; ?>
</select>

            </div>

            <!-- ID Sous-Catégorie -->
            <?php 
    $req = "SELECT id_sous_categorie, nom_sous_categorie FROM Sous_Categories"; // Ajoutez ici 'nom' si vous voulez afficher le nom de la catégorie
    $reponse = $pdo->query($req)->fetchAll();
    ?>

            <div class="mb-4 ">
                <label for="id_sous_categorie" class="block text-gray-700 font-medium">ID sous Catégorie :</label>
                <select name="id_sous_categorie" id="id_sous_categorie" required>
    <option value="">Sous_Categories</option>

    
    <?php foreach($reponse as $rep): ?>
        <option value="<?php echo $rep['id_sous_categorie']; ?>"><?php echo $rep['nom_sous_categorie']; ?></option>
    <?php endforeach; ?>
</select>

            </div>
            <!-- Bouton Soumettre -->
            <button 
                type="submit" 
                class="w-full bg-rose-500 text-white py-2 rounded-md hover:bg-rose-600 transition duration-300">
                Créer le Projet
            </button>
        </form>
    </div>
</body>
</html>
