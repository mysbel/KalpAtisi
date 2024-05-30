<?php
session_start();
require_once "connexion.php";
if(!isset($_SESSION['email']))
{
  header('Location: login.php');
  die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalp Atışi</title>
    <link rel="stylesheet" href="/public/css/bootstrap.css">
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
            <nav class="navbar navbar-light navbar-expand-lg py-4">
                <a href="index.php" class="navbar-brand">
                    <h1 class="text fw-bold mb-0" style="color: #087990;">Kalp<span class="text-dark">Atışi</span></h1>
                </a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="aboutus.php" class="nav-item nav-link">À Propos</a>
                        <a href="Service.php" class="nav-item nav-link">Services</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!--Navbar end -->
    <br><br><br><br><br><br><br>
    <div class="ticket">
        <form>
            <div class="ticket-info">
                <p>Numéro de ticket : <span id="num"></span></p>
                <p>Date : <span id="date"></span></p>
                <p>Heure : <span id="time"></span></p>
            </div>
        </form>
    </div>
    <button id="printButton" onclick="window.print()"> Imprimer </button>
<a href="FormuPatient.php" class="btn" style="position: fixed; bottom: 200px; right: 20px; background-color: green;color:white;">Suivant</a>


    <style>
        form{
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 2rem;
        
        }
        #printButton{
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            margin: 10px auto;
        
        }
        .ticket {
            background-color: #08799036;
            padding: 20px;
            width: 500px;
            margin: 10px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .ticket-info {
        
            text-align: center;
    
        }
        
        .ticket-info p {
            margin: 5px 0;
        }
        
        .ticket-info p span {
            font-weight: bold;
            color: #333;
        }
    </style>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Générer un numéro de ticket aléatoire 
        var ticketNumber = Math.floor(Math.random() * 1000) + 1;
        document.getElementById('num').innerText = ticketNumber;

        // Obtenir la date actuelle
        var currentDate = new Date();
        var day = currentDate.getDate();
        var month = currentDate.getMonth() + 1;
        var year = currentDate.getFullYear();
        var dateStr = day + "/" + month + "/" + year;
        document.getElementById('date').innerText = dateStr;

        // Obtenir l'heure actuelle
        var hours = currentDate.getHours();
        var minutes = currentDate.getMinutes();
        var timeStr = hours + ":" + (minutes < 10 ? '0' : '') + minutes;
        document.getElementById('time').innerText = timeStr;
    });
</script>

</body>
</html>
