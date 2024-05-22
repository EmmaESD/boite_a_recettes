<?php

session_start();

$connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");
//prepare request
$request = $connectDatabase->prepare("SELECT * FROM recipes where id = :id");


$request->bindParam(':id', $_GET['id']);
//execute request
$request->execute();

//fetch all data from table posts
$recipes = $request->fetchAll(PDO::FETCH_ASSOC);


$request = $connectDatabase->prepare("INSERT INTO recipes (name, ingredients, steps, image_url, author) VALUES (:name, :ingredients, :steps, :image_url, :author)");

$request->bindParam(':name', $recipes['0']['name']);
$request->bindParam(':ingredients', $recipes['0']['ingredients']);
$request->bindParam(':steps', $recipes['0']['steps']);
$request->bindParam(':image_url', $recipes['0']['image_url']);
$request->bindParam(':author', $recipes['0']['author']);

$request->execute();

header('Location: ../parts/post-list.php?success=Le post a bien été dupliqué');