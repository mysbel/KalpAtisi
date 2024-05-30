<?php
session_start();
$type = $_SESSION['type'];
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    die;
} else {
    if ($type !== "radiologue") {
        header('Location: index.php');
        die;
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
        WHERE o.type IN ('Scanner', 'Radio', 'I.R.M', 'Echographie')";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalp Atışi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
            margin: 0 auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
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
    <h1>Espace Radiologue</h1>
    <br>
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Rechercher...">
        <button onclick="searchTable()">Rechercher</button>
    </div>
    <br>
    <table>
        <thead>
            <tr>
                <th>Patient</th>
                <th>Date</th>
                <th>Type d'examen</th>
                <th>Rapport</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="radiologyTable">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["nom"] . " " . $row["prenom"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["type"] . "</td>";
                    echo "<td>" . $row["rapport"] . "</td>";
                    echo "<td><a href='compterendu.php?patient_id=" . $row["id_patient"] . "&date=" . $row["date"] . "&type=" . $row["type"] . "' class='btn btn-custom'>Rédiger</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Aucun résultat trouvé</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>

    <script>
        function searchTable() {
            let input = document.getElementById('searchInput').value.toUpperCase();
            let table = document.getElementById('radiologyTable');
            let tr = table.getElementsByTagName('tr');
            for (let i = 0; i < tr.length; i++) {
                let td = tr[i].getElementsByTagName('td');
                let match = false;
                for (let j = 0; j < td.length; j++) {
                    if (td[j] && td[j].innerHTML.toUpperCase().indexOf(input) > -1) {
                        match = true;
                        break;
                    }
                }
                tr[i].style.display = match ? '' : 'none';
            }
        }
    </script>
</body>
</html>
