<?php 
session_start();
require_once "config.php";
if (!isset($_SESSION['id_utilisateur']) || $_SESSION['role'] !== 'client') {
    header('Location: login.php');
    exit;
}
$totalProjets  = $pdo->query("SELECT COUNT(*) FROM Projets")->fetchColumn();
$allproject = $pdo->query("SELECT * FROM Projets")->fetchAll();
$_SESSION['allproject']=$allproject;
$totalTemoignages = $pdo->query("SELECT COUNT(*) FROM Temoignages")->fetchColumn();
$allTemoignages = $pdo->query("SELECT * FROM Projets")->fetchAll();
$_SESSION['allTemoignages']=$allTemoignages;
$totalOffres = $pdo->query("SELECT COUNT(*) FROM Offres")->fetchColumn();
echo "Total projets : " . $totalProjets;
echo "Total freelances : " . $totalTemoignages;
echo "Total temoignages : " . $totalOffres;

?> 