<?php
session_start();
require_once "connexion.php";
if(!isset($_SESSION['email']))
{
  header('Location: login.php');
  die;
}

$conn = mysqli_connect("localhost", "root", "", "mémoire");

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

// Requête pour récupérer les patients passés par le médecin
$medecin_id = 15; 
$get_seen_patients = mysqli_query($conn, "
  SELECT 
    consultation.id AS consultation_id,
    patient.id_patient,
    patient.nom,
    patient.prenom
  FROM 
    consultation
  INNER JOIN 
    patient 
  ON 
    consultation.id_patient = patient.id_patient
  WHERE 
    consultation.médecin = $medecin_id
");

?>

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
</head>
<body oncontextmenu='return false' class='snippet-body'>
     <!-- Navbar start -->
     <div class="container-fluid nav-bar">
        <div class="container">
            <div class="navbar navbar-light navbar-expand-lg py-4">
                <a href="index.php" class="navbar-brand"> 
                    <h1 class="text fw-bold mb-0" style="color: #087990;">Kalp<span class="text-dark">Atışi</span> </h1>
                </a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="index.php" class="nav-item nav-link" >Home</a>
                        <a href="aboutus.php" class="nav-item nav-link">À Propos</a>
                        <a href="Service.php" class="nav-item nav-link">Services</a>
                    </div> 
                    <a href="logout.php" class="btn py-2 px-4 d-none d-xl-inline-block rounded-pill" style="background-color:#087990a2; color:white;width: 140px;">Déconnecter</a>       
                </div>
            </div>
        </div>
        
    </div>
    <!-- Navbar end --> 
    <br>
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
        h3 {
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
        button {
            padding: 5px 10px;
            margin: 0 5px;
            cursor: pointer;
            border:none;
            background-color:#ccc;
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
        .btn-danger{
            width: 7rem;
            padding: 0.2rem; 
            text-align: center; 
        }
    </style>
<body>
    <h1 style="display: flex;justify-content: center;">Gestion des patients par infirmier</h1>
    <br>
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Rechercher...">
        <button onclick="searchTable()">Rechercher</button>
    </div>
    <div class="content">
    <h3>Tous les patients</h3>
        <table id="allPatientsTable">
            <thead>
                <tr>
                    <th>Nmr Patient</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
$get_pat = mysqli_query($conn, "SELECT * FROM `patient` WHERE etat='en attente'");
if(mysqli_num_rows($get_pat) > 0) {
    while($row = mysqli_fetch_assoc($get_pat)) {
        echo "<tr>
            <td>{$row['id_patient']}</td>
            <td>{$row['nom']}</td>
            <td>{$row['prenom']}</td>
            <td><a href='Evaluation.php?c={$row['id_patient']}' class='btn btn-custom' value='{$row['id_patient']}'>Evaluer</a></td>
        </tr>";
    }
}
?>
            </tbody>
        </table>
        <br>
        <h3>Les patients passés par le médecin</h3>
        <table id="seenPatientsTable">
            <thead>
                <tr>
                    <th>Nmr Patient</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <tr>
  <?php 
          if(mysqli_num_rows($get_seen_patients) > 0) {
            while($row=mysqli_fetch_assoc($get_seen_patients)) {
              echo "<tr>
                <td>$row[id_patient]</td>
                <td>$row[nom]</td>
                <td>$row[prenom]</td>
                <td><a href='details.php?id_patient={$row['id_patient']}' class='btn btn-custom' value='$row[id_patient]'>Voir Détails</a></td>
              </tr>";
            }
          }
    ?>
        </tr>
            </tbody>
        </table>
        <br>
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