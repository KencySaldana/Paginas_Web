function validacion_product(){
  //Variables de extracción de datos
  var nombre = document.getElementByName("descripcion_producto").value;
  var precio_compra = document.getElementByName("precio_compra").value;
  var precio_venta = document.getElementByName("precio_compra").value;
 
   //Consulta de la clase del modal
  var openModal = document.querySelector('#');
  
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

}
