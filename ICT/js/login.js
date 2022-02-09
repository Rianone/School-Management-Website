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
    alert("")
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
           
                    xhr.open("POST","../php/veriflogin.php",true);
                    xhr.onload = function() {
                        if(this.status == 200)
                        {
                            let final = this.responseText;
                            if(final == "reussidash"){
                                location.href = "../dashboard.php";
                            }
                            else if(final == "reussiconfirm"){
                                location.href = "../confirmation.php";
                            }
                            else{
                                invalide.innerHTML = final;
                                invalide.classList.add("text-danger");
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
