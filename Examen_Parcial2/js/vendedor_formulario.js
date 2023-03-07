function subir(){

  //Variables de inputs
  var id = document.getElementById("id").value;
  var nombre = document.getElementById("nombre").value;
  var descripcion = document.getElementById("descripcion").value;
  var precio = document.getElementById("precio").value;
  var fecha = document.getElementById("fecha").value;
  var notas = document.getElementById("notas").value;

  const openModal = document.querySelector('.btn-primary');
  //validación de datos 
  if (id==""|| nombre=="" || descripcion=="" || precio=="" || fecha==""|| notas==""){
    document.getElementById("titulo").innerHTML = "¡DATOS INCOMPLETOS!";
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
  let textoBody = `<p>ID:  ${id} <br> Nombre: ${nombre} <br> Descripción: ${descripcion} <br> Precio: ${precio} <br> fecha: ${fecha} <br> Notas: ${notas
}</p>`;
  
  //Por medio de innerHtml agrego en el cuerpo del modal el texto
  bodyModal.innerHTML= textoBody;

  //Función para abrir el modal
  openModal.addEventListener('click', (e)=>{
    e.preventDefault();
    $('#modal-info').modal('show');
  });

  return false;


}