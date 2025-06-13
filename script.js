let menubar= document.querySelector("#menu-bars");
let navbar = document.querySelector('.navbar');

menubar.onclick=() => {

    menubar.classList.toggle(fa-times);
    navbar.classList.toggle('active');

}

const unwantedDiv = document.querySelector('.chat-gpt-quick-query-container');
if (unwantedDiv) unwantedDiv.remove();