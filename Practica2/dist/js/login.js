function validar(){
	//se obtiene contraseña y correo
	let contrasena = document.getElementById("clave").value;
    let email = document.getElementById("email").value;
    
    //se hace una consulta de la clase modal
 	var openModal = document.querySelector('.btnModal');

 	//se validan el correo y contraseña
	if (email=="admin@upv.edu.mx" && contrasena=="admin"){
		window.location = "././pages/forms/dashboard.html";
		return false;
	}else{
		//se abre el modal y se mandan atraves del inner los textos de datos incompletos
		document.getElementById("titulo").innerHTML = "¡DATOS INCOMPLETOS O ÉRRONEOS!";
	    document.getElementById("message").innerHTML = "Por favor rellena todos todos los campos";
	    
	    //por medio del event al hacer click se llama la clase modal
	    openModal.addEventListener('click', (e)=>{
	      e.preventDefault();
	      $('#modal-info').modal('show');
	    });
	    return false;
	}
	return false;
}