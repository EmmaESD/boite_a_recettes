<?php
session_start();

$connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");

$request = $connectDatabase->prepare("INSERT INTO posts (user_id, title, ingredients, content, image_url) VALUES (:user_id, :title, :ingredients, :content, :image_url)");

$request->bindParam(':user_id', $_SESSION['user_id']);
$request->bindParam(':title', $_POST['title']);
$request->bindParam(':ingredients', $_POST['ingredients']);
$request->bindParam(':content', $_POST['content']);
$request->bindParam(':image_url', $_POST['image_url']);

$request->execute();

header('Location: ../userPage.php?success=Nouvelle recette ajoutée !');