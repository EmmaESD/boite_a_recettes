<?php
// connect to db
$connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");
// Récupérer les données de l'entrée existante
$stmt = $connectDatabase->prepare('SELECT * FROM recipes WHERE id = :id');
$stmt->bindParam(':id', $_GET['id']);
$entry = $stmt->fetch(PDO::FETCH_ASSOC);

if ($entry) {
    // Supprimer l'ID pour éviter les conflits lors de l'insertion
    unset($entry['id']);

    // Préparer les colonnes et les valeurs pour l'insertion
    $columns = implode(", ", array_keys($entry));
    $placeholders = implode(", ", array_fill(0, count($entry), '?'));
    $values = array_values($entry);

    // Insérer la nouvelle entrée
    $insertStmt = $connectDatabase->prepare("INSERT INTO recipes ($columns) VALUES ($placeholders)");
    $insertStmt->execute($values);
    

    // Récupérer l'ID de la nouvelle entrée
    $newEntryId = $connectDatabase->lastInsertId();
    header('Location: ../parts/post-list.php');
    echo "Nouvelle entrée clonée avec l'ID : " . $newEntryId;
} else {
    echo "Entrée originale non trouvée.";
}

?>


