<?php
require_once "connexion.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if(isset($_POST['connecter']))
    {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql=mysqli_query($conn,"SELECT email,id,type,password FROM `inscription` WHERE email='$username' LIMIT 1");

        if(mysqli_num_rows($sql)> 0)
        {
            $row=mysqli_fetch_assoc($sql);

                // Vérification du mot de passe
                $pass=$row['password'] ;
                if (password_verify($password,$pass)) 
                {
                    
                    $_SESSION['email']=$row['email'];
                    $_SESSION['id']=$row['id'];
                    $_SESSION['type']=$row['type'];
                    if($row['type']==="medecin")
                    {
                        header("Location: AccesMedecin.php");
                        die;
                    }else if($row['type']==="infirmier")
                    {
                        header("Location: AccesInf.php");
                        die;

                    }else if($row['type']==="administrateur")
                    {
                        header('Location: AccésAdmin.php');
                        die;
                    }else if($row['type']==="radiologue")
                    {
                        header('Location: Radiologue.php');
                        die;
                    }else if($row['type']==="laborantin")
                    {
                        header('Location: Laboratoire.php');
                        die;
                    }
                }else
                {
                     echo '<div class="alert alert-danger" role="alert">Email ou Mot de passe incorrect!</div>';
                }
        }else
        {
            echo '<div class="alert alert-danger" role="alert">Email ou Mot de passe incorrect!</div>';

        }


       

    }

    

    
}
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
    <br><br>
    <div class="container">
   
        <br><br>
        <div class="row">
            <div class="col-md-4">
                <img src="/public/image/login (1).jpg" alt="Photo" class="img-fluid rounded-circle">
            </div>
            <div class="col-md-8">
                    <br><br>
    <div class="row" >
        <div class="col-xl-4 col-lg-4 col-md-8 mx-auto shadow authcard">
            <br>
            <form action="" method="post">
        <div class="titlecover">
            <h2 class="fs-5 mb-4 fw-bolder">Se Connecter</h2>
        </div>
        <div class="row form-row justify-content-center">
            <div class="col-md-4 text-sm">
                <label for="username">Email </label>
                <span class="spcol">:</span>
            </div>
            <div class="col-md-8">
                <div class="flex flex-col items-start">
                    <input type="email" id="username" name="username" style="width :250px;" placeholder="Entrer votre email" required>
                </div>
            </div>
        </div>
        <div class="row form-row justify-content-center">
            <div class="col-md-4 text-sm">
                <label for="password">Mot de passe </label> 
                <span class="spcol">:</span>
            </div>
            <div class="col-md-8">
                <div class="flex flex-col items-start">
                    <input type="password" id="password" name="password" style="width: 250px;" placeholder="Entrer votre mot de passe" required>
                </div>
            </div>
        </div>
                         <div class="row form-row mb-0">
                                <div class="col-md-4"></div>
                                <div class="col-md-8 mb-4"><p class=" obju">
                                    <span class="align-left">
                                        <input name="remember" id="remember" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 " value=""> Keep me Login</span>
                                    </p>
                                </div>
                            </div>

                            <div class="row form-row">
                                <div class="col-md-4"></div>
                                <div class="col-md-8 fpswd">
                                <button class="btn px-8 btn-success text-white btn-shadow" type="submit" name="connecter" id="submit">Connecter</button>

                                    <div class="d-flex justify-content-end mt-2">
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="#">Mot de passe oublié?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 text-center form-row"><p>Je n'ai pas de compte<a class="text-success" href="/public/Inscription.php"><b>Cliquez pour vous inscrire</b> </a></p></div>
                        </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
   
        <br><br>
<style>
    .auth-container .authcard {
    background-color: #fff;
    padding: 20px;
    border-radius: 7px;
    

}
 .h2{
    color: #545454;
}
.titlecover {
    font-weight: bolder !important;
    margin-bottom: 1.5rem !important;
    text-align: center;
}
.col-md-4 {
    flex: 0 0 auto;
    width: 33.33333333%;
    
    
}
.col-md-8 {
    flex: 0 0 auto;
    width: 66.66666667%;
}
.form-row {
    margin-bottom: 25px;
    text-align: left;
}
.form-control {
    background-color: #f8f8f8;
    margin-bottom: 20px;
}
.form-control {
    background-color: #ffffff4d;
    font-size: 1rem;
}
.form-control {
    display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: var(--bs-body-color);
    background-color: var(--bs-body-bg);
    background-clip: padding-box;
    border: var(--bs-border-width) solid var(--bs-border-color);
    appearance: none;
    border-radius: .375rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
.form-row .form-control {
    border-radius: 5px;
    background-color: #cccccc36;
    font-size: .9rem;
}
.form-row .form-control {
    margin-bottom: 0;
}
.form-row .spcol {
    float: right;
    padding-top: 7px;
    font-weight: 600;
}
.mb-0 {
    margin-bottom: 0 !important;
}
.mb-4 {
    margin-bottom: 1.5rem !important;
}
p {
    margin-bottom: 0;
    width: 100%;
}
.text-success {
    --bs-text-opacity: 1;
    color: rgba(var(--bs-success-rgb), var(--bs-text-opacity)) !important;
}
input, button, select, optgroup, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
a {
    text-decoration: none;
    outline: none;
    color: #444;
}

b, strong {
    font-weight: bolder;
}
.rounded-circle {
            width: 500px; /* Largeur de l'image */
            height: 380px; /* Hauteur de l'image */
            object-fit: cover; /* Redimensionnement de l'image pour remplir le conteneur */
        }
</style>
</body>
</html>