class App{

    constructor(){
        // Load main menu functionality
        document.addEventListener('DOMContentLoaded', () => { 
            paw.loadScript('MainMenu', '/js/components/mainMenu.js', () => {
                let mainMenu = new MainMenu("nav");
            })
            paw.loadScript('subMenu', '/js/components/subMenu.js', () => {
                let subMenu = new SubMenu("nav ul li");
            })
            paw.loadScript('Carrousel', '/js/components/carrousel.js', () => {
                let carrousel = new Carrousel();
            })
            paw.loadScript('Truns', '/js/components/Turns.js', () => {
                let turns = new Turns('#form-turnos fieldset', '#especialidad', '#especialista');
            })
        });
    }

}

let app = new App();