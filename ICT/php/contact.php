<?php

function verif($variable){
    trim($variable);
    htmlspecialchars($variable);
    strip_tags($variable);
    
    return $variable;
}


function verification_globale(){    
    include_once("./connexionbd.php");
    
    $regName = "/[a-zA-Z0-9,. 'éèàç]{3,25}/i";
    $regText = "/[a-zA-Z0-9,?. ';:éèàç]{5,}/i";
    $regTel = "/[+0-9 ]{9,13}/i";
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $message = $_POST["message"];
    
    verif($name);
    verif($email);
    verif($tel);
    verif($message);
    if(empty($name) || empty($email) || empty($tel) || empty($message)){
        return "Un ou plusieurs champs sont vides";
    }
    else if (filter_var($email,FILTER_VALIDATE_EMAIL) != true) {
        return "L'adresse email est invalide";
    }
    elseif (preg_match_all($regName,$name) != true) {
        return "Le nom entree est invalide";
    }
    elseif (preg_match_all($regTel,$tel) != true) {
        return "Le numero de telephone entree est invalide";
    }
    elseif (preg_match_all($regText,$message) != true) {
       return "Le message entree est invalide";
    }
    else {
        try{
            $stmt = $bdd->prepare("INSERT INTO messages(nom,email,telephone,message) VALUES (:nom, :email, :telephone, :message)");
            $stmt->execute(array(
									'nom' => $name,
									'email' => $email,
									'telephone' => $tel,
									'message' => $message
								
			));
            return "reussi";
        }
        catch(Exception $e){
            return "Une erreur c'est produite veuilez re-essayez";
        }
    }
}

echo verification_globale();