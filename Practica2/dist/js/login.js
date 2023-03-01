function validar(){
	let contrasena = document.getElementById("clave").value;
    let email = document.getElementById("email").value;
    
 	var openModal = document.querySelector('.btnModal');
	if (email=="admin@upv.edu.mx" && contrasena=="admin"){
		window.location = "././pages/forms/index.html";
		return false;
	}else{
		document.getElementById("titulo").innerHTML = "¡DATOS INCOMPLETOS O ÉRRONEOS!";
	    document.getElementById("message").innerHTML = "Por favor rellena todos todos los campos";
	    openModal.addEventListener('click', (e)=>{
	      e.preventDefault();
	      $('#modal-info').modal('show');
	    });
	    return false;
	}
	return false;
}