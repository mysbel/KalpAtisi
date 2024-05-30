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
    
    $type="Analyse";
    $date=date("Y-m-d H:i:s");

    $array=[];

    if(isset($_POST['Fonctions']) && ! empty($_POST['Fonctions']))
    {
        $array[]=$_POST['Fonctions'];
    }

    if(isset($_POST['réactive']) && ! empty($_POST['réactive']))
    {
        $array[]=$_POST['réactive'];
    }
    if(isset($_POST['Losage']) && ! empty($_POST['Losage']))
    {
        $array[]=$_POST['Losage'];
    }
    if(isset($_POST['glycémie']) && ! empty($_POST['glycémie']))
    {
        $array[]=$_POST['glycémie'];
    }
    if(isset($_POST['créatinin']) && ! empty($_POST['créatinin']))
    {
        $array[]=$_POST['créatinin'];
    }
    if(isset($_POST['ionogramme']) && ! empty($_POST['ionogramme']))
    {
        $array[]=$_POST['ionogramme'];
    }
    if(isset($_POST['calcémie']) && ! empty($_POST['calcémie']))
    {
        $array[]=$_POST['calcémie'];
    }
    if(isset($_POST['Chimique']) && ! empty($_POST['Chimique']))
    {
        $array[]=$_POST['Chimique'];
    }
    $rapport="";
    foreach($array as $item)
    {
        $rapport=$rapport.'-'.$item;

    }


    $insert=mysqli_query($conn,"INSERT INTO `orientation`(`type`, `rapport`, `date`, `patient`, `médecin`) VALUES
     ('$type','$rapport','$date','$id_patient','$id_medecin')");
      $chez='Orienté vers laboratoire';
      $update_statut = mysqli_query($conn, "UPDATE `patient` SET `statut` = '$chez' WHERE `id_patient` = '$c'");

}

?>
<!DOCTYPE html>
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
            <h1>Liste d'Analyses</h1>
    <br>
    <div>
        <div class="frame">
            
            <form id="analysisForm" method="post">
                <div class="analysis-card" method="post" >
                    <img class="analysis-image" src="image/téléchargement (1).jfif" alt="Image1">
                    <input type="checkbox" name="Fonctions" value="Fonctions Neurologiques Supérieures(FNS)" id="fnc">
                    <label for="fnc">
                        <div class="analysis-title">Fonctions Neurologiques Supérieures(FNS)</div>
                    </label>
                </div>
        
                
                    <div class="analysis-card">
                        <img class="analysis-image" src="image/OIP (1).jpg" alt="Image1">
                        <input type="checkbox" name="réactive" value="C-réactive protéine(CRP)" id="crp">
                        <label for="crp">
                            <div class="analysis-title">C-réactive protéine(CRP)</div>
                        </label>
                    </div>
                    
                    
                        <div class="analysis-card">
                            <img class="analysis-image" src="image/OIP (2).jpg" alt="Image1">
                            <input type="checkbox" name="Losage" value="Losage de lurée sanguine" id="LLS">
                            <label for="LLS">
                                <div class="analysis-title">Losage de lurée sanguine</div>
                               
                            </label>
        
        
                        </div>
                        
                            <div class="analysis-card">
                                <img class="analysis-image" src="image/OIP.jpg" alt="Image1">
                                <input type="checkbox" name="glycémie" value="La glycémie" id="gly">
                                <label for="gly">
                                    <div class="analysis-title">La glycémie</div>
                                </label>
                                
        
                            </div>
                            
                                <div class="analysis-card">
                                    <img class="analysis-image" src="image/OIP (3).jpg" alt="Image1">
                                    <input type="checkbox" name="créatinin" value="La créatinin" id="cré">
                                    <label for="cré">
                                        <div class="analysis-title">La créatinin</div>
                                    </label>
                                </div>
        
                                
                                    <div class="analysis-card">
                                        <img class="analysis-image" src="image/télécharger (1).jpg" alt="Image1">
                                        <input type="checkbox" name="ionogramme" value="L ionogramme" id="ion">
                                        <label for="ion">
                                            <div class="analysis-title">L ionogramme</div>
                                        </label>
                                    </div>
        
                                    
                                        <div class="analysis-card">
                                            <img class="analysis-image" src="image/OIP (5).jpg" alt="Image1">
                                            <input type="checkbox" name="calcémie" value="La calcémie" id="cal">
                                            <label for="cal">
                                                <div class="analysis-title">La calcémie</div>
                                            </label>
                                        </div>
                                
                                
                                        
                                            <div class="analysis-card">
                                                <img class="analysis-image" src="image/OIP (4).jpg" alt="Image1">
                                                <input type="checkbox" name="Chimique" value="Chimique des urines" id="cdu">
                                                <label for="cdu">
                                                    <div class="analysis-title">Chimique des urines</div>
                                                </label>
                                            </div>
                                                       
                <br>
                <div class="btn-container">
                    <button class="btn" type="submit" name="valider" onclick="validerAnalyse()">Valider</button>
                    <br><br><br><br><br><br>
                </div>
            </form>
        </div>
            <style>
                .frame{
                    display: flex;
                    justify-content: center;
                    
                }
                h1 {
            text-align: center;
            color: #087990;
            font-weight: bold;
            font-size: 50px;
        }
    .analysis-card {
        background-color: #08799025;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
        transition: transform 0.3s ease;
        cursor: pointer;
        display: flex; 
        align-items: center; 
        width: 600px;

    }
    .analysis-card:hover {
        transform: translateY(-5px);
    }
    
    .analysis-description::before {
        content: "Description: ";
        font-weight: bold;
    }
    .btn-container {
        text-align: center;
    }
    .btn {
        padding: 8px 10px;
        background-color: #087990;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 50mm;
        height: 10mm;
    }
    .btn:hover {
        background-color: #45a049;
    }

    .analysis-image {
        width: 100px; 
        margin-right: 20px; 
    }
            </style>

    <script>
        function validerAnalyse() {
    var selectedAnalyses = document.querySelectorAll('input[name="analysis"]:checked');
    var analysesChoisies = [];
    selectedAnalyses.forEach(function(analysis) {
        analysesChoisies.push(analysis.value);
    });

    localStorage.setItem('analysesChoisies', JSON.stringify(analysesChoisies));
    alert("Analyses sélectionnées : " + analysesChoisies.join(", "));
}
// Liste globale pour stocker les analyses choisies
let analysesChoisies = [];

function afficherAnalysesChoisies() {
    const analysesChoisiesDiv = document.getElementById('analysesChoisies');
    analysesChoisiesDiv.innerHTML = analysesChoisies.join(", ");
}

        </script>
</body>
</html>