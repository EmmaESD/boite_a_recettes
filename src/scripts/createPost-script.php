<?php 
session_start();

$connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");

$request = $connectDatabase->prepare("INSERT INTO recipes (name, ingredients, steps, image_url, author) VALUES (:name, :ingredients, :steps, :image_url, :author)");

$request->bindParam(':name', $_POST['name']);
$request->bindParam(':ingredients', $_POST['ingredients']);
$request->bindParam(':steps', $_POST['steps']);
$request->bindParam(':image_url', $_POST['image_url']);
$request->bindParam(':author', $_SESSION['username']);

$request->execute();

header('Location: ../parts/post-list.php?success=Nouvelle recette ajoutée !');
?>