function tabla(){
	//creación del array asociativo
	const clientes = [
	{
		ID:'1',
		Nombre:'Maria Sandoval', 
	},
	{
		ID:'2',
		Nombre:'Juan Garza', 
	},
	{
		ID:'3',
		Nombre: 'Kency Saldana', 
	},
	{
		ID:'4',
		Nombre: 'Yanel Mireles', 
	},
	{
		ID:'5',
		Nombre: 'Gael Sustaita', 
	},
	{
		ID:'6',
		Nombre: 'César Flores', 
	},
	{
		ID:'7',
		Nombre: 'Osiel Cruz', 
	},
	{
		ID:'8',
		Nombre: 'Jonathan Canales', 
	}
	]

	//Variables de selección y cadenas
	const bodyTable = document.querySelector("#table_body");
	let body = "";
	let headTable = document.querySelector("#table_head");
	let head = "";

	//ciclo através de object para recorrer ly extraer el nombre de las llaves del array
	Object.keys(clientes[0]).forEach(function(title){
		//se asigna a una fila el nombre de la llave
		let titleRow = `<th>${title}</th>`; 
		head = head + titleRow; 
	});

	//Este ciclo recorre cada elemento del array 
	clientes.forEach(function(cliente){
		let rowTable = `<tr>
                            <td>${cliente.ID}</td>
                            <td>${cliente.Nombre}</td>
                          </tr>`;
        //se concatena cada fila
        body = body + rowTable;      
	});

	//através de innerHTML se envían las cadenas en los lugares seleccionados
	headTable.innerHTML = head;
	bodyTable.innerHTML = body;

}

tabla()

