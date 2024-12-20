<?php
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nom_utilisateur = $_POST['name'];
    $role_utilisateur = $_POST['role_utilisateur'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);



    $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom_utilisateur, mot_de_passe, email, role) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nom_utilisateur, $hashedPassword, $email, $role_utilisateur]);

    try {
        $stmt->execute();
        if($stmt && $role_utilisateur==1){
            header('Location: dashbordhtml.php');
        }
        else if($stmt && $role_utilisateur==2){
            header('Location: dashbordclienthtml.php');
        }
        else if($stmt && $role_utilisateur==3){
            header('Location: dashbordfreelanceshtml.php');
        }
        else
            header('Location: test.html');

        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}





?>