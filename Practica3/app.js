//pageYOffset: es una propiedad de ventana de solo lectura que devuleve el numero de pixeles que el documento se ha desplazado verticalmente.
// slice extrae una sección de una cadena sin modificar la cadena sin modificar la cadena original
//offsetTop - un numero, que representa la posicion superior del elemento, en pixeles

// ----set date------
//selected span
//document.getElementById devulve una referncia al documento por su id

const date = document.getElementById("date");
date.innerHTML = new Date().getFullYear();

// ----------------close links------
//document.querySelector devuelve el primer elemento del documento que coincida con el grupo especificado de selectores

const navToggle = document.querySelector(".nav-toggle");
const linksContainer = document.querySelector(".links-container");
const links = linksContainer.querySelector(".links");

//navegation
navToggle.addEventListener("click", function(){
    //el metodo .getBoundingClientRect() devuelve el tamaño de un elemento y su posicion relativa a la ventana de visualizacion 
    const linksHeight= links.getBoundingClientRect().height;
    const containrHeight= linksContainer.getBoundingClientRect().height;

    if (containrHeight == 0){
        linksContainer.style.height = `${linksHeight}px`;
    }else{
        linksContainer.style.height = 0;
    }
});

//----fixed navbar ----
const navbar = document.getElementById("nav");
const topLink = document.querySelector(".top-link");
//scroll
window.addEventListener("scroll",function () {
    const scrollHeight = window.pageYOffset;
    const navHeight = navbar.getBoundingClientRect().height;
    if (scrollHeight > navHeight) {
        navbar.classList.add("fixed-nav");
    }else {
        navbar.classList.remove("fixed-nav");
    }

    //setup back to top link
    if (scrollHeight > 500){
        console.log("helo");
        topLink.classList.add("show-link");
    }else{
        topLink.classList.remove("show-link"); 
    }
});

//---smooth scrolling ---
//select links

const scrollLinks = document.querySelector(".scroll-link");
scrollLinks.forEach((links) => {
    links.addEventListener("click", (e) => {
        //prevent default scrolling
        e.preventDefault();
        //navugate to specified spot

        const id = e.currentTarget.getAttribute("href").slice(1);
        const element = document.getElementById(id);
        const navHeight = navbar.getBoundingClientRect().height;
        const containerHeight = linksContainer.getBoundingClientRect().height;
        const fixedNav = navbar.classList.contains("fixed-nav");
        let position = element.offsetTop - navHeight;

        if (!fixedNav){
            position = position - navHeight;
        }
        if (navHeight > 82){
            position = position + containerHeight;
        }
        window.scrollTo({
            left: 0,
            top: position,

        });
       //close 
       linksContainer.style.height= 0; 
    });
});
