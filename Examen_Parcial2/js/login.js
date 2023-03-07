function validarDatos(){
    let correo = document.getElementById("email").value;
    let clave = document.getElementById("clave").value;

    //se hace una consulta de la clase modal
    const openModal = document.querySelector('.btn-primary');

    if ((correo=="jperez") && (clave =="mipssw")){
        window.location= "cliente_vista.html";
        return false;
    }

    if((correo=="vendedor") && (clave =="mipssw-vend")){
        window.location = "vendedor_tabla.html";
        return false;
    }

     if((correo=="") && (clave =="")){
        //se abre el modal y se mandan atraves del inner los textos de datos incompletos
        document.getElementById("titulo").innerHTML = "¡DATOS INCOMPLETOS!";
        document.getElementById("message").innerHTML = "Por favor rellena todos todos los campos";
        
        //por medio del event al hacer click se llama la clase modal
        openModal.addEventListener('click', (e)=>{
          e.preventDefault();
          $('#modal-info').modal('show');
        });
        return false;
    }
    //se abre el modal y se mandan atraves del inner los textos de datos incompletos
    document.getElementById("titulo").innerHTML = "¡DATOS ÉRRONEOS!";
    document.getElementById("message").innerHTML = "Por favor verifica las credenciales";
    
    //por medio del event al hacer click se llama la clase modal
    openModal.addEventListener('click', (e)=>{
      e.preventDefault();
      $('#modal-info').modal('show');
    });
    return false;

}