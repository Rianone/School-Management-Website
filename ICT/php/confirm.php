<?php

session_start();

function verif(){
$password = $_POST["password"];
$code = $_SESSION["code"];
$regPass = "/[0-9A-Za-z]{5}/i";

if(preg_match_all($regPass,$password)){
    if($code == $password){
        $_SESSION["validation"] = "valide";
        // setcookie("validation", "valide", time() + (86400 * 365), "/");
        return "reussi";
    }
    else{
        return "Le code saisi est incorrect, verifiez bien si vous avez recu le code !";
    }
}
else{
    return "Le code est invalide !!!";
}
}

echo verif();