<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Témoignage</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-4 text-center">Créer un Témoignage</h2>
        <form action="temoignage.php" method="POST" class="space-y-4">
            <div>
                <label for="commentaire" class="block text-sm font-medium text-gray-700">Commentaire</label>
                <textarea 
                    id="commentaire" 
                    name="commentaire" 
                    rows="4" 
                    required 
                    class="mt-1 block w-full rounded-md border-rose-300 shadow-sm focus:border-rose-500 focus:ring-rose-500"
                ></textarea>
            </div>
           
            <div class="text-center">
                <button 
                    type="submit" 
                    class="bg-rose-500 text-white px-4 py-2 rounded-md hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2"
                >
                    Soumettre
                </button>
            </div>
        </form>
    </div>
</body>
</html>
