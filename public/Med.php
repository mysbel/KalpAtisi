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
    <link rel="stylesheet" href="/public/js/bootstrap.js">
    <link rel="stylesheet" href="/public/js/bundel.js">
    <link rel="stylesheet" href="/public/css/style.css">
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>  <!-- Navbar start -->
    <div class="container-fluid nav-bar">
       <div class="container">
           <nav class="navbar navbar-light navbar-expand-lg py-4">
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
           </nav>
       </div>
   </div>
   <!-- Navbar end --> 
  
   <br>
   <h1 style="display: flex;justify-content: center;">Gestion des patients par médecin </h1>
  <br><br>
  <div class="search-container">
    <input type="text" id="searchInput" placeholder="Rechercher...">
    <button onclick="searchTable()">Rechercher</button>
</div>
  <h3>Tous les patients</h3>
  <table id="allPatientsTable">
    <thead>
        <tr>
          <th>Nmr Patient</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Diabete</th>
            <th>Allergie</th>
            <th>Antecedents</th>
            <th>Medicament</th>
            

            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <?php 

          $get_patient=mysqli_query($conn,"SELECT e.*, p.* FROM `evaluation` e JOIN `patient` p ON e.id_patient=p.id_patient");

          if(mysqli_num_rows($get_patient )> 0) {
            while($row=mysqli_fetch_assoc($get_patient))
            {
              echo " <tr>
                <td>$row[id_patient]</td>
                <td>$row[nom]</td>
                <td>$row[prenom]</td>
                <td>$row[diabete]</td>
                <td>$row[allergie]</td>
                <td>$row[antecedents]</td>
                <td>$row[medicament]</td>
                
                
                <td><a href='Consultation.php?c=$row[id_patient]' class='btn btn-custom' value='$row[id_patient]'>Consulter</a></td>
                


                </tr>";
            }
          }

        ?>


      </tr>
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
</body>
</html>
<style>
.badge {
    background-color: #ff4d4d; 
    color: white; 
    border-radius: 50%; 
    padding: 5px 8px; 
    font-size: 12px; 
    position: absolute; 
    top: 0; 
    right: 0;
    transform: translate(50%, -50%);
    transition: transform 0.3s ease-in-out;
}

#bell {
    position: relative;
    display: inline-block; 
}

.badge.new-notification {
    animation: pulse 0.5s infinite alternate;
}

@keyframes pulse {
    from {
        transform: scale(1);
    }
    to {
        transform: scale(1.2);
    }
}

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
