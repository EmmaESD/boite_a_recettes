<?php

$connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");

$request = $connectDatabase->prepare("INSERT INTO user(pseudo) VALUES (:pseudo)");

$request->bindParam(':pseudo', $_POST['pseudo']);

$request->execute();

if(!$_POST['pseudo']){
    session_start();
    header('Location: ../index.php?error=Veuillez entrer un pseudo');
    
} else {
    $_SESSION['user_id'] = $_POST['pseudo'];
    header('Location: ../userPage.php?success=Bienvenue');
}

?>