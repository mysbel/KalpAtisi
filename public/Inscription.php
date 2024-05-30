<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['name'];
    $prenom = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tel = $_POST['number'];

    // Vérifier si les mots de passe correspondent
    if ($_POST['password'] !== $_POST['password_confirmation']) {
        echo "Les mots de passe ne correspondent pas.";
        exit();
    }

    // Vérifier si la clé 'user_type' existe dans $_POST
    if (!isset($_POST['role'])) {
        echo "Le champ 'Etes-vous ?' n'est pas défini.";
        exit();
    }
    
    $type = $_POST['role'];    

    // Hasher le mot de passe
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Connexion à la base de données
    $conn = mysqli_connect("localhost", "root", "", "mémoire");

    // Vérifier la connexion
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Préparer la requête d'insertion
    $sql = "INSERT INTO inscription (nom, email, password, type, tel, prenom) 
            VALUES ('$nom', '$email', '$password', '$type', '$tel', '$prenom')";

    // Exécuter la requête
    if (mysqli_query($conn, $sql)) {
        echo "Enregistrement réussi";
    } else {
        echo "Erreur d'enregistrement: " . $sql . "<br>" . mysqli_error($conn);
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
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="/public/js/bootstrap.js"></script>
    <script src="/public/js/bundel.js"></script>
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
    <br>
    <div class="container">
        <div class="row" >
            <div class="col-xl-4 col-lg-6 col-md-6 mx-auto shadow authcard">
                <br>
                <div class="titlecover">
                    <h2 class="fs-5 mb-4 fw-bolder justify-content-center">S'inscrire</h2>
                </div>
                <br>
                <form method="post">
                    <div class="row form-row">
                        <div class="col-md-4">
                            <label>Nom</label>
                            <span class="spcol">:</span>
                        </div>
                        <div class="col-md-8">
                            <div class="flex flex-col items-start">
                                <input type="text" name="name" class="form-control" placeholder="Entrer votre nom" autocomplete="name" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-4">
                            <label>Prenom</label>
                            <span class="spcol">:</span>
                        </div>
                        <div class="col-md-8">
                            <div class="flex flex-col items-start">
                                <input type="text" name="lastname" class="form-control" placeholder="Entrer votre prenom" autocomplete="name" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-4">
                            <label>Email</label>
                            <span class="spcol">:</span>
                        </div>
                        <div class="col-md-8">
                            <div class="flex flex-col items-start">
                                <input type="email" name="email" class="form-control" placeholder="Entrer votre email" autocomplete="username" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-4">
                            <label>Mot de passe</label>
                            <span class="spcol">:</span>
                        </div>
                        <div class="col-md-8">
                            <div class="flex flex-col items-start">
                                <input type="password" name="password" class="form-control" placeholder="Entrer votre mot de passe" autocomplete="new-password" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-4">
                            <label>Confimer Mdp</label>
                            <span class="spcol">:</span>
                        </div>
                        <div class="col-md-8">
                            <div class="flex flex-col items-start">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmer votre mot de passe" value="" required>
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-4">
                            <label>Tel</label>
                            <span class="spcol">:</span>
                        </div>
                        <div class="col-md-8">
                            <div class="flex flex-col items-start">
                                <input type="number" name="number" class="form-control" placeholder="Entrer votre num téléphone" autocomplete="name" value="" required>
                            </div>
                        </div>
                    </div>


                    <div class="row form-row">
                        <div class="col-md-4">
                            <label>Etes-vous ?</label >
                            <span class="spcol">:</span>
                        </div>
                        <div class="col-md-8">
                            <div class="flex flex-col items-start">
                            <select name="role" class="form-control" required>
                                 <option value="administrateur">Administrateur</option>
                                <option value="medecin">Médecin</option>
                                <option value="infirmier">Infirmier</option>
                                <option value="radiologue">Radiologue</option>
                                <option value="laborantin">Laborantin</option>
</select>
       
                            </div>
                        </div>
                    </div>



                    <div class="row form-row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-8 fpswd">
                            <button class="btn px-6 btn-success text-white justify-content-center" type="submit" name="submit" id="submit ">S'inscrire</button>
                        </div>
                    </div>
                </form>
                <div class="row mt-5 text-center form-row">
                    <p>Vous avez déjà un compte<a class="text-success" href="/public/login.php"><b>Cliquez pour vous connecter</b></a></p>
                </div>
            </div>
        </div>
    </div>
    <br><br>
<style>
    .row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1* var(--bs-gutter-y));
    margin-right: calc(-.5* var(--bs-gutter-x));
    margin-left: calc(-.5* var(--bs-gutter-x));
}
.auth-container .authcard {
    background-color: #fff;
    padding: 50px;
    border-radius: 7px;
}
.mx-auto {
    margin-right: auto !important;
    margin-left: auto !important;
}
.shadow {
    box-shadow: 0 .5rem 1rem #00000026!important;
}
.col-md-10 {
    flex: 0 0 auto;
    width: 83.33333333%;
}
.titlecover {
    font-weight: bolder !important;
    margin-bottom: 1.5rem !important;
    text-align: center;
}
.fw-bolder {
    font-weight: bolder !important;
}
.fs-5 {
    font-size: 1.25rem !important;
}
.mb-4 {
    margin-bottom: 1.5rem !important;
}
h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6 {
    color: #545454;
}
.form-row {
    margin-bottom: 25px;
    text-align: left;
}
.col-md-4 {
    flex: 0 0 auto;
    width: 33.33333333%;
}
.form-row label {
    padding-top: 7px;
    font-weight: 500;
    text-align: left;
}
label {
    display: inline-block;
}
.form-row .spcol {
    float: right;
    padding-top: 7px;
    font-weight: 600;
}
.col-md-8 {
    flex: 0 0 auto;
    width: 66.66666667%;
}
.form-row .form-control {
    border-radius: 5px;
    background-color: #cccccc36;
    font-size: .9rem;
}
.form-row .form-control {
    margin-bottom: 0;
}
p {
    margin-bottom: 0;
    width: 100%;
}
p {
    margin-top: 0;
    margin-bottom: 1rem;
}
.btn-success {
    background-color: #51be78;
    border-color: #51be78;
}

.text-white {
    --bs-text-opacity: 1;
    color: rgba(var(--bs-white-rgb), var(--bs-text-opacity)) !important;
}
.px-4 {
    padding-right: 1.5rem !important;
    padding-left: 1.5rem !important;
}
button, select {
    text-transform: none;
}
.fpswd a {
    float: right;
    text-align: right;
    padding-top: 8px;
}
a {
    text-decoration: none;
    outline: none;
    color: #444;
}
.text-center {
    text-align: center !important;
}
.mt-5 {
    margin-top: 3rem !important;
}
</style>

</body>
</html>