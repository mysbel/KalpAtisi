<?php
session_start();
require_once "connexion.php";

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    die;
}

if (isset($_GET['c']) && !empty($_GET['c'])) {
    $c = $_GET["c"];
} else {
    die("No patient ID provided.");
}
if (isset($_POST['save'])) {
    $symptome = htmlspecialchars($_POST["symptoms"]);
    $diagnostic = htmlspecialchars($_POST["diagnosis"]);
    $id_patient = $c; 
    $id_medecin = $_SESSION['id'];
  
    $date = date("Y-m-d H:i:s");

    $d = mysqli_query($conn, "INSERT INTO `consultation`(`symptome`, `diagnostic`, `date`, `id_patient`, `médecin`) VALUES ('$symptome','$diagnostic','$date','$id_patient','$id_medecin')");

    if ($d) {
        $chez_medecin = 'chez le médecin';
        $med = mysqli_query($conn, "UPDATE `patient` SET `statut` = '$chez_medecin' WHERE `id_patient` = '$id_patient'");

        if ($med) {
            header("Location: Consultation.php?c=$id_patient");
            die;
        } else {
            echo "Error updating patient status: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting consultation: " . mysqli_error($conn);
    }
    
}
if(isset($_POST['liberer'])){
    $liberer='libérer';
    $chez=mysqli_query($conn, "UPDATE `patient` SET `statut` = '$liberer' WHERE `id_patient` = '$c'");
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalp Atışi</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="/public/js/bootstrap.js">
    <link rel="stylesheet" href="/public/js/bundel.js">
    <link rel="stylesheet" href="css/style.css">
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
                    <a href="logout.php" class="btn py-2 px-4 d-none d-xl-inline-block rounded-pill" style="background-color:#087990a2; color:white;width: 140px;">Déconnecter</a>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar end -->
    <br>
    <br>
    <div id="notification" class="alert alert-success" style="display: none; text-align: center;">Le patient est libéré avec ordonnance</div>
    <h1>Consultation Patient</h1>
    <div class="content">
        <form method="POST" action="#">
            <div class="form-group">
                <label for="symptoms">Symptômes:</label>
                <textarea id="symptoms" name="symptoms" class="form-control" required></textarea>
            </div>
            <input type="hidden" name="c" value="<?= htmlspecialchars($_GET['c']); ?>">
            <div class="form-group">
                <label for="diagnosis">Diagnostic:</label>
                <textarea id="diagnosis" name="diagnosis" class="form-control" required></textarea>
            </div> 
            <br>
            <div class="btnform" style="display: flex; justify-content: center;">
                <button id="btn-libérer" type="submit" class="btn btn-primary" name="liberer">Libérer</button>
                <button type="submit" name="save" class="btn btn-primary">Enregistrer</button>&nbsp;&nbsp;
                <a class="btn btn-primary" href="Orientation.php?c=<?= $c ?>">Suivant</a>
            </div>
        </form>
    </div>
    
    <br><br><br><br><br>
    <!-- Footer Start -->
    <div class="container-fluid footer py-6 my-6 mb-0 bg-light wow bounceInUp" data-wow-delay="0.1s" >
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h1 class="text">Kalp<span class="text-dark">Atışi</span></h1>
                        <p class="lh-lg mb-4">Le service d'urgence de notre hôpital offre une assistance médicale immédiate et efficace, avec une équipe spécialisée et des soins de haute qualité centrés sur le patient.</p>
                        <div class="footer-icon d-flex">
                            <a class="btn btn-sm-square me-2 rounded-circle" style="background-color:#087990; color: white;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square me-2 rounded-circle" style="background-color:#087990; color: white;"ref="#"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn btn-sm-square me-2 rounded-circle" style="background-color:#087990; color: white;"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="btn btn-sm-square rounded-circle" style="background-color:#087990; color: white;"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="mb-4">Services</h4>
                        <div class="d-flex flex-column align-items-start">
                            <a class="text-body mb-3" href=""><i class="fa fa-check text me-2" style="color: #087990;"></i>Pneumologie</a>
                            <a class="text-body mb-3" href=""><i class="fa fa-check text me-2" style="color: #087990;"></i>Traumatologie</a>
                            <a class="text-body mb-3" href=""><i class="fa fa-check text me-2" style="color: #087990;"></i>ORL</a>
                            <a class="text-body mb-3" href=""><i class="fa fa-check text me-2" style="color: #087990;"></i>Ophtalmologie</a>
                            <a class="text-body mb-3" href=""><i class="fa fa-check text me-2" style="color: #087990;"></i>cardiologie</a>
                            <a class="text-body mb-3" href=""><i class="fa fa-check text me-2" style="color: #087990;"></i>Pédiatrie</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="mb-4">Contactez-Nous</h4>
                        <div class="d-flex flex-column align-items-start">
                            <p><i class="fa fa-map-marker-alt text me-2" style="color: #087990;"></i> Yeşilköy, 34149 Istanbul, Turquie.</p>
                            <p><i class="fa fa-phone-alt text me-2" style="color: #087990;"></i> (+90) 212 463 63 63 / <br>                                                               (+33) 1 579 79 849</p>
                            <p><i class="fas fa-envelope text me-2" style="color: #087990;"></i>Kalpatışi@gmail.com</p>
                            <p><i class="fa fa-clock text me-2" style="color: #087990;"></i> 24/7 Hours Service</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="mb-4" >Galerie Sociale</h4>
                        <div class="row g-2">
                            <div class="col-4">
                                 <img src="image/About us/pexels-anna-shvets-3845126.jpg" class="img-fluid rounded-circle " alt="">
                            </div>
                            <div class="col-4">
                              <img src="image/About us/pexels-amornthep-srina-1164531.jpg" class="img-fluid rounded-circle" alt="">
                         </div>
                            <div class="col-4">
                              <img src="image/About us/2.jpg" class="img-fluid rounded-circle" alt="">
                              </div>
                              <div class="col-4">
                                <img src="image/About us/istockphoto-942403276-612x612.jpg" class="img-fluid rounded-circle " alt="">
                              </div>
                              <div class="col-4">
                                <img src="image/About us/matériel.jpg" class="img-fluid rounded-circle" alt="">
                              </div>
                              <div class="col-4">
                                <img src="image/About us/female-doc-with-other-docs.jpg" class="img-fluid rounded-circle" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
<style>
.btnform {
    display: flex;
    justify-content: center;
    width: 100%;
}

.btnform button {
    margin-left: 1rem;
}

.content {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

.form-group {
    margin-bottom: 20px;
}

.form-group textarea {
    width: 100%;
    height: 100px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.btn-primary {
    background-color: #087990;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 8px 10px;
    cursor: pointer;
    transition: background-color 0.3s;
    text-align: center;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const btnLibérer = document.querySelector('#btn-libérer');
    const notification = document.querySelector('#notification');

    btnLibérer.addEventListener('click', function() {
        notification.style.display = 'block';
        setTimeout(function() {
            notification.style.display = 'none';
        }, 3000); // La notification disparaîtra après 3 secondes
    });
});
</script>
</body>
</html>