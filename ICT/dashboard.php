<?php
    session_start();
        if(!isset($_SESSION["validation"])){
            header("location: login.php");
        }

    include "./php/connexionbd.php";
   
    $mat = $_SESSION["matricule"];
    $stmt = $bdd->query("SELECT * FROM Etudiants WHERE matriculeEt='"."$mat"."'");
    while ($donnees = $stmt->fetch()) {
        $username = $donnees["prenomEtudiant"];
        $_SESSION["username"] = $username;
        $_SESSION["niveau"] = $donnees["Niveau_nomNiveau"];
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" href="./icons/apple-touch-icon.png" sizes="180x180" />
    <link rel="icon" type="image/png" sizes="32x32" href="./icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./icons/favicon-16x16.png">
    <link rel="manifest" href="./icons/site.webmanifest">
    
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="./css/dashboard.css">
    <title>Dashboard-<?php echo $_SESSION["username"]?></title>
</head>
<style>
    #body{
    transition: transform 2s ease-in-out;
    background-image: url(./images/background3.jpg);
    background-size: cover;
    background-repeat: no-repeat;
}
</style>
<body>

<div id="preloader">
        <div id="img">
            <img src="images/preloader.gif" alt="">
        </div>
</div>

    <div class="main">
        <div id="modal">
            <div id="modal-container">
                <span>&Cross;</span>
                <h2>Notification</h2>
                <hr class="line1">
                <div class="text-center"><p class="lead" id="message-body"></p></div>
            </div>
        </div>
    </div>

    <div class="menu-container">
        <div class="menu col-md-3" id="menu2">
            <h2 class="text-center">Menu</h2>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="./information/ue.php">Vos UE's</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./information/note.php">Vos Notes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./information/absence.php">Vos Absences</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./information/resultats.php">Vos Resultats</a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./information/profil.php">Voir votre profil</a>
            </li>
        </ul>
        </div>
    </div>

    <nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
        <span class="navbar-brand mr-4 logo" href="#"><span class="display-5">ICT4</span><span class="text-primary">D.</span></span>
        <a class="btn btn-default">
            <span class="navbar-toggler-icon" id="icon"></span>
        </a>

            <ul class="navbar-nav ml-auto drops">
                <li class="nav-item no-drop">
                    <div class="dropdown">
                        <?php
                            $stmt = $bdd->query("SELECT * FROM notifications");
                                $id = null;
                                while($donnees = $stmt->fetch()){
                                    $id = $donnees["id"];
                                }
                        ?>
                        <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notifcations <span class="badge badge-primary">5</span></button>
                        <div class="dropdown-menu" aria-labelledby="triggerId" id="menu">
                            <?php
                                $message = null;
                                $limite = $id - 5;
                                $stmt2 = $bdd->query("SELECT * FROM notifications WHERE id>$limite");
                                while($donnees2 = $stmt2->fetch()){
                                    $message = $donnees2["message_a_noctifier"];
                                    echo  "<a class='dropdown-item' href='#' id='message'>$message</a>";
                                }
                            ?>
                            </div>
                    </div>
                </li>
                <li class="nav-item no-drop">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img  class="img img-res img-rounded"><?php echo $username?></button>
                        <div class="dropdown-menu" aria-labelledby="triggerId">
                           <a class="dropdown-item" href="./information/profil.php">Mon profil</a>
                           <a class="dropdown-item" href="./information/deconnexion.php">Deconnexion</a>
                        </div>
                    </div>
                </li>
            </ul>
            
        </div>
    
    </nav>

        <div class="row">
                <div class="menu col-md-3">
                    <h2 class="text-center">Menu</h2>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="./information/ue.php">Vos UE's</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./information/note.php">Vos Notes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./information/absence.php">Vos Absences</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./information/resultats.php">Vos Resultats</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./information/profil.php">Voir votre profil</a>
                        </li>
                    </ul>
            </div>

            <div class="col-md-9" id="body">
                <div class="col-md-12">
                    <h1 class="white">Bienvenue <?php echo "<span class='text-primary'>".$_SESSION["username"]."</span>"?></h1>
                </div>
                <div class="row">
                    <div class="col-md-4 box">
                        <div class="card">
                            <img src="./images/img1.jpg" alt="Card image">
                            <div class="card-body">
                                <h5 class="card-title">UE's</h5>
                                <p class="card-text">Obtenez des informations sur vos UE's, consulter la liste des UE's, les professeurs qui les ensiegnent ...</p>
                                <a href="./information/ue.php" class="btn btn-primary pull-right">Voir</a>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-4 box">
                        <div class="card">
                            <img src="./images/img2.jpg" alt="Card image">
                            <div class="card-body">
                                <h5 class="card-title">Absences</h5>
                                <p class="card-text">Consulter vos absences du semestre 1 et 2, et le nombre total d'absences par UE's ...</p>
                                <a href="./information/absence.php" class="btn btn-primary pull-right">Voir</a>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-4 box">
                        <div class="card">
                            <img src="./images/img3.jpg" alt="Card image">
                            <div class="card-body">
                                <h5 class="card-title">Notes</h5>
                                <p class="card-text">Consulter vos notes, et obtenez en surplus des statistics relatif a votre filiere ...</p>
                                <a href="./information/note.php" class="btn btn-primary pull-right">Voir</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 box">
                        <div class="card">
                            <img src="./images/img4.jpg" alt="Card image">
                            <div class="card-body">
                                <h5 class="card-title">Resultats</h5>
                                <p class="card-text">Consulter vos resultats, notamment votre mgp et autres ...</p>
                                <a href="./information/resultats.php" class="btn btn-primary pull-right">Voir</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 box">
                        <div class="card">
                            <img src="./images/img5.jpg" alt="Card image">
                            <div class="card-body">
                                <h5 class="card-title">Profil</h5>
                                <p class="card-text">Consulter votre profil <?php echo $_SESSION["username"]?>, vous y verez vos informations ...</p>
                                <a href="./information/profil.php" class="btn btn-primary pull-right">Voir</a>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>

    <footer>
            <div class="col-12">
                <h3 class="text-center">A site made by ICT <i class="fa fa-heart text-danger" aria-hidden="true"></i>Developers</h3>
                <p>Copyright © 2025 ICT4D.All rights reserved.</p>
            </div>
    </footer>

    <script src="./js/jquery min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/preloader.js"></script>
    <script src="js/dashboard.js"></script>
</body>
</html>