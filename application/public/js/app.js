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
                paw.loadScript('TurnsForm', '/js/components/TurnsForm.js', () => {
                    let turns = new TurnsForm('#form-turnos', '#especialidad', '#especialista');
                })
            })
        });
    }

}

let app = new App();