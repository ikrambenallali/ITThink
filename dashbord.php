<?php 
session_start();
require_once "config.php";


$totalUtilisateurs = $pdo->query("SELECT COUNT(*) FROM utilisateurs")->fetchColumn();
$allutilisateurs = $pdo->query("SELECT * FROM utilisateurs")->fetchAll();
$_SESSION['allutilisateurs']=$allutilisateurs;

$totalProjets = $pdo->query("SELECT COUNT(*) FROM Projets")->fetchColumn();
$allproject = $pdo->query("SELECT * FROM Projets")->fetchAll();
$_SESSION['allproject']=$allproject;

$totalFreelances = $pdo->query("SELECT COUNT(*) FROM Freelances")->fetchColumn();
$allfreelance = $pdo->query("SELECT * FROM Freelances")->fetchAll();
$_SESSION['allfreelance']=$totalFreelances;

$totalTemoignages = $pdo->query("SELECT COUNT(*) FROM Temoignages")->fetchColumn();
$alltemoignages = $pdo->query("SELECT * FROM Temoignages")->fetchAll();
$_SESSION['alltemoignages']=$alltemoignages;

// echo "Total utilisateurs : " . $totalUtilisateurs;
// echo "Total projets : " . $totalProjets;
// echo "Total freelances : " . $totalFreelances;
// echo "Total temoignages : " . $totalTemoignages;

?> 
