<?php
// fetch_notifications_med.php

require_once 'connexion.php';

$sql = "SELECT n.id, n.title, p.salle, p.nom, p.prenom
        FROM notifications n
        INNER JOIN evaluation e ON n.id_patient = e.id_patient
        INNER JOIN patient p ON e.id_patient = p.id_patient
        WHERE n.user_id='15' AND n.status='2'";

$result = $conn->query($sql);

$notifications = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $notifications[] = $row;
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Aucune notification trouvée']);
    exit();
}

$conn->close();

echo json_encode($notifications);
?>