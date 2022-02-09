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
    $regMat = "/[a-zA-Z0-9]{7}/i";
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mat = $_POST["mat"];
    $niveau = $_POST["niveau"];

    
    verif($name);
    verif($email);
    verif($mat);
    verif($niveau);
    if(empty($name) || empty($email) || empty($mat) || empty($niveau)){
        return "Un ou plusieurs champs sont vides";
    }
    else if (filter_var($email,FILTER_VALIDATE_EMAIL) != true) {
        return "L'adresse email est invalide";
    }
    elseif (preg_match_all($regName,$name) != true) {
        return "Le nom entree est invalide";
    }
    elseif (preg_match_all($regMat,$mat) != true) {
        return "Le matricule entree est invalide";
    }
    else {
        try{
            $pattern = "%".$name."%";
            $niv="";
            if($niveau == 1)
                $niv = "ICT4DL1";
            else if($niveau == 2)
                $niv = "ICT4DL2";
            else
                $niv = "ICT4DL3"; 

            $stmt = $bdd->query("SELECT * FROM etudiants WHERE matriculeEt = '$mat'");
           if ($donnees = $stmt->fetch() != null)
           {

            //    if(isset($_COOKIE['user']) && $_COOKIE['user']==$mat) {
            //        $_SESSION['matricule'] = $mat;
            //        $_SESSION['code'] = 1234;
            //        return "reussidash";
            //     } else {
            //         setcookie("user", $mat, time() + (86400 * 365), "/"); 
                    $code_a = strtoupper(substr(md5(uniqid()), 0, 5));
                    include_once "./mailsender.php";
                    $message = "Votre code de confirmation est <b>".$code_a."</b><p>Merci de bien vouloir confirmez que c'est bien vous</p>";
                    if (sendMail("ICT 4D Administration", $email, "Confirmation-email", $message)) {
                        session_start();
                        $_SESSION['matricule'] = $mat;
                        $_SESSION['code'] = $code_a;
                                 return "reussi";
                                 
                     } else {
                             echo "Desole nous avont eu un probleme, veuillez re-essayez !";
                     }               
                // }

            }
            else{
                return "Les informations qui vous avez saisi sont incorrectes, Etes vous enregistré ?";
            }
        }
        catch(Exception $e){
            return "Une erreur c'est produite veuilez re-essayez";
        }
    }
}
$final = verification_globale();
if($final == "reussi")
{
    //  header("location: ../confirmation.php");
}
else{
    echo $final;
}