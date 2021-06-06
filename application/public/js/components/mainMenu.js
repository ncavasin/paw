class MainMenu {

    constructor(pContainer) {
        // Find received element
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
            if (ul.classList.contains('main_menu_cerrado')){
                ul.classList.add('main_menu_abierto');
                ul.classList.remove('main_menu_cerrado');
            }else{
                ul.classList.add('main_menu_cerrado');
                ul.classList.remove('main_menu_abierto');
            }
        });

        // Append to father
        container.appendChild(button);
    }
}

