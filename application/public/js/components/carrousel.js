class Carrousel{
    constructor(pContainer, qtyImgs){
        let index = 0;

        let container = document.querySelectorAll(pContainer).item(0);
        
        // Set section's class
        container.classList.add('car_container');

        // Create aux container
        let auxContainer = paw.newElement('div', '', {class: 'aux_container'});

        // Create slide container
        let slidesContainer  = paw.newElement('div', '', {class: 'slides_container'});

        // Create dotsContainer
        let dotsContainer = paw.newElement('div', '', {class: 'dot_container'});

        // Create a slide
        let slide = paw.newElement('div', '', {class: 'slide'});
        
        // Iterate over images' quantity
        for(var i = 0; i < qtyImgs; i++){
            // Create as many dots as images are
            let dot = paw.newElement('button', '', {class: 'dot', id: i});
            dot.addEventListener('click', () => {
                setIndex(dot.id);
            });
            dotsContainer.appendChild(dot);
        }
        // Create left and right buttons
        let left = paw.newElement('button', '<', {class: 'btn_left'});
        let right = paw.newElement('button', '>', {class: 'btn_right'});

        // Handle clicks
        left.addEventListener('click', () => {
            moveSlider('left');
        });

        right.addEventListener('click', () => {
            moveSlider('right');
        });
        
        // Handle arrows
        document.addEventListener('keydown', function(event) {
            const key = event.key; // "ArrowRight", "ArrowLeft", "ArrowUp", or "ArrowDown"
            
            if(key === 'ArrowRight'){
                moveSlider('right');
            }

            if(key === 'ArrowLeft'){
                moveSlider('left');
            }
        });

        slidesContainer.appendChild(slide);
        container.appendChild(slidesContainer);
        container.appendChild(dotsContainer);
        container.appendChild(auxContainer);
        container.appendChild(left);
        container.appendChild(right);

        function setIndex(pIndex){
            index = Number(pIndex);
            checkLimits();
        }

        function moveSlider(direction){
            index += (direction === 'right') ? 1 : - 1;
            checkLimits();
        }

        function checkLimits(){
            // Check upper limit
            index = (index >= qtyImgs) ? 0 : index;

            // Check lower limit
            index = (index < 0 ) ? qtyImgs-1 : index;
            
            // Create path
            let img = "url('assets/img/carrousel" + index + ".jpg')";
            
            // Set background image
            slide.style.backgroundImage = img;
            slide.style.height = '50vh';
            slide.style.width = '50vw';
            
            console.log(index);
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    let carrousel = new Carrousel('main > section', 3);
})