<?php
session_start();
require_once "connexion.php";
if(!isset($_SESSION['email']))
{
  header('Location: login.php');
  die;
}

if(isset($_GET['c'])&& !empty($_GET['c']))
{
    $c = $_GET['c'];
}


if(isset($_POST['valider']))
{
    $id_medecin=$_SESSION['id'];
    $id_patient=$c;
    $resultat=$_POST['resultat'];
    $type="I.R.M";
    $date=date("Y-m-d H:i:s");


    $insert=mysqli_query($conn,"INSERT INTO `orientation`(`type`, `rapport`, `date`, `patient`, `médecin`) VALUES
     ('$type','$resultat','$date','$id_patient','$id_medecin')");
     $chez='Orienté vers le radiologue';
     $update_statut = mysqli_query($conn, "UPDATE `patient` SET `statut` = '$chez' WHERE `id_patient` = '$c'");

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
                    <h1 class="text fw-bold mb-0" style="color: #087990;";>Kalp<span class="text-dark">Atışi</span> </h1>
                </a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                </div> <a href="logout.php" class="btn py-2 px-4 d-none d-xl-inline-block rounded-pill" style="background-color:#087990a2; color:white;width: 140px;">Déconnecter</a>
                    </div>
                </div>
                </div>
            <!--Navbar end --> 
            <br>
            <h1>I.R.M</h1>
            <form action="" method="post">
            <div class="card">
                <img src="/public/image/irm.jpg" alt="Image" class="round-image">
                <textarea id="userInput" name="resultat" placeholder="EVeuillez entrez le type d'irm"></textarea>
                <br>
                <button  name="valider" id="showNotificationButton">Valider</button>
                <div class="notification" id="topNotification">
                    IRM Valider ! 
                </div>
            </div>
            </form>
            <br><br><br><br><br><br><br>
            <style>
                .notification {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 15px 25px;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
            z-index: 999;
        }

        .notification.show {
            opacity: 1;
            visibility: visible;
        }
                .card {
    margin: 10px auto;
    width: 500px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
}
h1 {
            text-align: center;
            color: rgba(178, 34, 34, 0.755);
            font-size: 50px;
        }
        .round-image {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    margin-bottom: 10px;
    display: flex;

}

textarea {
    width: 100%;
    height: 200px;
    margin-top: 15px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background-color: #087990;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}
            </style>
<script>
    const showNotificationButton = document.getElementById('showNotificationButton');
    const topNotification = document.getElementById('topNotification');

    showNotificationButton.addEventListener('click', () => {
        topNotification.classList.add('show');
        setTimeout(() => {
            topNotification.classList.remove('show');
        }, 3000); // La notification disparaîtra après 3 secondes
    });
</script>
</body>
</html>