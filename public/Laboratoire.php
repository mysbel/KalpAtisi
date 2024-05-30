<?php
session_start();
$type=$_SESSION['type'];
if(!isset($_SESSION['email']))
{
  header('Location: login.php');
  die;
}else{
    if($type!=="laborantin"){
        header('Location: index.php');
    }
}
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mémoire";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Exécution de la requête
$sql = "SELECT o.id, o.type, o.rapport, o.date, p.id_patient, p.nom, p.prenom
        FROM orientation o
        JOIN patient p ON o.patient = p.id_patient
        WHERE o.type IN ('Analyse')";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalp Atışi</title>
    <link rel="stylesheet" href="/public/css/bootstrap.css">
    <link rel="stylesheet" href="/public/js/bootstrap.js">
    <link rel="stylesheet" href="/public/js/bundel.js">
    <link rel="stylesheet" href="/public/css/style.css">
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
    
        body {
            font-family: Arial, sans-serif;
        }
        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .search-container input[type=text] {
            padding: 5px;
            margin-right: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .search-container button {
            padding: 5px 10px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            background-color: #087990;
            color: white;
        }
        h1{
            text-align: center;
            color: #087990;
        }
        h2{
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        /* Styles pour les boutons */
        button {
            padding: 5px 10px;
            margin: 0 5px;
            cursor: pointer;
            border: none;
            color: white;
            border-radius: 3px;
        }
        .btn-custom {
            background-color: #087990a2;
            color: white;
            width: 7rem;
            padding: 0.2rem; 
            text-align: center; 
        }
        .btn-custom:hover {
            background-color: #087990a2; 
            color: white;

        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sélectionner tous les boutons "Valider" et "Supprimer"
            const validerButtons = document.querySelectorAll('.valider-btn');
            const supprimerButtons = document.querySelectorAll('.supprimer-btn');
            
            validerButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    row.style.backgroundColor = 'lightgreen';
                });
            });

            supprimerButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    row.style.backgroundColor = 'lightcoral';
                    setTimeout(() => {
                        row.style.display = 'none';
                    }, 500); // délai de 500 ms avant de masquer la ligne
                });
            });
        });
    </script>
</head>
<body>
    <!-- Navbar start -->
    <div class="container-fluid nav-bar">
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg py-4">
                <a href="index.php" class="navbar-brand">
                    <h1 class="text fw-bold mb-0" style="color: #087990;">Kalp<span class="text-dark">Atışi</span></h1>
                </a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="logout.php" class="btn py-2 px-4 d-none d-xl-inline-block rounded-pill" style="background-color:#087990a2; color:white;width: 140px;">Déconnecter</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!--Navbar end -->
    <br>
    <header>
        <h1 >Espace Laborantin</h1>
        <br>
    </header>
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Rechercher...">
        <button onclick="searchTable()">Rechercher</button>
    </div>
    <br>
        <table class="mx-auto">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Type d'examen</th>
                    <th>Analyses Choisies</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="examList">
                <?php
                if ($result->num_rows > 0) {
                    // Sortie des données de chaque ligne
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["nom"] . "</td>
                                <td>" . $row["prenom"] . "</td>
                                <td>" . $row["type"] . "</td>
                                <td>" . $row["rapport"] . "</td>
                                <td>" . $row["date"] . "</td>
                                <td><a href='compterendu.php?patient_id=" . $row["id_patient"] . "&date=" . $row["date"] . "&type=" . $row["type"] . "' class='btn btn-custom'>Rédiger</a></td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Aucun examen trouvé</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </section>
    <br><br>
</body>
</html>
