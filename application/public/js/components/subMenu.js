class SubMenu {

    constructor(pContainer) {
        
        // Find received element
        let container = pContainer.tagName ? pContainer : document.querySelector(pContainer);

        // Create submenu button
        let button = paw.newElement(
            "button",
            "",
            //{ class: 'main_menu_abierto'},
            //{ click: "console.log('click');"}
        );


        // Add functionality
        button.addEventListener("click", (event) => {
            console.log("HOLA");
            if (ul.classList.contains('sub_menu_cerrado')){

                ul.classList.add('sub_menu_abierto');
                ul.classList.remove('sub_menu_cerrado');

            }else{

                ul.classList.add('sub_menu_cerrado');
                ul.classList.remove('sub_menu_abierto');
            }
        });

        // Append to father
        container.appendChild(button);
    }
}

