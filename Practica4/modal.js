"use strict";

function pedirProducto(){
    //Obtener los valores de los inputs del form
    let imagen = document.querySelector('#img').value;
    let nombre = document.querySelector('#nombre').value;
    let descripcion = document.querySelector('#descripcion').value;
    let precio = document.querySelector('#precio').value;
    let fecha = document.querySelector('#fecha').value;

    //Validar si estan llenos los campos
    if (imagen != '' && nombre != '' && descripcion != '' && precio != '' && fecha != ''){
        let contenido = document.querySelector('#content-modal');
        //Agregando los valores al modal
        contenido.innerHTML = `
        <p>Imagen: ${imagen}</p>
        <p>Nombre: ${nombre}</p>
        <p>Descripcion: ${descripcion}</p>
        <p>Precio: $${precio}</p>
        <p>Fecha: ${fecha}</p>
        `;
        
        document.getElementsByClassName("fondo_transparente")[0].style.display="block";
    }else { 
        let contenido = document.querySelector('#content-modal');
        contenido.innerHTML = `
        <p>LOS CAMPOS SON OBLIGATORIOS</p>
        `;
        //Mostrar error en caso de que no esten llenos los campos
        document.getElementsByClassName("fondo_transparenteError")[0].style.display="block";
    }
} 


function abrirModal(){
    document.getElementsByClassName("fondo_transparente")[0].style.display="block";
}

function cerrarModal(){
    //Al presionar el boton de aceptar, se cerrara el modal
    document.getElementsByClassName("fondo_transparente")[0].style.display="none";
}