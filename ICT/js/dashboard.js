let modal = document.querySelector(".main");
let icon = document.querySelector("span");
let message = document.querySelectorAll("#message")
let message_body = document.querySelector("#message-body")

let toggler = document.querySelector(".navbar-toggler-icon");
let menu = document.querySelector("#menu2");
let menu_con = document.querySelector(".menu-container");


for (let i = 0; i < message.length; i++) {
    const element = message[i];
    element.addEventListener("click",function() {
    modal.style.display = "flex";
    message_body.innerHTML = element.innerHTML;
});
}

icon.addEventListener("click",function() {
    modal.style.display = "none";
});

window.addEventListener("click",function (evt) {
    if(evt.target == modal)
    {
      modal.style.display = "none";
    }
});


toggler.addEventListener("click",function() {
    if(menu_con.style.display === "flex")
    {
        menu_con.style.display = "none";
        toggler.innerHTML = "";
        toggler.classList.add("navbar-toggler-icon")
        toggler.style.fontSize = "1rem";
    }
    else{
        menu_con.style.display = "flex";
        toggler.innerHTML = "&Cross;";
        toggler.classList.remove("navbar-toggler-icon")
        toggler.style.fontSize = "2rem";
    }
});

window.addEventListener("click",function (evt) {
    if(evt.target == menu_con)
    {
      menu_con.style.display = "none";
    }
});