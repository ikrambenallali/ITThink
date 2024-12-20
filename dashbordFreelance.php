<?php 
session_start();
require_once "config.php";
if (!isset($_SESSION['id_utilisateur']) || $_SESSION['role'] !== 'freelance') {
    header('Location: login.php');
    exit;
}
$totalProjets  = $pdo->query("SELECT COUNT(*) FROM Projets")->fetchColumn();
$_SESSION['totalProjets']==$totalProjets;
$totalOffres = $pdo->query("SELECT COUNT(*) FROM Offres")->fetchColumn();
$_SESSION['totalOffres'] =$totalOffres;
// echo "Total projets : " . $totalProjets;
// echo "Total temoignages : " . $totalOffres;
?> 