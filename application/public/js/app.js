class App{

    constructor(){
        // Load main menu functionality
        document.addEventListener('DOMContentLoaded', () => { 
            paw.loadScript('MainMenu', '/js/components/MainMenu.js', () => {
                let mainMenu = new MainMenu("nav");
            })
            paw.loadScript('SubMenu', '/js/components/SubMenu.js', () => {
                let subMenu = new SubMenu("nav ul li");
            })
            paw.loadScript('FetchApi', '/js/components/FetchApi.js', () => {
                // Primero necesito este script para poder usar el otro
                paw.loadScript('Turns', '/js/components/Turns.js', () => {
                    let turns = new Turns('#form-turnos', '#especialidad', '#especialista');
                })
            })
        });
    }

}

let app = new App();