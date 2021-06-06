class App{

    constructor(){
        document.addEventListener("touchstart", function(){}, true);
        
        // Load main menu functionality
        document.addEventListener('DOMContentLoaded', () => { 
            paw.loadScript('MainMenu', '/js/components/mainMenu.js', () => {
                let mainMenu = new MainMenu("nav");
            })
        });

        document.addEventListener('DOMContentLoaded', () => { 
            paw.loadScript('subMenu', '/js/components/subMenu.js', () => {
                let mainMenu = new SubMenu("nav ul li");
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