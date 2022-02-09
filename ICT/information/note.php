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
    <title>Vos Notes ICT4D-Consulter vos Notes's</title>
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
                <div class="text-center">
                    <p class="lead" id="message-body"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="menu-container">
        <div class="menu col-md-3" id="menu2">
            <h2 class="text-center">Menu</h2>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./ue.php">Vos UE's</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" >Vos Notes</a>
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
                    <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><img
                            class="img img-res img-rounded"><?php echo $_SESSION["username"]?></button>
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
                <li class="nav-item">
                    <a class="nav-link" href="./ue.php">Vos UE's</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">Vos Notes</a>
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
                <h1 class="white">Vos Notes</h1>
                <h2 class="white text-center">Semestre 1</h2>
                <hr class="line1">
            </div>
            <table class='table table-light table-bordered'>
                            <tbody>
                            <tr>
                            <th>Code UE</th>
                            <th>Nom UE</th>
                            <th>Note CC</th>
                            <th>Note SN</th>
                            <th>Note TP</th>
                            </tr>
            <?php
                 $mat = $_SESSION["matricule"];
                $stmt = $bdd->query("SELECT * FROM noter WHERE Etudiants_matriculeEt = '$mat'");
                $codeue=null;
                $semestre=null;
                $nomue=null;
                $cpt2=0;
                $stats1 = true;
                while ($donnees = $stmt->fetch()) {
                    $codeue = $donnees["Ues_codeUe"];
                    $noteCC = $donnees["noteCC"];
                    $noteSN = $donnees["noteSN"];
                    $noteTP = $donnees["noteTP"];

                     $stmt2 = $bdd->query("SELECT * FROM ues WHERE codeUe = '$codeue'");
                    while ($donnees2 = $stmt2->fetch()) {
                        $semestre = $donnees2["semestre"];
                        $nomue = $donnees2["intitule"];

                        if($semestre == 1)
                        {
                            echo "
                            <tr>
                            <td>$codeue</td>
                            <td>$nomue</td>
                            <td>$noteCC</td>
                            <td>$noteSN</td>
                            <td>$noteTP</td>
                            </tr>
                            ";

                            $cpt2 = $cpt2 + 1;
                        }
                    }
                }
                if($cpt2 == 0)
               {
                   $stats1 = false;
                   echo "<p class='text-info text-center'>Ces notes ne sont pas encore disponible</p>";
               }
            
            ?>
            </tbody>
            </table>

            <h2 class="white text-center">Semestre 2</h2>
            <hr class="line1">
            <table class='table table-light table-bordered'>
                    <tbody>
                        <tr>
                           <th>Code UE</th>
                           <th>Nom UE</th>
                           <th>Note CC</th>
                           <th>Note SN</th>
                           <th>Note TP</th>
                     </tr>
           <?php
            $mat = $_SESSION["matricule"];
                $stmt = $bdd->query("SELECT * FROM noter WHERE Etudiants_matriculeEt = '$mat'");
                $codeue=null;
                $semestre=null;
                $nomue=null;
                $cpt=0;
                $stats2=true;
                while ($donnees = $stmt->fetch()) {
                    $codeue = $donnees["Ues_codeUe"];
                    $noteCC = $donnees["noteCC"];
                    $noteSN = $donnees["noteSN"];
                    $noteTP = $donnees["noteTP"];

                     $stmt2 = $bdd->query("SELECT * FROM ues WHERE codeUe = '$codeue'");
                    while ($donnees2 = $stmt2->fetch()) {
                        $semestre = $donnees2["semestre"];
                        $nomue = $donnees2["intitule"];

                        if($semestre == 2)
                        {
                         $cpt=$cpt+1;   
                echo "
                     <tr>
                         <td>$codeue</td>
                         <td>$nomue</td>
                         <td>$noteCC</td>
                         <td>$noteSN</td>
                         <td>$noteTP</td>
                      </tr>
                    ";
                        }
                    }
                }
                if($cpt == 0)
                {
                    $stats2 = false;
                    echo "<p class='text-info text-center'>Ces notes ne sont pas encore disponible.</p>";
                }
                
            ?>
            </tbody>
            </table>
            <div class="stats">
                <h1 class="white text-center">Statistics</h1>
                <hr class="line1">
            </div>
            <h3 class="white text-center">Semestre 1 (Taux de reussite CC,SN,TP confondues)</h3>
            <hr class="line1">
            <?php
                if($stats1 == false){
                        echo "<p class='text-info text-center'>Aucun statistic disponible.</p>";
                }
                else{
                    $niv = $_SESSION["niveau"];
                    $stmt = $bdd->query("SELECT * FROM ues WHERE semestre = '1' AND Niveau_nomNiveau = '$niv'");
                    while ($donnees = $stmt->fetch()) {
                    $title = $donnees["intitule"];
                    $code = $donnees["codeUe"];
                    $credit = $donnees["credit"];
                    $reussite = 0;
                    $total = 0;
                    $taux = 0;

                    $req = $bdd->query("SELECT * FROM noter WHERE Ues_codeUe = '$code'");
                    while ($don = $req->fetch()) {
                        $total = $total + 1;
                    }

                    $stmt2 = $bdd->query("SELECT * FROM noter WHERE Ues_codeUe = '$code' AND noteCC >= 10 AND noteSN >= 10 AND noteTP>= 10 OR noteTP = ' '");
                    while ($donnees2 = $stmt2->fetch()) {
                        $reussite = $reussite + 1;
                    }
                    $taux = ($reussite/$total)*100;
                    $bg ="";
                     if($taux>=50)
                        $bg = "bg-success";
                    else
                        $bg = "bg-danger";
                    echo "
                    <div>
                        <h4 class='text-center white'>$title($code)-$credit</h4>
                         <div class='col-md-12'>
                            <div class='progress'>
                            <div class='progress-bar $bg progress-bar-striped active' style='width: $taux%' role='progressbar' aria-valuenow='$taux' aria-valuemin='0'
                             aria-valuemax='100'>$taux%</div>
                        </div>
                        <div class='padding'></div>
                        </div>
                    </div>
                    ";
                    }
                }
            ?>
            <div class="padding"></div>
            <h3 class="white text-center">Semestre 2 (Taux de reussite CC,SN,TP confondues)</h3>
            <hr class="line1">
            <?php
                 if($stats2 == false){
                        echo "<p class='text-info text-center'>Aucun statistic disponible.</p>";
                }
                else{
                    $niv = $_SESSION["niveau"];
                    $stmt = $bdd->query("SELECT * FROM ues WHERE semestre = '2' AND Niveau_nomNiveau = '$niv'");
                    while ($donnees = $stmt->fetch()) {
                    $title = $donnees["intitule"];
                    $code = $donnees["codeUe"];
                    $credit = $donnees["credit"];
                    $reussite = 0;
                    $total = 0;
                    $taux = 0;

                    $req = $bdd->query("SELECT * FROM noter WHERE Ues_codeUe = '$code'");
                    while ($don = $req->fetch()) {
                        $total = $total + 1;
                    }

                    $stmt2 = $bdd->query("SELECT * FROM noter WHERE Ues_codeUe = '$code' AND noteCC >= 10 AND noteSN >= 10 AND noteTP>= 10 OR noteTP = ' '");
                    while ($donnees2 = $stmt2->fetch()) {
                        $reussite = $reussite + 1;
                    }
                    $taux = ($reussite/$total)*100;
                    $bg ="";
                     if($taux>=50)
                        $bg = "bg-success";
                    else
                        $bg = "bg-danger";
                    echo "
                    <div>
                        <h4 class='text-center white'>$title($code)-$credit</h4>
                         <div class='col-md-12'>
                            <div class='progress'>
                            <div class='progress-bar $bg progress-bar-striped active' style='width: $taux%' role='progressbar' aria-valuenow='$taux' aria-valuemin='0'
                             aria-valuemax='100'>$taux%</div>
                        </div>
                        <div class='padding'></div>
                        </div>
                    </div>
                    ";
                    }
                }
            ?>
           
            </div>
    </div>

    <footer>
        <div class="col-12">
            <h3 class="text-center">A site made by ICT <i class="fa fa-heart text-danger"
                    aria-hidden="true"></i>Developers</h3>
            <p>Copyright © 2025 ICT4D.All rights reserved.</p>
        </div>
    </footer>

    <script src="../js/jquery min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/preloader.js"></script>
    <script src="../js/dashboard.js"></script>
</body>

</html>