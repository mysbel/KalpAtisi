<?php
require_once "connexion.php";
session_start();
$type=$_SESSION['type'];
if(!isset($_SESSION['email']))
{
  header('Location: login.php');
  die;
}else{
    if($type!=="infirmier"){
        header('Location: index.php');
    }
}
$conn = mysqli_connect("localhost", "root", "", "mémoire");

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

// Récupérer le nombre total de notifications pour l'utilisateur actuel
$TotalNotif = 0;
$sql = "SELECT COUNT(*) as total FROM notifications WHERE user_id='8' AND status='1'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $TotalNotif = $row["total"];
}
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
                    <a href="notification_inf.php">
    <svg class="icon-spacing" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="24" height="24">
        <path d="M18 8a6 6 0 1 0-12 0v5c0 .34-.1.66-.28.94L4 16h16l-1.72-2.06A1.992 1.992 0 0 1 18 13V8z"></path>
        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
    </svg>
</a>
<span class="icon-button__badge"><?php echo $TotalNotif; ?></span>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar end --> 
    <!-- Hero Start -->
    <header class="header">
        <div class="container">
            <div class="row align-items-center" style="width: 200%;display: flex;justify-content: space-between;">
                <h1>Bienvenue Cher infirmier</h1>
                <br><br><br><br><br>
                <div class="col-md-8" >
                    <img src="/public/image/infermiers.jpg" alt="image" class="img-fluid" style="height:400px;">
                </div>
                <div class="col-md-4">
                    <p>
                    Votre engagement et votre professionnalisme sont cruciaux pour garantir des soins efficaces et de qualité aux patients du service d'urgence. En collaborant étroitement avec l'équipe médicale, vous jouez un rôle essentiel dans l'organisation des soins et la gestion des flux de patients. Votre dévouement est une contribution précieuse à notre mission de fournir une assistance rapide et efficace aux personnes en situation d'urgence médicale.
                    </p>
                    <a href="Inf.php" class="btn py-2 px-4 d-none d-xl-inline-block rounded-pill" style="background-color:#087990a2; color: white;">Suivant</a>
                </div>
            </div>
        </div>
    </header>
    <style>
        .icon-spacing {
        margin-left: 10px; 
    }
    a svg.icon-spacing {
        vertical-align: middle; 
        color:  #087990a2;
    }
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

/*Style de l'icône de notification */
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
    </style>

<script>
    function updateNotificationBadge() {
            fetch('fetch_notification_count.php')
                .then(response => response.json())
                .then(data => {
                    document.querySelector('.icon-button__badge').textContent = data.total;
                })
                .catch(error => console.error('Error fetching notification count:', error));
        }

        updateNotificationBadge();
</script>

</body>
</html>
