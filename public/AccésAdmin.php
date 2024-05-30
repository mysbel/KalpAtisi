<?php
session_start();
$type=$_SESSION['type'];
if(!isset($_SESSION['email']))
{
  header('Location: login.php');
  die;
}else{
    if($type!=="administrateur"){
        header('Location: index.php');
    }
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
    <!-- Hero Start -->
    <header class="header">
        <div class="container">
            <div class="row align-items-center" style="width: 200%;display: flex;justify-content: space-between;">
                <h1 >Bienvenue Cher administrateur</h1>
                <br><br><br><br><br><br><br>
                <div class="col-md-8" >
                    <img src="/public/image/administrationn.png" alt="image" class="img-fluid" style="height:270px;">
                </div>
                <div class="col-md-4">
                    <p>
                    Votre rôle au sein de notre service d'urgence est essentiel pour assurer une prise en charge efficace des patients. En supervisant les ressources, organisant les flux de patients, et en respectant les normes professionnelles, vous contribuez directement à la qualité des soins. Votre dévouement et votre professionnalisme sont précieux, et nous sommes convaincus que votre contribution sera déterminante pour le bon fonctionnement de notre service.
                    </p>
                    <a href="Adminstr.php" class="btn py-2 px-4 d-none d-xl-inline-block rounded-pill" style="background-color:#087990a2; color: white;">Suivant</a>
                </div>
            </div>
        </div>
    </header>
</body>
</html>
