<?php

// Inclure votre fichier de connexion à la base de données
require_once 'connexion.php';

// Récupérer les données de la requête POST
$data = json_decode(file_get_contents('php://input'), true);
$notificationID = $data['id'];

if ($notificationID) {
    // Préparer la déclaration SQL pour supprimer la notification
    $stmt = $conn->prepare("DELETE FROM notifications WHERE id = ?");
    $stmt->bind_param("i", $notificationID);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Erreur lors de la suppression de la notification']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'error' => 'ID de notification invalide']);
}

$conn->close();
?>
