
document.addEventListener('DOMContentLoaded', () => {
    let carrousel = new Carrousel('main > section', 3, '/assets/img/carrousel_');
    let swipeDetector = new SwipeDetector();
})


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
            let slide = paw.newElement('div', '', {class: 'slide'});

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

        // 
        // TODO Create progress bar
        // 

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

        // Handle swipe
        window.addEventListener('load', () => {
            let dir = swipeDetect(slidesContainer);
            console.log(dir);
            moveSlider(dir);
        });

        // Connect everything
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

        function swipeDetect(targetElement){

            let swipeDir;

            // To calculate direction
            let startX, startY, distX, distY;
            
            // Min distance to cover for being a swipe
            let thresh = 100; 

            // Max dist to cover in perpendicular dir to thresh
            let max_dist = 100; 

            // Time when finger was pressed
            let startTime;
            
            // Time elapsed since finger was pressed
            let elapsedTime;
            
            // Upper limit for elapsed time since finger was pressed
            let flightTime = 10000;
            
            // Handle finger press
            targetElement.addEventListener('touchstart', function (e){
                e.preventDefault;

                let touched = e.changedTouches[0];
                console.log('TOUCHSTART:',touched);

                // Init everything
                swipeDir = 'none';
                startX = touched.pageX;
                startY = touched.pageY;
                startTime = new Date().getTime();

            }, false);

            // Avoid swipe-scrolling
            targetElement.addEventListener('touchmove', function(e){
                e.preventDefault;
            }, false);

            // Handle figner lift
            targetElement.addEventListener('touchend', function(e){
                e.preventDefault;

                let touched = e.changedTouches[0];
                // ! remove later
                console.log('TOUCHEND:', touched);

                // Calculate swipe distance
                distX = touched.pageX - startX;
                distY = touched.pageY - startY;

                // Get swiping time duration 
                elapsedTime = new Date().getTime() - startTime;

                // If swiping time is not too long
                if(elapsedTime <= flightTime){
                    
                    // Is it a horizontal swipe?
                    if(Math.abs(distX) >= thresh && Math.abs(distY) <= max_dist){

                        // Change '>' for '<' to go against every rationale sense 
                        // and invert swipe directions jajaj
                        swipeDir = (distX > 0) ? 'left' : 'right';
                        
                        moveSlider(swipeDir);
                    }
                    // else it's a vertical swap and we don't care 
                    // but we comment the case porlasdú
                    // else if(Math.abs(distY) >= thresh && Math.abs(distX) <= thresh){
                    //     swipeDir = (distY < 0) ?  'up' : 'down';
                    //     console.log(swipeDir);
                    // }
                }
            }, false);
        }

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

            slidesContainer.classList.add('partial_opacity');
            slidesContainer.style.marginLeft = -(index * 2 * devWidth)+'px';
            slidesContainer.classList.add('full_opacity');
            // slidesContainer.classList.remove('partial_opacity');
            // slidesContainer.classList.remove('full_opacity');

            console.log(index);
        }

    }
}
