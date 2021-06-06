class MainMenu {

    constructor(pContainer) {
        // Find nav
        let container = pContainer.tagName ? pContainer : document.querySelector(pContainer);

        // Create burguer button
        let button = paw.newElement(
            "button",
            "☰",
            { class: 'hamburguesa'},
            //{ click: "console.log('click');"}
        );

        let css = paw.newElement('link', '', {rel: 'stylesheet', href:'js/css/main_menu.css'});
        document.head.appendChild(css);

        let ul = document.querySelector("nav ul");

        // Add functionality
        button.addEventListener("click", (event) => {
            if (event.target.classList.contains('hamburguesaAbrir')){
                
                
                event.target.classList.add('hamburguesaCerrar');
                ul.classList.add('main_menu_abierto');

                event.target.classList.remove('hamburguesaAbrir');
                ul.classList.remove('main_menu_cerrado');
            }else{
                event.target.classList.add('hamburguesaAbrir');
                ul.classList.add('main_menu_cerrado');

                ul.classList.remove('main_menu_abierto');
                event.target.classList.remove('hamburguesaCerrar');
            }
        });

        // Append to father
        container.appendChild(button);
    }
}

