<?php  
session_start();
if (!isset($_SESSION['totalProjets'])) {
  $_SESSION['totalProjets'] = 0;
}
if (!isset($_SESSION['totalTemoignages'])) {
  $_SESSION['totalTemoignages'] = 0;
}

if (!isset($_SESSION['totalOffres'])) {
  $_SESSION['totalOffres'] = 0; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | ITThink</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-rose-100">
  <div class="min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-rose-300 text-white py-4">
      <div class="container mx-auto flex justify-between items-center px-4">
        <h1 class="text-2xl text-black font-bold">ITThink Dashboard</h1>
        <a href="login.html" class="bg-white text-black px-4 py-2 rounded-md hover:bg-rose-100">Déconnexion</a>
      </div>
    </header>

    <!-- Main Content -->
     <div class="flex">
    <div class="m-12">
        <a href="creeProject.php" class="bg-white text-black px-4 py-2 rounded-md hover:bg-rose-300">Creer Un Projet</a>
      </div>
      <div class="m-12">
        <a href="creerTemoignages.php" class="bg-white text-black px-4 py-2 rounded-md hover:bg-rose-300">Creer Un Temoignages</a>
      </div>
    </div>
    <main class="flex-1 container mx-auto px-4 py-6">
      <h2 class="text-2xl font-semibold text-black mb-6 ">Statistiques Clés</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 2 -->
        <div class="bg-white shadow-md rounded-lg p-6  hover:bg-rose-300" id="card2" onclick="">
          <h3 class="text-black text-lg font-semibold flex justify-center">Projets publiés <?= $_SESSION['totalProjets']  ?></h3>
          <p class="text-2xl font-bold text-indigo-600 mt-2" ></p>
        </div>
        <!-- Card 3 -->
        <div class="bg-white shadow-md rounded-lg p-6  hover:bg-rose-300" id="card3" onclick="">
          <h3 class="text-black text-lg font-semibold flex justify-center">Témoignages publiés <?= $_SESSION['totalTemoignages'] ?></h3>
          <p class="text-2xl font-bold text-indigo-600 mt-2" ></p>
        </div>
        <!-- Card 4 -->
        <div class="bg-white shadow-md rounded-lg p-6  hover:bg-rose-300" id="card4" onclick="">
          <h3 class="text-black text-lg font-semibold flex justify-center">Offres soumises <?=$_SESSION['totalOffres']  ?></h3>
          <p class="text-2xl font-bold text-indigo-600 mt-2" ></p>
        </div>
      </div>
      <div class="bg-white shadow-md rounded-lg p-40 mt-4" id="affiche">
      <h1 class="text-2xl font-bold text-center text-gray-800 mb-6 -mt-32">Liste des Projets</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-rose-200 text-rose-600 uppercase text-sm leading-normal ">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Nom de projet</th>
                        <th class="py-3 px-6 text-left">Description</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    <?php if (isset($_SESSION['allproject']) && is_array($_SESSION['allproject'])): ?>
                        <?php foreach ($_SESSION['allproject'] as $projet): ?>
                            <tr class="border-b border-rose-200 hover:bg-rose-100">
                                <td class="py-3 px-6"><?= htmlspecialchars($projet['id_projet']) ?></td>
                                <td class="py-3 px-6"><?= htmlspecialchars($projet['titre_projet']) ?></td>
                                <td class="py-3 px-6"><?= htmlspecialchars($projet['description_projet']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="py-3 px-6 text-center text-gray-500">Aucun projet trouvé.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
      </div>
    </main>
  </div>
</body>
</html>
