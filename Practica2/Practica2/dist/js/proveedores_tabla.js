function tabla(){
	//creación del array asociativo
	const proveedores = [
	{
		ID:'1',
		Nombre:'Rocío Sánchez', 
		Teléfono: "558-558-29-10",
		RFC: "WQE12345",
	},
	{
		ID:'2',
		Nombre:'Carmen Salazar', 
		Teléfono: "558-558-23-54",
		RFC: "TRY3456",
	},

	{
		ID:'3',
		Nombre: 'Omar Martínez', 
		Teléfono: "558-558-43-97",
		RFC: "96WEFGDG",
	},

	{
		ID:'4',
		Nombre: 'José Hernández', 
		Teléfono: "558-558-97-97",
		RFC: "23TYR6",
	},
	{
		ID:'5',
		Nombre: 'Fidel Garza',
		Teléfono: "558-558-12-98",
		RFC: "WETY5423", 
	},
	{
		ID:'6',
		Nombre: 'Marisol Martínez', 
		Teléfono: "558-558-12-94",
		RFC: "FRT246",
	},
	{
		ID:'7',
		Nombre: 'Andrik Gómez', 
		Teléfono: "558-558-13-34",
		RFC: "NHU3424",
	},
	{
		ID:'8',
		Nombre: 'Moisés Ruiz', 
		Teléfono: "558-558-41-11",
		RFC: "HJ564363",
	}
	]

	//Variables de selección y cadenas
	const bodyTable = document.querySelector("#table_body");
	let body = "";
	let headTable = document.querySelector("#table_head");
	let head = "";

	//ciclo através de object para recorrer ly extraer el nombre de las llaves del array
	Object.keys(proveedores[0]).forEach(function(title){
		//se asigna a una fila el nombre de la llave
		let titleRow = `<th>${title}</th>`; 
		head = head + titleRow; 
	});

	//Este ciclo recorre cada elemento del array 
	proveedores.forEach(function(proveedor){
		let rowTable = `<tr>
                            <td>${proveedor.ID}</td>
                            <td>${proveedor.Nombre}</td>
                            <td>${proveedor.Teléfono}</td>
                            <td>${proveedor.RFC}</td>
                          </tr>`;
        //se concatena cada fila
        body = body + rowTable;      
	});

	//através de innerHTML se envían las cadenas en los lugares seleccionados
	headTable.innerHTML = head;
	bodyTable.innerHTML = body;

}

tabla()

