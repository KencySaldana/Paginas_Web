function subir(){
  //Variables de inputs
  var id = document.getElementById("id").value;
  var nombre = document.getElementById("nombre").value;
  var apellidoPaterno = document.getElementById("apellido_paterno").value;
  var apellidoMaterno = document.getElementById("apellido_materno").value;
  var telefono = document.getElementById("telefono").value;
  var email = document.getElementById("email").value;
  var direccion = document.getElementById("direccion").value;
  var rfc = document.getElementById("rfc").value;
  var categoria = document.getElementById("categoria_clientes").value;

  //selecciona la clase del botón que detonará el evento
  const openModal = document.querySelector('.btn-primary');

  //validación de datos con desplegue de modal 
  if (id==""|| nombre=="" || apellidoPaterno=="" || apellidoMaterno=="" || telefono==""|| email==""|| direccion=="" || rfc=="" || categoria==""){
    document.getElementById("exampleModalCenterTitle").innerHTML = "¡DATOS INCOMPLETOS!";
    document.getElementById("message").innerHTML = "Por favor rellena todos los campos con asterísco (*)";

    //Función para abrir el modal mediante el evento del click
    openModal.addEventListener('click', (e)=>{
      e.preventDefault();
      $('#modal-info').modal('show');
    });

    return false;
  }

  document.getElementById("titulo").innerHTML = "¡REGISTRO EXITOSO!";
  //Selecciono el cuerpo del modal donde quiero que se impriman los datos
  let bodyModal = document.querySelector(".modal-body");
  //creo un string que contiene los datos que quiero imprimir
  let textoBody = `<p>ID:  ${id} <br> Nombre del cliente: ${nombre} ${apellidoPaterno} ${apellidoMaterno} <br> Teléfono: ${telefono} <br> Email: ${email} <br> Dirección: ${direccion} <br> RFC: ${rfc} <br> categoría: ${categoria}</p>`;
  //Por medio de innerHtml agrego en el cuerpo del modal el texto
  bodyModal.innerHTML= textoBody;

  //Función para abrir el modal
  openModal.addEventListener('click', (e)=>{
    e.preventDefault();
    $('#modal-info').modal('show');
  });

  return false;

}
