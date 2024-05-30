<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $idt = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $naissance = $_POST['naissance'];
    $sexe = $_POST['sexe'];
    $adresse = $_POST['adresse'];
    $tel = $_POST['tel'];
    $salle = $_POST['salle'];

   
    $conn = mysqli_connect("localhost", "root", "", "mémoire");

    // Vérifier la connexion
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Vérifier si l'ID existe déjà
    $check_id_query = "SELECT id_patient FROM patient WHERE id_patient='$idt'";
    $result = mysqli_query($conn, $check_id_query);
    $dans_la_salle='dans la salle';
    
    if (mysqli_num_rows($result) > 0) {
        echo "Erreur : L'ID patient existe déjà.";
    } else {
        // Préparer la requête d'insertion pour le patient
        $sql_patient = "INSERT INTO patient (id_patient, nom, prenom, naissance, sexe, adresse, tel, salle,statut) 
                        VALUES ('$idt', '$nom', '$prenom', '$naissance', '$sexe', '$adresse', '$tel', '$salle','$dans_la_salle')";

        // Exécutution du requête
        if (mysqli_query($conn, $sql_patient)) {
            // Préparer la requête d'insertion pour les notifications
            $sql_notification = "INSERT INTO notifications (user_id, id_patient, id_recepteur, status) 
                                 VALUES ('8', '$idt', '8', '1')";

            // Exécuter la requête
            if (mysqli_query($conn, $sql_notification)) {
                // Redirection après succès
                header("Location: Adminstr.php");
                exit();
            } else {
                echo "Erreur d'enregistrement: " . $sql_notification . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Erreur d'enregistrement: " . $sql_patient . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
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
        <h1 >Formulaire Patient</h1>
        <br>
            <div class="content">
                <form method="POST">
                    <img id="photo" src="/public/image/patient.jpg" alt="Formulaire">
                    <input type="text" name="id" placeholder="ID patient" required>
                    <input type="text" name="nom" placeholder="Nom" required>
                    <input type="text" name="prenom" placeholder="Prénom" required>
                    <input type="date" name="naissance" placeholder="Date de naissance" required>
                    <input type="number" name="salle" placeholder="Salle">
                    <select name="sexe">
                        <option disabled selected>Sexe</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                    <input type="text" name="adresse" placeholder="Adresse" required>
                    <input type="tel" name="tel" placeholder="Numéro de téléphone" required>
                    <br><br>
                    <button type="submit">Enregistrer</button>
                </form>
                
            </div>
            <br> <br> <br>
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
        h1 {
            text-align: center;
            color: black;
            font-weight: bold;
            font-size: 50px;
        }
         .content{
        background-color:#fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 50%;
        text-align: center;
        border-radius: 2rem;
    }


    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 2rem;
        
    }

    input, select {
        width: calc(100% - 40px);
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        box-sizing: border-box;
        border: 1px solid #087990;
    }

    button {
        background-color: #087990;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 8px 10px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #08799078;
    }

    #photo {
        width: 350px;
        height: 200px;
        margin-bottom: 5px;
        border-radius: 2rem
    }
    </style>
</body>
</html>
