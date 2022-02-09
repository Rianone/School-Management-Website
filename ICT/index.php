<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICT 4D Website</title>
    <link rel="apple-touch-icon" href="./icons/apple-touch-icon.png" sizes="180x180"/>
    <link rel="icon" type="image/png" sizes="32x32" href="./icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./icons/favicon-16x16.png">
    <link rel="manifest" href="./icons/site.webmanifest">
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

<div id="preloader">
        <div id="img">
            <img src="images/preloader.gif" alt="">
        </div>
</div>

<nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
    <span class="navbar-brand mr-4 logo" href="#"><span class="display-5">ICT4</span><span class="text-primary">D.</span></span>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
        aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#home">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">A Propos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">Contactez Nous</a>
            </li>
        </ul>
        <a href="/ICT/login.php">
          <div>
            <button type="button" class="btn btn-lg btn-primary c-btn">Connexion <i class="fa fa-upload" aria-hidden="true"></i></button>
          </div>
        </a>
      </div>
    </div>

</nav>

<a id="home">

    <div class="carousel-item active">
      <img src="./images/background.jpg" alt="First slide" />
      <div class="carousel-caption text-center">
        <h1 class="display-2">Bievenu sur le site web D'ICT 4D</h1>
        <h3>Une interface web vous permettant de consulter vos informations en temps reel.</h3>
        <a href="/ICT/login.php">
          <div>
            <button type="button" class="btn btn-lg btn-primary c-btn">Connectez Vous</button>
          </div>
        </a>
      </div>
    </div>
</a>

<a id="about">
    <div class="carousel-container white">
      <div class="padding"></div>
      <div class="padding"></div>
      <h1 class="text-center display-4">A Propos De Notre Site</h1>
      <hr class="line1" />
      <div class="padding"></div>
      <p class="lead text-center padding">Ce site possede le fonctionnalites suivantes</p>
      <div id="carouselId" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselId" data-slide-to="0" class="active"></li>
          <li data-target="#carouselId" data-slide-to="1"></li>
          <li data-target="#carouselId" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active text-center">
              <div className="col-md-4 padding">
                  <div class="icon">
                      <i class="fas fa-desktop"></i>
                  </div>
                  <h3 class="mb-2">Rapidite</h3>
                  <div class="padding"></div>
                  <p class="text">Consulter en temps et en heures vos informations, vos notes, vos UE's.... </p>
              </div>
          </div>
          <div class="carousel-item text-center">
            <div className="col-md-4 padding">
              <div class="icon">
                <i class="fas fa-download"></i>
              </div>
                <h3 class="mb-2">Accesibilité</h3>
                <div class="padding"></div>
                <p class="text">Ce site vous donne la possibilité d'acceder a des informations et des statistics relatif a ton niveau(Controle continu,Sessions Normales,Travaux pratiques)</p>
            </div>
          </div>
          <div class="carousel-item text-center">
            <div className="col-md-4 padding">
                <div class="icon">
                  <i class="fas fa-phone"></i>
                </div>
                <h3 class="mb-2">Flexibilité</h3>
                <div class="padding"></div>
                <p class="text">Profitez d'une interface personliser, vous pourrez y acceder sur desktop ou mobile.</p>
            </div>
          </div>
        </div>
        
        <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
</a>
<div class="padding"></div>
<div class="padding"></div>

<div class="contact-container">
  <h1 class="text-center display-4">Contactez Nous</h1>
  <hr class="line1" />
  <div class="padding"></div>
  <p id="invalide" class="text-center"></p>
  <div class="row padding contact">
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
          <textarea name="message" id="message" cols="30" rows="10" placeholder="Entrer le motif" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-lg" id="submit-btn">Envoyer</button>
      </form>
  </div>
</div>

<footer class="white">
  <div class="container-fluid padding">
    <div class="row text-center">
      <div class="col-md-6">
      <span class="navbar-brand mr-4 logo" href="#"><span class="display-4">ICT4</span><span class="text-primary display-4">D.</span></span>
        <hr className="line1" />
        <p>345-673-333</p>
        <p>ICT4D@gmail.com</p>
        <p>Yaoundé, Cameroun</p>
        <p>City, State 1234</p>
      </div>
      <div class="col-md-6">
        <h3 class="title">Ou Nous Trouver</h3>
        <p>Yaounde, Cameroon</p>
        <p>Ngoa-Ekele</p>
        <p>Universite de Ngoa-ekele</p>
        <p>ICT 4D</p>
      </div>
    </div>
    <div class="col-12">
      <hr class="line1" />
      <h3 class="text-center mt-2">A site made by ICT <i class="fa fa-heart text-danger" aria-hidden="true"></i> Developers</h3>
      <h5 class="text-center mt-2"><a href="#home">Allez en haut <i class="fa fa-arrow-up" aria-hidden="true"></i></a></h5>
    </div>

  </div>
</footer>
<script src="./js/jquery min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/preloader.js"></script>
<!-- <script src="./js/index.js"></script> -->
</body>

<script>
  let name = document.getElementById("name");
let email = document.getElementById("email");
let message = document.getElementById("message");
let tel = document.getElementById("tel");
let button = document.getElementById("submit-btn");
let invalide = document.getElementById("invalide");

let regEmail = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;
let regText = /^[a-zA-Z0-9,?. ';:éèàç]{5,}$/;
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
        return "Un ou plusieurs champs sont vides !!!"
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
           
                    xhr.open("POST","./php/contact.php",true);
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
</html>
