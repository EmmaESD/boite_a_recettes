<?php
// connect to db
$connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");
// prepare request
$request = $connectDatabase->prepare("DELETE FROM recipes WHERE id = :id");
// bind param
$request->bindParam(':id', $_GET['id']);
// execute request
$request->execute();

header('Location: ../parts/post-list.php');
?>