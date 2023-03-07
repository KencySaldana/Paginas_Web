   function tabla(){
	//creación del array asociativo
	const vendedores = [
	{
		Usuario:'1',
		Nombre:'Rocío Sánchez', 
        Producto: 'Maíz',
        Descripción: 'Rico y sano',
        Precio: '$121',
        Fecha: '23/12/2023',
	},
	{
        Usuario:'2',
		Nombre:'Carmen Salazar', 
        Producto: 'Maíz',
        Descripción: 'Rico y sano',
        Precio: '$121',
        Fecha: '23/12/2023',
	},

	{
		Usuario:'3',
		Nombre:'Carmen Salazar', 
        Producto: 'Maíz',
        Descripción: 'Rico y sano',
        Precio: '$121',
        Fecha: '23/12/2023',
	},

	{
		Usuario:'4',
		Nombre:'Carmen Salazar', 
        Producto: 'Maíz',
        Descripción: 'Rico y sano',
        Precio: '$121',
        Fecha: '23/12/2023',
	},
	{
		Usuario:'5',
		Nombre:'Carmen Salazar', 
        Producto: 'Maíz',
        Descripción: 'Rico y sano',
        Precio: '$121',
        Fecha: '23/12/2023',
	},
	{
		Usuario:'6',
		Nombre:'Carmen Salazar', 
        Producto: 'Maíz',
        Descripción: 'Rico y sano',
        Precio: '$121',
        Fecha: '23/12/2023',
	},
	{
		Usuario:'7',
		Nombre:'Carmen Salazar', 
        Producto: 'Maíz',
        Descripción: 'Rico y sano',
        Precio: '$121',
        Fecha: '23/12/2023',
	},
	{
		Usuario:'8',
		Nombre:'Carmen Salazar', 
        Producto: 'Maíz',
        Descripción: 'Rico y sano',
        Precio: '$121',
        Fecha: '23/12/2023',
	},
    {
		Usuario:'9',
		Nombre:'Carmen Salazar', 
        Producto: 'Maíz',
        Descripción: 'Rico y sano',
        Precio: '$121',
        Fecha: '23/12/2023',
	},
    {
		Usuario:'10',
		Nombre:'Carmen Salazar', 
        Producto: 'Maíz',
        Descripción: 'Rico y sano',
        Precio: '$121',
        Fecha: '23/12/2023',
	}    
	]

	//Variables de selección y cadenas
	const bodyTable = document.querySelector("#table_body");
	let body = "";
	let headTable = document.querySelector("#table_head");
	let head = "";

	//ciclo através de object para recorrer ly extraer el nombre de las llaves del array
	Object.keys(vendedores[0]).forEach(function(title){
		//se asigna a una fila el nombre de la llave
		let titleRow = `<th>${title}</th>`; 
		head = head + titleRow; 
	});

	//Este ciclo recorre cada elemento del array 
	vendedores.forEach(function(vendedor){
		let rowTable = `<tr>
                            <td >${vendedor.Usuario}</td>
                            <td>${vendedor.Nombre}</td>
                            <td>${vendedor.Producto}</td>
                            <td>${vendedor.Descripción}</td>
                            <td>${vendedor.Precio}</td>
                            <td>${vendedor.Fecha}</td>
                          </tr>`;
        //se concatena cada fila
        body = body + rowTable;      
	});

	//através de innerHTML se envían las cadenas en los lugares seleccionados
	headTable.innerHTML = head;
	bodyTable.innerHTML = body;

}

tabla()

