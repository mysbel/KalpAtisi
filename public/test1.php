<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $fullName = $_POST['fullName'];
    $age = $_POST['age'];
    $gender = $data['sexe'];
    $medicalHistory = $_POST['medicalHistory'];
    $medications = $_POST['medications'];
    $diabet=$_POST['diabete'];
    $allergie=$_POST['allergie'];
    $attention=$_POST['attention'];
    $code=$data['id'];

}  
    // Connexion à la base de données
    $conn = mysqli_connect("localhost", "root", "", "mémoire");

    // Vérifier la connexion
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Préparer la requête d'insertion
    $sql3=mysqli_query($conn,"INSERT INTO `evaluation`(`tension`, `diabete`, `allergie`, `antecedents`, `medicament`, `id_patient`) VALUES 
    ('$attention','$diabet','$allergie','$medicalHistory','$medications','$code')");

    // Exécuter la requête
    if (mysqli_query($conn, $sql)) {
        echo "Enregistrement réussi";
    } else {
        echo "Erreur d'enregistrement: " . $sql . "<br>" . mysqli_error($conn);
    }





     // Préparer la requête d'insertion
     $sql = "INSERT INTO notifications (user_id, id_patient, status) 
     VALUES ('1', '$idt', '1')";

    // Exécuter la requête
    if (mysqli_query($conn, $sql)) {
        echo "Enregistrement réussi !!!!!!!!!!!!";
    } else {
        echo "Erreur d'enregistrement: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
