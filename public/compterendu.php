<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mémoire";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des informations du patient depuis les paramètres de l'URL
$patient_id = isset($_GET['patient_id']) ? intval($_GET['patient_id']) : 0;
$type = isset($_GET['type']) ? $_GET['type'] : '';

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalp Atışi</title>
    <link rel="stylesheet" href="/public/css/bootstrap.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <script src="/public/js/bootstrap.js"></script>
    <script src="/public/js/bundel.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid nav-bar">
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg py-4">
                <a href="index.html" class="navbar-brand">
                    <h1 class="text fw-bold mb-0" style="color: #087990;">Kalp<span class="text-dark">Atışi</span></h1>
                </a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <a href="logout.php" class="btn py-2 px-4 d-none d-xl-inline-block rounded-pill" style="background-color:#087990a2; color:white;width: 140px;">Déconnecter</a>
                </div>
            </nav>
        </div>
    </div>
    <br>
    <div class="content">
        <h1 style="color: #087990;">Compte Rendu</h1>
        <div class="photo-content">
            <img src="/public/image/CompterenduRadio (1).jpg" alt="Photo du patient">
        </div>
        <form id="reportForm" method="POST" action="save_report.php">
            <label for="patientId">Numéro du patient :</label>
            <input type='text' id='patientId' name='patientId' value="<?= htmlspecialchars($patient_id); ?>" disabled readonly><br>

            <label for="examType">Type d'examen:</label><br>
            <input type="text" id="examType" name="examType" value="<?= htmlspecialchars($type); ?>" disabled readonly><br>

            <label for="radiography">Description:</label><br>
            <textarea id="radiography" name="radiography" rows="4" cols="50" required></textarea><br>

            <label for="conclusion">Conclusion :</label><br>
            <textarea id="conclusion" name="conclusion" rows="4" cols="50" required></textarea><br>
            <div class="float-end">
                <a href="javascript:window.print()" class="btn btn-success me-1" style="display: flex; justify-content: center;"><i class="fa fa-print"></i></a>
            </div>
        </form>
    </div>

    <style>
        .content {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            padding: 10px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="date"], select,
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #3CB371;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        .photo-content {
            text-align: center;
            margin-bottom: 20px;
        }

        .photo-content img {
            max-width: 500px;
            border-radius: 8px;
            margin-top: 10px;
        }
    </style>
</body>
</html>
