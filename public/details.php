<?php
session_start();
require_once "connexion.php";

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    die;
}

$conn = mysqli_connect("localhost", "root", "", "mémoire");

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

// Récupérer l'ID du patient depuis l'URL et valider qu'il s'agit bien d'un entier
$id_patient = isset($_GET['id_patient']) ? (int) $_GET['id_patient'] : 0;

if ($id_patient <= 0) {
    die("ID de patient non valide.");
}

// Préparer et exécuter la requête de manière sécurisée
$patient_query = $conn->prepare("
    SELECT 
        p.id_patient, p.nom, p.prenom, p.naissance, p.sexe, p.adresse, p.tel, p.salle,
        e.tension, e.diabete, e.allergie, e.antecedents, e.medicament,
        c.symptome, c.diagnostic
    FROM 
        patient p
    LEFT JOIN 
        evaluation e ON p.id_patient = e.id_patient
    LEFT JOIN 
        consultation c ON p.id_patient = c.id_patient
    WHERE 
        p.id_patient = ?
");

$patient_query->bind_param("i", $id_patient);
$patient_query->execute();
$patient_result = $patient_query->get_result();

if ($patient_result->num_rows == 0) {
    die("Aucun patient trouvé avec cet ID.");
}

$patient = $patient_result->fetch_assoc();
$get_orientation = mysqli_query($conn, "SELECT * FROM orientation WHERE patient='$id_patient' LIMIT 1");
if (mysqli_num_rows($get_orientation) > 0) {
    $etat = "Orienté";
} else {
    $etat = "Libéré";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du patient</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="/public/js/bootstrap.js">
    <link rel="stylesheet" href="/public/js/bundel.js">
    <link rel="stylesheet" href="/public/css/style.css">
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
   <!-- Navbar start -->
   <div class="container-fluid nav-bar">
        <div class="container">
            <div class="navbar navbar-light navbar-expand-lg py-6">
                <a href="index.php" class="navbar-brand">
                    <h1 class="text fw-bold mb-0 " style="color: #087990;">Kalp<span class="text-dark">Atışi</span> </h1>
                </a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="aboutus.php" class="nav-item nav-link">À Propos</a>
                        <a href="Service.php" class="nav-item nav-link">Services</a>
                    </div>
                    <a href="logout.php" class="btn py-2 px-4 d-none d-xl-inline-block rounded-pill" style="background-color:#087990a2; color:white;width: 140px;">Déconnecter</a> 
                </div>
            </div>
            <div class="float-end">
                        <a href="javascript:window.print()" class="btn btn-success me-1" style="display: flex;justify-content: center;"><i class="fa fa-print"></i></a>
                    </div>
        </div>
    </div>
    <!-- Navbar end -->
    <div class="container mt-5">
        <h1>Détails du patient</h1>
        <table class="table table-bordered">
            <tr>
                <th>Nmr Patient</th>
                <td><?= htmlspecialchars($patient['id_patient']) ?></td>
            </tr>
            <tr>
                <th>Nom</th>
                <td><?= htmlspecialchars($patient['nom']) ?></td>
            </tr>
            <tr>
                <th>Prénom</th>
                <td><?= htmlspecialchars($patient['prenom']) ?></td>
            </tr>
            <tr>
                <th>Âge</th>
                <td><?= date_diff(date_create($patient['naissance']), date_create('today'))->y ?> ans</td>
            </tr>
            <tr>
                <th>Sexe</th>
                <td><?= htmlspecialchars($patient['sexe']) ?></td>
            </tr>
            <tr>
                <th>Tension</th>
                <td><?= htmlspecialchars($patient['tension']) ?></td>
            </tr>
            <tr>
                <th>Diabète</th>
                <td><?= htmlspecialchars($patient['diabete']) ?></td>
            </tr>
            <tr>
                <th>Allergie</th>
                <td><?= htmlspecialchars($patient['allergie']) ?></td>
            </tr>
            <tr>
                <th>Antécédents Médicaux</th>
                <td><?= htmlspecialchars($patient['antecedents']) ?></td>
            </tr>
            <tr>
                <th>Médicaments Pris</th>
                <td><?= htmlspecialchars($patient['medicament']) ?></td>
            </tr>
            <tr>
                <th>Symptômes</th>
                <td><?= htmlspecialchars($patient['symptome']) ?></td>
            </tr>
            <tr>
                <th>Diagnostic</th>
                <td><?= htmlspecialchars($patient['diagnostic']) ?></td>
            </tr>
            <tr>
                <th>État du patient</th>
                <td><?= htmlspecialchars($etat) ?></td>
            </tr>
        </table>
    </div>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 10px; 
            overflow: hidden;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        hr {
            border: 0;
            clear: both;
            display: block;
            width: 96%;
            background-color: #ddd;
            height: 1px;
            margin: 20px auto;
        }
    </style>
</body>
</html>
