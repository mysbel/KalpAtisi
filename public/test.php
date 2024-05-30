
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $idt = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $naissance = $_POST['naissance'];
    $sexe = $_POST['sexe'];
    $adresse = $_POST['adresse'];
    $tel = $_POST['tel'];
    $salle = $_POST['salle'];

}
    // Connexion à la base de données
    $conn = mysqli_connect("localhost", "root", "", "mémoire");

    // Vérifier la connexion
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Préparer la requête d'insertion
    $sql = "INSERT INTO patient (id_patient, nom, prenom, naissance, sexe, adresse, tel, salle) 
            VALUES ('$idt', '$nom', '$prenom', '$naissance', '$sexe', '$adresse', '$tel', '$salle')";

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
