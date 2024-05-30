<?php
require_once "connexion.php"; 

$conn = mysqli_connect("localhost", "root", "", "mémoire");

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

$sql = "SELECT n.id, n.title, p.salle
        FROM notifications n
        INNER JOIN patient p ON n.id_patient = p.id;
        //*WHERE n.user_id='8' AND n.status='1'"**//

$result = mysqli_query($conn, $sql);

$notifications = array();
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $notifications[] = $row;
    }
}

echo json_encode($notifications);
?>
