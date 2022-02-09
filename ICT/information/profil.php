<?php
    session_start();
    
        if(!isset($_SESSION["validation"])){
            header("location: ../login.php");
        }

    include "../php/connexionbd.php";
    
    
?><!DOCTYPE html>
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
    <link rel="stylesheet" href="../css/profile.css">
    <title><?php echo $_SESSION["username"]?>-Profil</title>
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
                <li class="nav-item active">
                    <a class="nav-link">Voir votre profil</a>
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
                <li class="nav-item active">
                    <a class="nav-link">Voir votre profil</a>
                </li>
            </ul>
        </div>

        <div class="col-md-9" id="body">
            <div class="image text-center padding">
                <img class="img-thumbnail" src="../images/pic.jpg" alt="profile image">
            </div>
            <div class="informations text-center">
                <?php
                     $mat = $_SESSION["matricule"];
                     $stmt = $bdd->query("SELECT * FROM Etudiants WHERE matriculeEt='"."$mat"."'");
                     while ($donnees = $stmt->fetch()) {
                        $mat = $donnees["matriculeEt"];
                        $nom = $donnees["nomEtudiant"];
                        $prenom = $donnees["prenomEtudiant"];
                        $annee = $donnees["dateDeNaissance"];
                        $idannee = $donnees["Annee_idAnnee"];
                        $niveau = $donnees["Niveau_nomNiveau"];
                        $cpt = 0;
                        $stmt2 = $bdd->query("SELECT * FROM absenter WHERE Etudiants_matriculeEt = '"."$mat"."'");
                        while ($donnees2 = $stmt2->fetch()) {
                            $cpt++;
                        }
                    }
                    
                    echo " <p class='lead white'>Matricule : $mat</p>
                <hr class='line'>
                <p class='lead white'>Nom et Prenoms :  $nom $prenom</p>
                <hr class='line'>
                <p class='lead white'>Date de naissance : $annee</p>
                <hr class='line'>
                <p class='lead white'>Annee : $idannee</p>
                <hr class='line'>
                <p class='lead white'>Niveau : $niveau</p>
                <hr class='line'>
                <p class='lead white'>Nombres total d'absences : $cpt</p>
                <hr class='line'>";
                ?>
               
                <p class="text-danger">Si les infos ci dessus ne correspondes pas,<a class="btn btn-link lead text-primary modal-opener"> Contactez Nous</a></p>
            </div>
        </div>

    </div>
    </div>

<div class="modal-contact-container">
    <div class="contact-container">
        <div class="row padding contact">
            <h2 class="text-center contact-title">Contactez Nous</h2>
            <p id="invalide" class="text-center"></p>
            <form action="./php/contact.php" method="POST" role="form">
        <div class="form-group">
          <input type="text" name="name" placeholder="Entrer votre nom et prenom" id="name" class="form-control" required />
        </div>
        <div class="form-group">
          <input type="email" name="email" placeholder="Entrer votre email" id="email" class="form-control" required />
        </div>
        <div class="form-group">
          <input type="tel" name="tel" placeholder="Entrer votre numero de telephone" id="tel" class="form-control" required />
        </div>
        <div class="form-group">
          <textarea name="message" id="message" cols="30" rows="5" placeholder="Entrer le motif" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-lg" id="submit-btn">Envoyer</button>
      </form>
        </div>
    </div>
</div>
    
    <footer>
        <div class="col-12">
            <h3 class="text-center">A site made by ICT <i class="fa fa-heart text-danger"
                    aria-hidden="true"></i>Developers</h3>
            <p>Copyright © 2025 ICT4D.All rights reserved.</p>
        </div>
    </footer>


    <script>
        let modal = document.querySelector(".modal-contact-container");
// let icon = document.querySelector("#closer");
let btn = document.querySelector(".modal-opener");

btn.addEventListener("click",function() {
    modal.style.display = "flex";
});

// icon.addEventListener("click",function() {
//     modal.style.display = "none";
// });

window.addEventListener("click",function (evt) {
    if(evt.target == modal)
    {
      modal.style.display = "none";
    }
});



let name = document.getElementById("name");
let email = document.getElementById("email");
let message = document.getElementById("message");
let tel = document.getElementById("tel");
let button = document.getElementById("submit-btn");
let invalide = document.getElementById("invalide");

let regEmail = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;
let regText = /^[a-zA-Z0-9,?. 'éèàç]{5,}$/;
let regName = /^[a-zA-Z0-9,. 'éèàç]{3,25}$/;
let regTel = /^[+0-9 ]{9,13}$/;

email.addEventListener("keyup",()=>{
    if(regEmail.test(email.value)){
        email.style.boxShadow = "0 0 0 0.2rem rgba(0, 123, 255, 0.25)";
    }
    else
    {
        email.style.boxShadow = "0 0 0 0.2rem rgb(185, 36, 36)";
    }
})
name.addEventListener("keyup",()=>{
    if(regName.test(name.value)){
        name.style.boxShadow = "0 0 0 0.2rem rgba(0, 123, 255, 0.25)";
    }
    else
    {
        name.style.boxShadow = "0 0 0 0.2rem rgb(185, 36, 36)";
    }
})
message.addEventListener("keyup",()=>{
    if(regText.test(message.value)){
        message.style.boxShadow = "0 0 0 0.2rem rgba(0, 123, 255, 0.25)";
    }
    else
    {
        message.style.boxShadow = "0 0 0 0.2rem rgb(185, 36, 36)";
    }
})
tel.addEventListener("keyup",()=>{
    if(regTel.test(tel.value)){
        tel.style.boxShadow = "0 0 0 0.2rem rgba(0, 123, 255, 0.25)";
    }
    else
    {
        tel.style.boxShadow = "0 0 0 0.2rem rgb(185, 36, 36)";
    }
})

function verif(e) {
    if(name.value=="" || email.value=="" || message.value==""){
        return "Un ou plusiers champs sont vides !!!"
    }

    else if(regName.test(name.value)){
        if(regEmail.test(email.value)){
            if(regText.test(message.value)){
                if(regTel.test(tel.value)){
                    return " "
                }
                else{
                    return "Le numero de telephone n'est pas valide";
                }
            }
            else{
                return "Le message entre est invalide !!!";
            }
        }
        else{
            return "L'email que vous avez entrer est incorrect !!!";
        }
    }
    else{
        return "Le message est incorect !!!";
    }
}

button.addEventListener("click",(e)=>{
    // alert("hello")
    if(verif()==" "){
        e.preventDefault();
        invalide.innerHTML = "";

       var xhr = new XMLHttpRequest();
           
                    xhr.open("POST","../php/contact.php",true);
                    xhr.onload = function() {
                        if(this.status == 200)
                        {
                            console.log(this.responseText);
                            let final = this.responseText;
                            if(final == "reussi"){
                                invalide.innerHTML = "Votre message a bien ete envoye <i class='fas fa-check'></i>";
                                invalide.classList.remove("text-danger");
                                invalide.classList.add("text-success");
                                name.value = ""
                                email.value = ""
                                tel.value = ""
                                message.value = ""
                            }
                            else{
                                invalide.innerHTML = final;
                                invalide.classList.add("text-danger");
                            }
                        }
                    }
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.send("name="+name.value+"&email="+email.value+"&tel="+tel.value+"&message="+message.value);
    }
    else{
        e.preventDefault();
        invalide.innerHTML = `${verif()}`;
        invalide.classList.add("text-danger");
    }
})

    </script>
    <script src="../js/jquery min.js"></script>
    <script src="../js/profile.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/preloader.js"></script>
    <script src="../js/dashboard.js"></script>
</body>

</html>