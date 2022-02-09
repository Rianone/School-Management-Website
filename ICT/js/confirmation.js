 let password = document.getElementById("mdp");
 let invalide = document.getElementById("invalide");
 let button = document.getElementById("submit-btn");
 let regPass = /^[0-9]{5}$/;

function verif() {    
    if(regPass.test(password.value)){
        return true;
    }
    else{
        invalide.innerHTML = "Le code entree est invalide !!!";
    }
}
 
button.addEventListener("click",()=>{
    if(verif()){
         var xhr = new XMLHttpRequest();
                   
                            xhr.open("GET","../php/confirm.php",true);
                            xhr.onload = function() {
                                if(this.status == 200)
                                {
                                   //  console.log(this.responseText);
                                    let final = this.responseText;
                                    if(final == "reussi"){
                                       location.href = "dashboard.php";
                                    }
                                    else{
                                        invalide.innerHTML = final;
                                    }
                                }
                            }
       xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
       xhr.send("password="+password);
    }
})


