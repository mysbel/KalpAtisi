<?php
require_once "connexion.php";

$data = [];

if (isset($_GET['c']) && !empty($_GET['c'])) {
    $id = $_GET["c"];
    $sql1 = mysqli_query($conn, "SELECT * FROM `patient` WHERE `id_patient`= '$id' LIMIT 1");
    if (mysqli_num_rows($sql1) > 0) {
        $data = mysqli_fetch_assoc($sql1);
    } else {
        die("Patient ID does not exist.");
    }
} else {
    die("No patient ID provided.");
}

$id_p = $data['id_patient'];

if (isset($_POST['save'])) {
    $fullName = $_POST['fullName'];
    $age = $_POST['age'];
    $gender = $data['sexe'];
    $medicalHistory = $_POST['medicalHistory'];
    $medications = $_POST['medications'];
    $diabet = $_POST['diabete'];
    $allergie = $_POST['allergie'];
    $attention = $_POST['attention'];

    $sql3 = mysqli_query($conn, "INSERT INTO `evaluation`(`tension`, `diabete`, `allergie`, `antecedents`, `medicament`, `id_patient`) VALUES 
                         ('$attention','$diabet','$allergie','$medicalHistory','$medications','$id_p')");
    
    if ($sql3) {
        $chez_infirmier = 'chez infirmier';
        $etat = 'valider';

        $update_statut = mysqli_query($conn, "UPDATE `patient` SET `statut` = '$chez_infirmier' WHERE `id_patient` = '$id_p'");
        $update_etat = mysqli_query($conn, "UPDATE `patient` SET `etat` = '$etat' WHERE `id_patient` = '$id_p' LIMIT 1");

        if ($update_statut && $update_etat) {
            // Check if notification already exists
            $checkNotification = mysqli_query($conn, "SELECT * FROM `notifications` WHERE `user_id` = '15' AND `id_patient` = '$id_p' AND `id_recepteur` = '15' AND `status` = '2'");

            if (mysqli_num_rows($checkNotification) == 0) {
                // Insert the notification if it doesn't exist
                $sql = "INSERT INTO `notifications` (`user_id`, `id_patient`, `id_recepteur`, `status`) 
                        VALUES ('15', '$id_p', '15', '2')";

                if (mysqli_query($conn, $sql)) {
                    echo "Notification and evaluation record inserted successfully.";
                } else {
                    echo "Error inserting notification: " . mysqli_error($conn);
                }
            } else {
                echo "Notification already exists.";
            }
        } else {
            echo "Error updating patient: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting evaluation: " . mysqli_error($conn);
    }

    // Redirect to Inf.php after form submission
    header("Location: Inf.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalp Atışi</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="/public/js/bootstrap.js">
    <link rel="stylesheet" href="/public/js/bundel.js">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <script>
        // Use PHP to echo the variable into the JavaScript context
        var phpVariable = <?php echo json_encode($data); ?>;
        var phpVariable1 = <?php echo json_encode($id); ?>;
        var phpVariable2 = <?php echo json_encode($id_p); ?>;
        var phpVariable3 = <?php echo json_encode(mysqli_num_rows($sql1)); ?>;
        console.log(phpVariable);
        console.log(phpVariable1);
        console.log(phpVariable2);
        console.log(phpVariable3);
    </script>
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
    <br>
    <h1 style="text-align: center; color: #087990; font-weight: bold; font-size: 50px;">Évaluation du Patient</h1>
    <br>
    <div class="content">
        <form id="patientForm" action="" method="post" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
            <input type="text" name="name" id="name" value="<?= $id ?>" name="fff" hidden>
            <div style="grid-column: span 2;">
                <label for="fullName">Nom Complet:</label>
                <input type="text" id="fullName" name="fullName"
                    value="<?= $data ? $data['nom'] . ' ' . $data['prenom'] : '' ?>" required>
            </div>
            <div>
                <label for="patientNumber">Numéro de Patient:</label>
                <input type="text" id="patientNumber" name="patientNumber" value="<?= $id ?>" disabled readonly>
            </div>
            <div>
                <label for="age">Âge:</label>
                <input type="number" id="age" name="age" required>
            </div>
            <div>
                <label for="gender">Sexe:</label>
                <select id="gender" name="gender" required>
                    <option value="<?= $data ? $data['sexe'] : '' ?>" selected disabled>
                        <?= $data ? $data['sexe'] : 'N/A' ?>
                    </option>
                </select>
            </div>
            <div>
                <label for="attention">La tension :</label>
                <input type="text" id="attention" name="attention"><br>
            </div>
            <div>
                <label for="diabete">Diabète</label>
                <select id="diabete" name="diabete" required>
                    <option value="oui">Oui</option>
                    <option value="non">Non</option>
                </select>
            </div>
            <div>
                <label for="allergie">Allérgie:</label>
                <select id="allergie" name="allergie" required>
                    <option value="#"></option>
                    <option value="non">non</option>
                    <option value="Allergie Alimentaires">Allérgie Alimentaires</option>
                    <option value="Allergie saisonnieres">Allérgie saisonnières</option>
                    <option value="Allergie de l interieur">Allérgie de l'intérieur</option>
                    <option value="L asthme Allergique">L'asthme Allérgique</option>
                    <option value="autres">autres</option>
                </select>
            </div>
            <div style="grid-column: span 2;">
                <label for="medicalHistory">Antécédents Médicaux:</label>
                <textarea id="medicalHistory" name="medicalHistory" rows="4" cols="50"></textarea>
            </div>
            <div style="grid-column: span 2;">
                <label for="medications">Médicaments Pris:</label>
                <textarea id="medications" name="medications" rows="4" cols="50"></textarea>
            </div>
            <input type="submit" name="save">
        </form>
    </div>
    <script src="script.js"></script>
</body>
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
        .content {
            max-width: 900px;
            margin: 0 auto;
            background-color: rgba(204, 204, 187, 0.59);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="number"],
        form select,
        form textarea {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: #087990;
            color: white;
            padding: 8px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding-left: 10px;
            display: flex;
            justify-content: center;
            margin: auto;
        }

        form input[type="submit"]:hover {
            background-color: #087990ae;
        }

        form {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            text-align: left;
        }

        form label {
            grid-column: span 2;
            text-align: center;
        }

        form input[type="submit"] {
            grid-column: span 2;
            justify-self: center;
        }
    </style>
</body>

</html>