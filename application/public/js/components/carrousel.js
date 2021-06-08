class Carrousel{
    constructor(pContainer, qtyImgs, basePath){

        // First load image
        // window.onload = changeImage;

        // Handles display and image's prefix
        let index = 0;

        // Get the container (first section of main)
        let container = document.querySelectorAll(pContainer).item(0);
        container.classList.add('car_container');

        // Create a container to hold every slide (aka image)
        let slidesContainer  = paw.newElement('div', '', {class: 'slides_container'});

        // Create a container to hold a dot per image
        let dotsContainer = paw.newElement('div', '', {class: 'dot_container'});

        // Iterate over images' quantity
        for(var i = 0; i < qtyImgs; i++){

            // Create a div per image and store the path of the image in 'background'
            let imgPath = basePath + i.toString() + ".jpg";
            let slide = paw.newElement('div', 'Slide0'+(i+1), {class: 'slide'});

            // Insert background image
            slide.style.backgroundImage = "url(" + imgPath + ")";
            slidesContainer.appendChild(slide);

            // Create a dot per image with proper class and id asignation
            let dot = paw.newElement('button', '', {class: 'dot', id: i});

            // Handle click on dot
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

        container.appendChild(slidesContainer);
        container.appendChild(dotsContainer);
        container.appendChild(left);
        container.appendChild(right);

        // function defineSizes(element, outContainer){
        // Get container's actual size
        //     let devWidth = outContainer.offsetWidth;
        //     let devHeight = outContainer.offsetHeight; 

        //     element.style.backgroundImage = "url(" + imgPath + ")";
        //     element.style.height = (devHeight) +'px';
        //     element.style.width = devWidth + 'px';
        // setTimeout('changeImage()', time);
        //     return element;
        // }

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

            // Get the slides container
            let slidesContainer = document.getElementsByClassName('slides_container').item(0);
            
            // Get container's actual size
            let carContainer = document.getElementsByClassName('car_container').item(0);
            let devWidth = carContainer.offsetWidth;
            let devHeight = carContainer.offsetHeight;

            console.log(devWidth);
            console.log(- (index * devWidth)+'px')
            slidesContainer.style.marginLeft = -(index * devWidth)+'px';
            // slidesContainer.animate([
            //     {marginLeft: -(index * devWidth)+'px'},
            //     {opacity: .4},
            //     {opacity: 1}
            // ],{
            //     duration: 1250,
            // });

            console.log(index);
        }

    }
}

document.addEventListener('DOMContentLoaded', () => {
    let carrousel = new Carrousel('main > section', 3, '/assets/img/carrousel_');
})