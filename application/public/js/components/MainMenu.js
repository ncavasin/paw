

// After loading, keep listening for window resize 
document.addEventListener('DOMContentLoaded', (e) => {
    
    // Add media query to be responsive
    let min_width = getComputedStyle(document.documentElement).getPropertyValue(
        "--min-width"
    );
    // const mqIsDesktop = window.matchMedia('(min-width:'+min_width-1+')');
    const mqIsDesktop = window.matchMedia('(max-width: 480px)');
    mqIsDesktop.addEventListener("change", (e) => {
        if (e.matches) {
            console.log("MAINMENU::DESKTOP");
        }
        else{
            // undoAll();
        }
    });
});

class MainMenu {

    constructor(pContainer) {

        // Load css
        let css = paw.newElement('link', '', {rel: 'stylesheet', href:'assets/css/main_menu.css'});
        document.head.appendChild(css);

        // Find received element
        let container = pContainer.tagName ? pContainer : document.querySelector(pContainer);

        // Create burguer button
        let button = paw.newElement(
            "button",
            "☰",
            { class: 'hamburguesa'}
        );


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

