
  const menu = [
    {
      id: 1,
      title: "Papa",
      category: "Verduras",
      price: "$42.95",
      desc: `Papa Blanca 1 Kg`,
    },
    {
      id: 2,
      title: "Tomate Huaje Supremo",
      category: "Verduras",
      price: "$29.95",
      desc: `Tomate Huaje Supremo 1 Kg`,
    },
    {
      id: 3,
      title: "Cebolla Blanca",
      category: "Verduras",
      price: "$14.95",
      desc: `Cebolla Blanca 1 Kg`,
    },
    {
      id: 4,
      title: "Zanahoria",
      category: "Verduras",
      price: "$14.95",
      desc: `Zanahoria 1 Kg`,
    },
    {
      id: 5,
      title: "Piña Miel Gold",
      category: "Frutas",
      price: "$62.00",
      desc: `Piña Miel Gold Pza`,
    },
    {
      id: 6,
      title: "Sandía Sangría",
      category: "Frutas",
      price: "$20.50",
      desc: `Sandía Sangría 1 Kg`,
    },
    {
      id: 7,
      title: "Pepino Fresco",
      category: "Frutas",
      price: "$33.90",
      desc: `Pepino Fresco 1 Kg`,
    },
    {
      id: 8,
      title: "Mango Ataulfo Supremo",
      category: "Frutas",
      price: "$57.00",
      desc: `Mango Ataulfo Supremo 1 Kg`,
    },
    {
      id: 9,
      title: "Helado Napolitano Holanda",
      category: "Lacteos",
      price: "$164.00",
      desc: `Helado Napolitano Holanda 473 ml`,
    },
    {
      id: 10,
      title: "Leche",
      category: "Lacteos",
      price: "$15.78",
      desc: `Leche Deslactosada 1L`,
    },
    {
      id: 11,
      title: "Pescado",
      category: "Mariscos",
      price: "$135.78",
      desc: `Pescado Sin Escamas`,
    },
    {
      id: 12,
      title: "Camarón",
      category: "Mariscos",
      price: "$189.89",
      desc: `Camarón Gigante 1 Kg`,
    },
    {
      id: 13,
      title: "Ostiones",
      category: "Mariscos",
      price: "$278.64",
      desc: `Ostiones Crudos 1 Kg`,
    },
  ];
  
  // Obtener elemento principal
  const tBodyContainer = document.querySelector("#tabla_cuerpo");
  const btnContainer = document.querySelector("#btn-tabla");
  
  function desplegar(){
    diplayMenuItems(menu);
  }

  //Items de productos
  function diplayMenuItems(menuItems) {
    let displayMenu = menuItems.map(function (item) {
      // console.log(item);
        
       return `<tr">
                <td>${item.id}</td>
                <td>${item.title}</td>
                <td>${item.category}</td>
                <td>${item.price}</td>
                <td>${item.desc}</td>
            </tr>`;
    });
    displayMenu = displayMenu.join("");
    // console.log(displayMenu);
  
    tBodyContainer.innerHTML = displayMenu;
  }
  
  //Opciones de botones
   function displayMenuButtons() {
    const filterBtns = btnContainer.querySelectorAll(".filter-btn");
    console.log(filterBtns);
  
    filterBtns.forEach(function (btn) {
      btn.addEventListener("click", function (e) {
        // console.log(e.currentTarget.dataset);
        const category = e.currentTarget.dataset.id;
        const menuCategory = menu.filter(function (menuItem) {
          // console.log(menuItem.category);
          if (menuItem.category === category) {
            return menuItem;
          }
        });
        if (category === "all") {
          diplayMenuItems(menu);
        } else {
          diplayMenuItems(menuCategory);
        }
      });
    });
  }
  