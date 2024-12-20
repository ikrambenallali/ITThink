<?php 
session_start();
require_once "config.php";
// if (!isset($_SESSION['id_utilisateur']) || $_SESSION['role'] !== 'admin') {
//     header('Location: login.php');
//     exit;
// }

$totalUtilisateurs = $pdo->query("SELECT COUNT(*) FROM utilisateurs")->fetchColumn();
// $allutilisateurs = $pdo->query("SELECT * FROM utilisateurs")->fetchAll();
// $_SESSION['allutilisateurs']=$allutilisateurs;
try {
    $allutilisateurs = $pdo->query("SELECT * FROM utilisateurs")->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['allutilisateurs'] = $allutilisateurs;
} catch (Exception $e) {
    die("Erreur lors de la récupération des utilisateurs : " . $e->getMessage());
}

$totalProjets = $pdo->query("SELECT COUNT(*) FROM Projets")->fetchColumn();
$_SESSION['totalProjets']=$totalProjets;

$totalFreelances = $pdo->query("SELECT COUNT(*) FROM Freelances")->fetchColumn();
$_SESSION['totalFreelances']=$totalFreelances;

$totalTemoignages = $pdo->query("SELECT COUNT(*) FROM Temoignages")->fetchColumn();
$_SESSION['totalTemoignages']=$totalTemoignages;

// echo "Total utilisateurs : " . $totalUtilisateurs;
// echo "Total projets : " . $totalProjets;
// echo "Total freelances : " . $totalFreelances;
// echo "Total temoignages : " . $totalTemoignages;

?> 
