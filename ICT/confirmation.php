<?php
    session_start();
    if(!isset($_SESSION["code"])){
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmez que c'est bien vous-ICT4D-Connexion</title>
    <link rel="apple-touch-icon" href="./icons/apple-touch-icon.png" sizes="180x180" />
    <link rel="icon" type="image/png" sizes="32x32" href="./icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./icons/favicon-16x16.png">
    <link rel="manifest" href="./icons/site.webmanifest">

    <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div id="preloader">
        <div id="img">
            <img src="images/preloader.gif" alt="">
        </div>
    </div>
    <div class="row">
        
        <section class="container left">
            <div id="logo"> 
                <span class="navbar-brand mr-4 logo" href="#"><span class="display-5">ICT4</span><span class="text-primary">D.</span></span>
            </div>
            
            <h1 class="display-4 mb-5">Confirmez que c'est bien vous.</h1>
            <form method="POST" role="form">
                <p id="invalide" class="text-center text-danger"></p>
                 <div class="form-group">
                    <input type="text" placeholder="Entrer le code a 5 chiffres" id="mdp" class="form-control" required />
                </div>
                <button type="reset" class="btn btn-primary btn-lg" id="submit-btn">Connexion</button>
            </form>
    
            <div id="copyright">
                <p>Copyright © 2025 ICT4D.All rights reserved.</p>
            </div>
        </section>
    
        <section class="right">
                <img src="./images/background2.jpg" alt="Background" id="img1"/>
                <h2 class="title">Connecter vous sur notre platforme pour consulter vos informations</h2>
        </section>
    </div>
    
    <script src="./js/preloader.js"></script>
    <script>
 let password = document.getElementById("mdp");
 let invalide = document.getElementById("invalide");
 let button = document.getElementById("submit-btn");
 let regPass = /^[0-9a-zA-Z]{5}$/;

function verif() {    
    if(regPass.test(password.value)){
        return true;
    }
    else{
        invalide.innerHTML = "Le code entree est invalides !!!";
    }
}
 
button.addEventListener("click",()=>{
    if(verif()){
         var xhr = new XMLHttpRequest();
                   
                            xhr.open("POST","./php/confirm.php",true);
                            xhr.onload = function() {
                                if(this.status == 200)
                                {
                                   //  console.log(this.responseText);
                                    let final = this.responseText;
                                    if(final == "reussi"){
                                       location.href = "./dashboard.php";
                                    }
                                    else{
                                        invalide.innerHTML = final;
                                    }
                                }
                            }
       xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
       xhr.send("password="+password.value);
    }
})



    </script>
</body>
</html>