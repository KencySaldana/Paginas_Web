function subir(){

  //Variables de inputs
  var formulario="";
  var usuario = document.getElementById("usuario").value;
  var nombre = document.getElementById("nombre").value;
  var apellido = document.getElementById("apellido").value;
  var email = document.getElementById("email").value;
  var contrasena = document.getElementById("contraseña").value;
  var confirmContrasena = document.getElementById("confirmContraseña").value;

  //consulta de la clase del modal
  const openModal = document.querySelector('.hola');

  //ciclo para saber que checkbox fueron seleccionados
  var hobbies="";
  for (a=0; a<6; a++){
    if (document.form1.hobby[a].checked){
      hobbies+=document.form1.hobby[a].value + ",";
    }
  }

  //validación de datos con desplegue de modal 
  if (usuario==""|| nombre=="" || apellido==""){
    document.getElementById("titulo").innerHTML = "¡DATOS INCOMPLETOS!";
    document.getElementById("message").innerHTML = "Por favor rellena todos los campos con asterísco (*)";

    openModal.addEventListener('click', (e)=>{
      e.preventDefault();
      $('#modal-info').modal('show');
    });

    return false;
  }

  if (hobbies.length==0){
    document.getElementById("titulo").innerHTML = "¡DATOS INCOMPLETOS!";
    document.getElementById("message").innerHTML = "Debes tener almenos un hobby seleccionado.";

    openModal.addEventListener('click', (e)=>{
      e.preventDefault();
      $('#modal-info').modal('show');
    });
    return false;
  }

  if ((contrasena!=confirmContrasena) || (contrasena=="")){
    document.getElementById("titulo").innerHTML = "¡CONTRASEÑAS INCORRECTAS!";
    document.getElementById("message").innerHTML = "Las contraseñas deben ser iguales y no deben estar vacías.";

    openModal.addEventListener('click', (e)=>{
      e.preventDefault();
      $('#modal-info').modal('show');
    });

    return false;
  }

  if(email=="") {
    document.getElementById("titulo").innerHTML = "¡EMAIL INVÁLIDO!";
    document.getElementById("message").innerHTML = "Por favor introduce un email válido.";

    openModal.addEventListener('click', (e)=>{
      e.preventDefault();
      $('#modal-info').modal('show');
    });

    return false;
  }

  document.getElementById("titulo").innerHTML = "¡REGISTRO EXITOSO!";
  document.getElementById("message").innerHTML = "Nombre: " + nombre+ " "+apellido+ "\nEmail: "+email+"\nContraseña: "+contrasena;
  openModal.addEventListener('click', (e)=>{
    e.preventDefault();
    $('#modal-info').modal('show');
  });

  return false;

}
