class App{

    constructor(){

        // Load main menu functionality
        document.addEventListener('DOMContentLoaded', () => { 
            paw.loadScript('MainMenu', '/js/components/mainMenu.js', () => {
                let mainMenu = new MainMenu("nav");
            })
        });

        // Load carrousel functionality
        document.addEventListener('DOMContentLoaded', () => { 
            paw.loadScript('Carrousel', '/js/components/carrousel.js', () => {
                let carrousel = new Carrousel();
            })
        });
    }

}

let app = new App();