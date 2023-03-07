//Array asociativo
const products = [
    {
      id: 1,
      img: 'img/papa.png',
      title: "Papa",
      category: "Verduras",
      price: "$42.95",
      desc: `Papa Blanca 1 Kg`,
    },
    {
      id: 2,
      img: 'img/tomate.png',
      title: "Tomate Huaje Supremo",
      category: "Verduras",
      price: "$29.95",
      desc: `Tomate Huaje Supremo 1 Kg`,
    },
    {
      id: 3,
      img: 'img/cebolla.png',
      title: "Cebolla Blanca",
      category: "Verduras",
      price: "$14.95",
      desc: `Cebolla Blanca 1 Kg`,
    },
    {
      id: 4,
      img: 'img/zanahoria.png',
      title: "Zanahoria",
      category: "Verduras",
      price: "$14.95",
      desc: `Zanahoria 1 Kg`,
    },
    {
      id: 5,
      img: 'img/pina.png',
      title: "Piña Miel Gold",
      category: "Frutas",
      price: "$62.00",
      desc: `Piña Miel Gold Pza`,
    },
    {
      id: 6,
      img: 'img/sandia.png',
      title: "Sandía Sangría",
      category: "Frutas",
      price: "$20.50",
      desc: `Sandía Sangría 1 Kg`,
    },
    {
      id: 7,
      img: 'img/pepino.png',
      title: "Pepino Fresco",
      category: "Frutas",
      price: "$33.90",
      desc: `Pepino Fresco 1 Kg`,
    },
    {
      id: 8,
      img: 'img/mango.png',
      title: "Mango Ataulfo Supremo",
      category: "Frutas",
      price: "$57.00",
      desc: `Mango Ataulfo Supremo 1 Kg`,
    },
    {
      id: 9,
      img: 'img/helado.png',
      title: "Helado Napolitano Holanda",
      category: "Lacteos",
      price: "$164.00",
      desc: `Helado Napolitano Holanda 473 ml`,
    },
    {
      id: 10,
      img: 'img/leche.png',
      title: "Leche",
      category: "Lacteos",
      price: "$15.78",
      desc: `Leche Deslactosada 1L`,
    },
  ];

function filtroCategoria(category){
    
   //guardar la consulta del div padre
    const divProducts = document.querySelector('#divProductsContent');
    
    let divContent = ``;

    //La condición evalúa si se seleccionaron todos los objetos
    if (category == "All"){
        //en caso de que sí, el array toma el valor total del array padre
        var filtradoProductos = products;
    }else{
        //si no por medio de filter se evalua y se crea un nuevo array con la categoria seleccionada
        var filtradoProductos = products.filter(product=> product.category== category);
    }

    //filtra 
    filtradoProductos.forEach(function(filtro){       
        divContent = divContent + `
            <div class="divProductContent">
            <img src="${filtro.img}">
            <h3>${filtro.title}</h3>
            <h4>${filtro.category}</h4>
            <p>${filtro.price}</p>
            <p>${filtro.desc}</p>
            </div>`
    });

    divProducts.innerHTML = divContent;
    
}

//se invoca la función para que carguen ltodos los productos al cargar la página
 filtroCategoria("All");



