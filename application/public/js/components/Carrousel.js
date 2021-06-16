
document.addEventListener('DOMContentLoaded', () => {
    let carrousel = new Carrousel('carrousel');
})


class Carrousel{
    constructor(pContainer){

        // Load css
        let css = paw.newElement("link", "", {
            rel: "stylesheet",
            href: "assets/css/carrousel.css",
        });
        document.head.appendChild(css);

        // Handles display and image's prefix
        let index = 0;

        // Get the element
        let section = document.getElementById(pContainer);
        section.classList.add('car_container');

        // Get the figure holding the images
        let slidesContainer = document.querySelector('#slides_container');
        
        // Hold a ref to images quantity
        let qtyImgs = slidesContainer.children.length;

        // Create a container to hold a dot per image
        let dotsContainer = paw.newElement('div', '', {class: 'dot_container'});

        // Iterate over images' quantity
        for(var i = 0; i < qtyImgs; i++){

            // Create a dot per image with proper class and id asignation
            let dot = paw.newElement('button', '', {class: 'dot', id: 'dot'+i});

            // Handle click on dot
            dot.addEventListener('click', () => {
                setIndex(dot.id);
            });
            dotsContainer.appendChild(dot);
        }

        // Create left and right buttons
        let left = paw.newElement('button', '<', {class: 'btn_left btn_inactive', id:'button_left'});
        let right = paw.newElement('button', '>', {class: 'btn_right btn_inactive', id: 'button_right'});

        // !
        // TODO progress bar
        // !

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
            swipeDetect(slidesContainer);
        });

        // Connect everything
        section.appendChild(dotsContainer);
        section.appendChild(left);
        section.appendChild(right);

        function swipeDetect(targetElement){

            // Swipe direction
            let swipeDir;

            // To calculate direction
            let startX, startY, distX, distY;
            
            // Min distance to cover for being a swipe
            let thresh = 100; 

            // Max dist to cover in perpendicular dir to thresh
            let maxDist = 100; 

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
                // console.log('TOUCHEND:', touched);

                // Calculate swipe distance
                distX = touched.pageX - startX;
                distY = touched.pageY - startY;

                // Get swiping time duration 
                elapsedTime = new Date().getTime() - startTime;

                // If swiping time is not too long
                if(elapsedTime <= flightTime){
                    
                    // Is it a horizontal swipe?
                    if(Math.abs(distX) >= thresh && Math.abs(distY) <= maxDist){

                        // Change '>' for '<' to go against every rationale sense 
                        // and invert swipe directions jajaj
                        swipeDir = (distX > 0) ? 'left' : 'right';
                        
                        moveSlider(swipeDir);
                    }
                    // else it's a vertical swap and we don't care 
                    // but we comment the case porlasdú
                    // else if(Math.abs(distY) >= maxDist && Math.abs(distX) <= thresh){
                    //     swipeDir = (distY < 0) ?  'up' : 'down';
                    //     console.log(swipeDir);
                    // }
                }
            }, false);
        }

        function setIndex(pIndex){
            if (pIndex > index){
                moveSlider('right');
            }else{
                moveSlider('left');
            }
        }

        function moveSlider(direction){

            // Remove active dot
            let dot = document.getElementById('dot'+index);
            dot.classList.remove('dot_active');

            // Update index
            index += (direction === 'right') ? 1 : - 1;

            // Check upper limit
            index = (index >= qtyImgs) ? 0 : index;

            // Check lower limit
            index = (index < 0 ) ? qtyImgs-1 : index;

            // Update active dot
            dot = document.getElementById('dot'+index);
            dot.classList.add('dot_active');

            // Get container's actual size
            let devWidth = section.offsetWidth;
            let devHeight = section.offsetHeight;

            slidesContainer.classList.add('partial_opacity');
            slidesContainer.style.marginLeft = -(index * 2 * devWidth)+'px';
            slidesContainer.classList.add('full_opacity');

            console.log(index);
        }

    }
}
