// Seleciona el componente "about" y los botones de la barra de navegación.
const about = document.querySelector(".about");
const btns = document.querySelectorAll(".tab-btn");

// Selecciona las secciones con contenido en la página.
const articles = document.querySelectorAll(".content");

// Selecciona la imagen del componente "about" y variables que contienen la ruta a las imagenes a mostrar.
const aboutImg = document.querySelector('.about-img img');
const newImgSrc2 = 'imgs/atardecer.jpeg';
const newImgSrc3 = 'imgs/mar.jpeg';
const newImgSrc1= 'imgs/imagen.png';
const btnImg = document.querySelector(".galeria");

const modal = document.querySelector('.modal');
const closeModal = document.querySelector('.modal__close');
const anterior = document.querySelector("#btnAnterior")
const siguiente = document.querySelector("#btnSiguiente")

const img = [`<img src = "imgs/img1.png"/>`,
            `<img src = "imgs/img2.png"/>`,
            `<img src = "imgs/img3.png"/>`,
            `<img src = "imgs/img4.png"/>`,
            `<img src = "imgs/img5.png"/>`,
            `<img src = "imgs/img6.png"/>`,
            `<img src = "imgs/img7.png"/>`,
            `<img src = "imgs/img8.png"/>`,
            `<img src = "imgs/img9.png"/>`,
            `<img src = "imgs/img10.png"/>`,
            `<img src = "imgs/img11.png"/>`,
            `<img src = "imgs/img12.png"/>`,
            `<img src = "imgs/img13.png"/>`,
            `<img src = "imgs/img14.png"/>`,
            `<img src = "imgs/img15.png"/>`];

let currentImgIndex = 0;

// Agrega un evento que se activa al presionar sobre el componente "about".
about.addEventListener("click", function (e){
    // Accede a el id del elemento donde se hizo click.
    const id = e.target.dataset.id;

    if(id){
        //Remueve la clase "active" de todos los botones presentes en la barra de navegación.
        btns.forEach(function (btn){
            btn.classList.remove("active");
        });
        //Agrega la clase "active" al botón seleccionado de la barra de navegación.
        e.target.classList.add("active");

        //Oculta todas las secciones con contenidos.
        articles.forEach(function(article){
            article.classList.remove("active");
        });

        //Muestra la sección de contenido correspondiente al botón seleccionado.
        const element = document.getElementById(id);
        element.classList.add("active");

        // Cambia la imagen del componente "about" si el botón "nosotros" es clickeado.
        if (id === "nosotros") {
            aboutImg.src = newImgSrc2;
        } else if(id === "objetivos") {
          // Cambia la imagen del componente "about" si el botón "objetivos" es clickeado.
          aboutImg.src = newImgSrc3;
        } else if(id === "portafolio") {
            // Cambia la imagen del componente "about" si el botón "portafolio"  es clickeado.
          aboutImg.src = newImgSrc1;
        }
    }
});

//función para abrir el modal
function modalImagen(number){

    let containerImage = document.getElementById("imagen");
    modal.classList.add('modal--show');
    containerImage.innerHTML = img[number];
    //esta función toma el evento del botón close y remueve la clase modal
    closeModal.addEventListener('click', (e)=>{
        e.preventDefault();
        modal.classList.remove('modal--show');
    });

    //evento que cambia la el indice de la imagen y la dibuja en el modal
    anterior.addEventListener("click", function (e){
        currentImgIndex = (currentImgIndex - 1 + img.length) % img.length;
        containerImage.innerHTML = img[currentImgIndex];
    });

    siguiente.addEventListener("click", function (e){
        currentImgIndex = (currentImgIndex + 1) % img.length;
        containerImage.innerHTML = img[currentImgIndex];
    });
}
