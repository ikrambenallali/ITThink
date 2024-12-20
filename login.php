<?php
require_once "config.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email=?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    try {
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['mot_de_passe'])) {
            session_start();
            $_SESSION['user_id'] = $user['id_utilisateur'];
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $user['role'];


            if ($user['role'] == 1) {
                header('Location: dashbordhtml.php');
            } elseif ($user['role'] == 2) {
                header('Location: dashbordclient.html');
            } elseif ($user['role'] == 3) {
                header('Location: dashbordfreelances.html');
            }
            exit;
        }
    } catch (PDOException $e) {
        echo 'Database error: ' . $e->getMessage();
    }
}
?>
