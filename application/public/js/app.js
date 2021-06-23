class App{

    constructor(){
        // Load functionality
        document.addEventListener('DOMContentLoaded', () => { 
            paw.loadScript('MainMenu', '/js/components/MainMenu.js', () => {
                let mainMenu = new MainMenu("nav");
            })


            paw.loadScript('SubMenu', '/js/components/SubMenu.js', () => {
                let subMenu = new SubMenu("#main_menu");
            })
        });
    }

}

let app = new App();