<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalp Atışi</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap' rel='stylesheet'>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
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
    </style>
</head>
<body>
    <!-- Navbar start -->
    <div class="container-fluid nav-bar">
        <div class="container">
            <div class="navbar navbar-light navbar-expand-lg py-4">
                <a href="index.php" class="navbar-brand"> 
                    <h1 class="text fw-bold mb-0" style="color: #087990;">Kalp<span class="text-dark">Atışi</span></h1>
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
            <a href="ticket.php" class="btn py-2 px-4 d-none d-xl-inline-block rounded-pill" style="background-color:#087990a2; color:white;width: 160px;">Inscrire Patient</a>
        </div>
    </div>
    <!-- Navbar end -->
    <br>
    <h1 style="display: flex;justify-content: center;">Statut des patients</h1>
    <br>
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Rechercher...">
        <button onclick="searchTable()">Rechercher</button>
    </div>
    <div class="content">
        <table id="allPatientsTable">
            <thead>
                <tr>
                    <th>Nmr Patient</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "mémoire";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT id_patient, nom, prenom, statut FROM patient";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Affichage des données de chaque ligne
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id_patient"]. "</td>
                                <td>" . $row["nom"]. "</td>
                                <td>" . $row["prenom"]. "</td>
                                <td>" . $row["statut"]. "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucun patient trouvé</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <script>
        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>