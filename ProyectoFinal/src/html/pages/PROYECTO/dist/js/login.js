
//se obtiene contraseña y correo
let contrasena = document.getElementByName("password").value;
let email = document.getElementsByName("correo").value;

//se hace una consulta de la clase modal
const openModal = document.querySelector('#btnSignIn');

//por medio del event al hacer click se llama la clase modal
openModal.addEventListener('click', (e)=>{
    //se validan el correo y contraseña
    if (email=="admin@upv.edu.mx" && contrasena=="admin"){
        window.location = "././registrarProductos.html";
        return false;
    }else{
        //se abre el modal y se mandan atraves del inner los textos de datos incompletos
        //document.getElementById("titulo").innerHTML = "¡DATOS INCOMPLETOS O ÉRRONEOS!";
        //document.getElementById("message").innerHTML = "Por favor rellena todos todos los campos";
        e.preventDefault();
        $('#region').modal('show');

    }
});
