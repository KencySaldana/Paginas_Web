(function() {
		//variables para guardar los items del html
		let field = document.querySelector('.items');
		/*El método estático Array.from() crea una nueva instancia 
		copiada superficialmente a partir de un objeto iterable o similar a una matriz.Array*/
		let li = Array.from(field.children);

		//función para filtrar cada elemento
		function FilterProduct() {
			for(let i of li){
				//Asigno a name la categoría através de la etiqueta strong
				const name = i.querySelector('strong');
				//La propiedad textContent me permite traer todos los componentes de cada strong.
				const x = name.textContent;
				i.setAttribute("data-category", x);
			}
			//Guarda la cantidad de categorías que tiene el html
			let indicator = document.querySelector('.indicator').children;

			this.run = function() {
				for(let i=0; i<indicator.length; i++)
				{
					indicator[i].onclick = function () {

						/*Este es otro bucle "for" que itera sobre cada elemento en el array "indicator". 
						Se utiliza para eliminar la clase "active" de todos los elementos.*/

						for(let x=0; x<indicator.length; x++)
						{
							//elimina la clase "active" de cada elemento en el array "indicator".
							indicator[x].classList.remove('active');
						}
						//agrega la clase "active" al elemento que se hizo clic.
						this.classList.add('active');

						//crea una nueva variable llamada "displayItems" y le asigna el valor del atributo 
						//"data-filter" del elemento que se hizo clic.
						const displayItems = this.getAttribute('data-filter');

						for(let z=0; z<li.length; z++)
						{
							/*establece el valor de la propiedad CSS "transform" en "scale(0)" para 
							cada elemento en el array "li".*/
							li[z].style.transform = "scale(0)";

							/*establece un temporizador que oculta cada elemento 
							en el array "li" después de 500 milisegundos.*/
							setTimeout(()=>{
								li[z].style.display = "none";
							}, 500);

							/*Este código verifica si el atributo "data-category" del 
							elemento actual es igual al valor de "displayItems" o si "displayItems" es igual a "all".*/
							if ((li[z].getAttribute('data-category') == displayItems) || displayItems == "all")
							 {
							 	li[z].style.transform = "scale(1)";
							 	setTimeout(()=>{
									li[z].style.display = "block";
								}, 500);
							 }
						}
					};
				}
			}
		}
		new FilterProduct().run();
	})();