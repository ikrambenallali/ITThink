<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Offre</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Créer une Offre</h1>
        <form action="creerOffre.php" method="POST" class="space-y-4">
            <!-- Montant -->
            <div>
                <label for="montant" class="block text-sm font-medium text-gray-700">Montant</label>
                <input type="number" name="montant" id="montant" required 
                       class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring focus:ring-rose-200">
            </div>
            <!-- Délai -->
            <div>
                <label for="delai" class="block text-sm font-medium text-gray-700">Délai (en jours)</label>
                <input type="number" name="delai" id="delai" required 
                       class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring focus:ring-rose-200">
            </div>
            
            <!-- Projet -->
            <?php 
$req = "SELECT id_projet, titre_projet FROM Projets"; 
$projets = $pdo->query($req)->fetchAll(PDO::FETCH_ASSOC); // Assurez-vous que les données sont bien associatives
?>
<div>
    <label for="id_projet" class="block text-sm font-medium text-gray-700">Projet</label>
    <select name="id_projet" id="id_projet" required 
            class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring focus:ring-rose-200">
        <option value="" disabled selected>Sélectionnez un projet</option>
        <?php foreach ($projets as $projet): ?>
            <option value="<?php echo htmlspecialchars($projet['id_projet']); ?>">
                <?php echo htmlspecialchars($projet['titre_projet']); ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

            <!-- Bouton -->
            <div>
                <button type="submit" 
                        class="w-full bg-rose-500 text-white py-2 px-4 rounded-lg hover:bg-rose-600 transition">
                    Créer l'offre
                </button>
            </div>
        </form>
    </div>
</body>
</html>
