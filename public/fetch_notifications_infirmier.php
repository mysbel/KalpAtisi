<?php
// Inclure votre fichier de connexion à la base de données
require_once 'connexion.php';
// Préparer la déclaration SQL pour récupérer les notifications
$sql = "SELECT n.id, n.title, p.salle, p.nom, p.prenom
        FROM notifications n
        INNER JOIN patient p ON n.id_patient = p.id_patient
        WHERE n.user_id='8' AND n.status='1'";


$result = $conn->query($sql);

$notifications = [];

if ($result->num_rows > 0) {
    // Récupérer chaque ligne de résultat
    while ($row = $result->fetch_assoc()) {
        $notifications[] = $row;
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Aucune notification trouvée']);
    exit();
}

// Fermer la connexion à la base de données
$conn->close();

echo json_encode($notifications);
?>