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
    alert("hello")
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
                                invalide.classList.add("text-success");
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
