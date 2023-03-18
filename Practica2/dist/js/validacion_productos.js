function validacion_product(){
  //Variables de extracción de datos
  var codigo = document.getElementById("codigo_producto").value;
  var nombre = document.getElementById("nombre_producto").value;
  var precio_compra = document.getElementById("precio_compra").value;
  var precio_venta = document.getElementById("precio_compra").value;
 
   //Consulta de la clase del modal
  var openModal = document.querySelector('.hi');
  
  //validación de datos con apertura del modal enviando texto atraves de inner 
  if (codigo=="" || nombre=="" || precio_venta=="" || precio_compra==""){  
    document.getElementById("titulo").innerHTML = "¡DATOS INCOMPLETOS!";
    document.getElementById("message").innerHTML = "Por favor rellena todos todos los campos";
    openModal.addEventListener('click', (e)=>{
      e.preventDefault();
      $('#modal-info').modal('show');
    });
    return false;
  }
  if(codigo=="" && nombre!="" && precio_venta!="" && precio_compra!=""){
    document.getElementById("titulo").innerHTML = "¡CAMPO codigo VACÍO!";
    document.getElementById("message").innerHTML = "Por favor rellena el campo código.";
    openModal.addEventListener('click', (e)=>{
      e.preventDefault();
      $('#modal-info').modal('show');
    });
    return false;

  }
  if(nombre=="" && codigo!="" && precio_venta!="" && precio_compra!=""){
    document.getElementById("titulo").innerHTML = "¡CAMPO NOMBRE VACÍO!";
    document.getElementById("message").innerHTML = "Por favor rellena el campo nombre.";
    openModal.addEventListener('click', (e)=>{
      e.preventDefault();
      $('#modal-info').modal('show');
    });
    return false;
  }
  if(precio_venta=="" && codigo!="" && nombre!="" && precio_compra!=""){
    document.getElementById("titulo").innerHTML = "¡CAMPO PRECIO VENTA VACÍO!";
    document.getElementById("message").innerHTML = "Por favor rellena el campo precio de la venta.";
    openModal.addEventListener('click', (e)=>{
      e.preventDefault();
      $('#modal-info').modal('show');
    });
    return false;
  }
  if(precio_compra=="" && codigo!="" && precio_venta!="" && nombre!=""){
    document.getElementById("titulo").innerHTML = "¡CAMPO PRECIO COMPRA VACÍO!";
    document.getElementById("message").innerHTML = "Por favor rellena el campo precio de la compra.";
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
