function validar(){
	let contrasena = document.getElementById("clave").value;
    let email = document.getElementById("email").value;
	if (email=="admin@upv.edu.mx" && contrasena=="admin"){
		window.location = "../../index.html";
		return false;
	}else{
		alert("Datos incorrectos")
		return false;
	}
	return false;
}