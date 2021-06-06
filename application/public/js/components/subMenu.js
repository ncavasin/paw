class SubMenu {

    constructor(pContainer) {

        // Find second element of "nav ul li"
        let container = document.querySelectorAll(pContainer).item(1);
        console.log(container);

        // Create sub-menu items
        let ul = paw.newElement('ul', '');
        let li = paw.newElement('li', '');
        for(var i = 0; i < 4; i++){
            let a = paw.newElement('a', 'Audiologia', {href: '/index', target: '_self'});
            a.classList.add('sub_menu_list_item');
            li.appendChild(a);
        }
        ul.appendChild(li);
        ul.classList.add('sub_menu_list');
        container.appendChild(ul);

        // Handle events
        container.addEventListener('ontap', () => {
            show();
        });
        container.addEventListener('mouseover', () =>{
            show();
        });
    
        container.addEventListener('mouseout', () => {
            hide();
        });

        function show() {
            ul.style.display = 'inherit';
        }

        function hide() {
            ul.style.display = 'none';
        }

    }

    
}

