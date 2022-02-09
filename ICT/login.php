<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connectez vous-ICT4D-Connexion</title>
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
            
            <h1 class="display-4 mb-5">Connectez Vous.</h1>
            <form method="POST" role="form">
                <p id="invalide" class="text-center"></p>
                <div class="form-group">
                    <input type="text"  placeholder="Entrer votre matricule" id="matricule" class="form-control"
                        required />
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Entrer votre nom complet" id="name" class="form-control" required />
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Entrer votre email" id="email" class="form-control" required />
                </div>
                <div class="form-group">
                    <select id="niveau" class="form-control" required="required" aria-placeholder="Niveau" value="Niveau" >
                        <option value="">Niveau</option>
                        <option>L1</option>
                        <option>L2</option>
                        <option>L3</option>
                    </select>
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
        let mat = document.getElementById("matricule");
let name = document.getElementById("name");
let category = document.getElementById("niveau");
let email = document.getElementById("email");
let button = document.getElementById("submit-btn");

let regName = /^[a-zA-Z0-9,?. 'éèàç]{3,25}$/;
let regEmail = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;
let regMat = /^[a-zA-Z0-9]{7}$/;

name.addEventListener("keyup",()=>{
    if(regName.test(name.value)){
        name.style.boxShadow = "0 0 0 0.2rem rgba(0, 123, 255, 0.25)";
    }
    else
    {
        name.style.boxShadow = "0 0 0 0.2rem rgb(185, 36, 36)";
    }
})

mat.addEventListener("keyup",()=>{
    if(regMat.test(mat.value)){
        mat.style.boxShadow = "0 0 0 0.2rem rgba(0, 123, 255, 0.25)";
    }
    else
    {
        mat.style.boxShadow = "0 0 0 0.2rem rgb(185, 36, 36)";
    }
})

email.addEventListener("keyup",()=>{
    if(regEmail.test(email.value)){
        email.style.boxShadow = "0 0 0 0.2rem rgba(0, 123, 255, 0.25)";
    }
    else
    {
        email.style.boxShadow = "0 0 0 0.2rem rgb(185, 36, 36)";
    }
})

let verif = ()=>{
    if(name.value=="" || mat.value=="" || email.value==""){
        return "Un ou plusieurs champs sont vides!!!"
    }

     else if(regName.test(name.value)){
          if(regMat.test(mat.value)){
              if(regEmail.test(email.value)){
                  if(category.options[category.selectedIndex].innerHTML == "Niveau")
                      {
                          return "Vous devez choisir un niveau !!!"
                      }
                      else{
                          return " "
                      }
              }
              else{
                  return "L'email est invalide!!!"
              }
         }
        else
        {
            return "Le matricule est incorrect !!!"
        }
    }
    else
    {
        return "Le nom que vous avez entrer est incorrect !!!"
    }
}


button.addEventListener("click",(e)=>{
    if(verif()==" "){
        invalide.innerHTML = "";
        let niveau = category.options[category.selectedIndex].innerHTML;
         if(niveau == "L1")
                niveau = 1;
         else if(niveau == "L2")
                niveau = 1;
         else
                niveau = 3; 

         var xhr = new XMLHttpRequest();
           
                    xhr.open("POST","./php/veriflogin.php",true);
                    xhr.onload = function() {
                        if(this.status == 200)
                        {
                            let final = this.responseText;
                            if(final != ""){
                                invalide.innerHTML = final;
                                invalide.classList.add("text-danger");
                            }
                            else{
                                location.href = "./confirmation.php";
                            }
                        }
                    }
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.send("name="+name.value+"&email="+email.value+"&mat="+mat.value+"&niveau="+niveau);
    }
    else{
        invalide.innerHTML = `${verif()}`;
        invalide.classList.add("text-danger");
        e.preventDefault();
    }
})

    </script>
</body>
</html>


