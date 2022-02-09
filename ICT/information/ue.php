<?php
    session_start();
    
        if(!isset($_SESSION["validation"])){
            header("location: ../login.php");
        }

    include "../php/connexionbd.php";
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" href="../icons/apple-touch-icon.png" sizes="180x180" />
    <link rel="icon" type="image/png" sizes="32x32" href="../icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../icons/favicon-16x16.png">
    <link rel="manifest" href="../icons/site.webmanifest">
    
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/ue.css">
    <title>Vos UE's ICT4D-Consulter vos UE's</title>
</head>
<style>
    #body{
    transition: transform 2s ease-in-out;
    background-image: url(../images/background3.jpg);
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
            <li class="nav-item active">
                <a class="nav-link">Vos UE's</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./note.php">Vos Notes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./absence.php">Vos Absences</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./resultats.php">Vos Resultats</a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./profil.php">Voir votre profil</a>
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
                        <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img  class="img img-res img-rounded"><?php echo $_SESSION["username"]?></button>
                        <div class="dropdown-menu" aria-labelledby="triggerId">
                        <a class="dropdown-item" href="./profil.php">Mon profil</a>
                        <a class="dropdown-item" href="../dashboard.php">Retourner a l'accueil</a>
                        <a class="dropdown-item" href="./deconnexion.php">Deconnexion</a>
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
                        <li class="nav-item active">
                            <a class="nav-link">Vos UE's</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./note.php">Vos Notes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./absence.php">Vos Absences</a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link" href="./resultats.php">Vos Resultats</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./profil.php">Voir votre profil</a>
                        </li>
                    </ul>
            </div>

            <div class="col-md-9" id="body">
                <div class="col-md-12">
                    <h1 class="white">Vos UE,s</h1>
                    <h2 class="white text-center">Semestre 1</h2>
                    <hr class="line1">
                </div>
                <div class="row">
                <?php 
                    $niv = $_SESSION["niveau"];
                    $stmt = $bdd->query("SELECT * FROM ues WHERE semestre = '1' AND Niveau_nomNiveau = '$niv'");
                    while ($donnees = $stmt->fetch()) {
                    $title = $donnees["intitule"];
                    $code = $donnees["codeUe"];
                    $description = $donnees["description"];
                    $credit = $donnees["credit"];
                     
                    
                    echo "
                    <div class='col-md-4 box'>
                        <div class='card'>
                            <div class='card-body'>
                                <h3>$title($code)</h3>
                                <p class='description'>
                                <div class='div'>Credit: $credit</div>
                                <div>Semestre: UN</div>
                                </p>
                                <hr>
                                <div>
                                    <p>$description</p>
                                </div>
                                <a href='./note.php' class='btn btn-primary pull-right'>Consulter la note </a>
                            </div>
                        </div>
                    </div>
                    ";
                    }
                ?>
                </div>
                    

               <div class="col-md-12">
                    <h2 class="white text-center">Semestre 2</h2>
                    <hr class="line1">
                </div>
                <div class="row">
                <?php 
                    $stmt = $bdd->query("SELECT * FROM ues WHERE semestre = '2'AND Niveau_nomNiveau = '$niv'");
                    while ($donnees = $stmt->fetch()) {
                    $title = $donnees["intitule"];
                    $code = $donnees["codeUe"];
                    $description = $donnees["description"];
                    $credit = $donnees["credit"];
                     
                    
                    echo "
                    <div class='col-md-4 box'>
                        <div class='card'>
                            <div class='card-body'>
                                <h3>$title($code)</h3>
                                <p class='description'>
                                <div class='div'>Credit: $credit</div>
                                <div>Semestre: UN</div>
                                </p>
                                <hr>
                                <div>
                                    <p>$description</p>
                                </div>
                                <a href='#' class='btn btn-primary pull-right'>Consulter la note </a>
                            </div>
                        </div>
                    </div>
                    ";
                    }
                ?>
                </div>
            </div>
        <!-- </div> -->
   <!-- </div> -->
    <footer>
            <div class="col-12">
                <h3 class="text-center">A site made by ICT <i class="fa fa-heart text-danger" aria-hidden="true"></i>Developers</h3>
                <p>Copyright © 2025 ICT4D.All rights reserved.</p>
            </div>
    </footer>

    <script src="../js/jquery min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/dashboard.js"></script>
    <script src="../js/preloader.js"></script>
</body>
</html>