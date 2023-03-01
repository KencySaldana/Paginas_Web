function validacion_cat(){
  //Variables de extracción de datos
  var clave = document.getElementById("clave").value;
  var nombre = document.getElementById("nombre_cat").value;
 
  
  var openModal = document.querySelector('.hola');
  
  if (clave=="" && nombre==""){  
    document.getElementById("titulo").innerHTML = "¡DATOS INCOMPLETOS!";
    document.getElementById("message").innerHTML = "Por favor rellena todos todos los campos";
    openModal.addEventListener('click', (e)=>{
      e.preventDefault();
      $('#modal-info').modal('show');
    });
    return false;
  }
  if((clave=="") && (nombre!="")){
    document.getElementById("titulo").innerHTML = "¡CAMPO CLAVE VACÍO!";
    document.getElementById("message").innerHTML = "Por favor rellena el campo clave.";
    openModal.addEventListener('click', (e)=>{
      e.preventDefault();
      $('#modal-info').modal('show');
    });
    return false;

  }
  if((nombre=="" ) && (clave!="")){
    document.getElementById("titulo").innerHTML = "¡CAMPO NOMBRE VACÍO!";
    document.getElementById("message").innerHTML = "Por favor rellena el campo nombre.";
    openModal.addEventListener('click', (e)=>{
      e.preventDefault();
      $('#modal-info').modal('show');
    });
    return false;
  }

  document.getElementById("titulo").innerHTML = "¡VALIDACIÓN EXITOSA!";
  document.getElementById("message").innerHTML = "Los datos fueron guardados con exito.";
  openModal.addEventListener('click', (e)=>{
    e.preventDefault();
    $('#modal-info').modal('show');
  });
  return false;
}
