// After loading, initiate script and keep listening for window resize 
document.addEventListener('DOMContentLoaded', (e) => {
    new DragAndDrop('label_orden');
});


// Globals
let element;
let parent;
let legend;
let fileInput;

// Back to the roots
function undoAll() {
    try{
        if(element.classList.contains('drop_zone')){
            element.classList.remove('drop_zone');
        }
    }catch(ex){
        console.log(ex);
    }
}

function clean(){
    try{
        element.classList.remove('drag_enter');
        element.classList.remove('drag_leave');
        element.classList.remove('drop_container');
        element.classList.add('label_orden');
        element.classList.add('drop_zone');

        let ps = document.getElementsByClassName('dropped_file');

        // Iterate in reverse order because removing modifies index
        for(var i = ps.length -1; i >= 0; i--){
            element.removeChild(ps[i]);
        }

    }catch(ex){
        console.log(ex);
    }
}

function handleResize(){
    // Add media query to be responsive
    const min_width = getComputedStyle(document.documentElement).getPropertyValue(
        "--min-width"
    );
    const mqIsDesktop = window.matchMedia('(min-width:'+min_width+')');
    mqIsDesktop.addEventListener("change", (e) => {
        if (! e.matches) {
            console.log('DRAG_DROP::MOBILE');
            undoAll();
        }
    });
}
        
function handleFiles(files) {
    for (var i = 0, len = files.length; i < len; i++) {
        let p = paw.newElement('p', files[i].name, {class: 'dropped_file'});
        element.appendChild(p);
    }
    // let inputFile = document.getElementById('orden_medica');
    // inputFile.files = files;
}

function handleDrop(e){
    try{       
        element.classList.remove('drag_enter');
        element.classList.remove('drag_leave');
        element.classList.remove('label_orden');
        element.classList.add('drop_container');
    }catch(ex){
        console.log(ex);
    }
    let files = e.dataTransfer.files;
    handleFiles(files);
}



class DragAndDrop{

    constructor(elementId, fileId){
        // Load css
        let css = paw.newElement("link", "", {
            rel: "stylesheet",
            href: "assets/css/drag_drop.css",
        });
        document.head.appendChild(css);

        // Get the element
        element = document.getElementById(elementId);

        // Add all classes
        element.classList.add("drop_zone");
        
        // Get limpiar button
        let button = document.querySelector('input[type="reset"]');
        button.addEventListener('click',() => {
            try{
                clean();
            }catch(ex){
                console.log(ex);
            }
        });

        // Add resize support
        handleResize();

        element.addEventListener("dragenter", (e) => {
            e.preventDefault();
            try{
                element.classList.remove('drag_leave');
                element.classList.add('drag_enter');
            }catch(ex){
                console.log(ex);
            }
            console.log("DRAGENTER");
        });
        element.addEventListener("dragleave", (e) => {
            e.preventDefault();
            try{
                element.classList.remove('drag_enter');
                element.classList.add('drag_leave');
            }catch(ex){
                console.log(ex);
            }
            console.log("DRAGLEAVE");
        });
        element.addEventListener("dragover", (e) => {
            e.preventDefault();
            try{
                element.classList.remove('drag_leave');
                element.classList.add('drag_enter');
            }catch(ex){
                console.log(ex);
            }
            console.log("DRAGOVER");
        });
        element.addEventListener("drop", (e) => {
            e.preventDefault();
            console.log("DROP");
            handleDrop(e);
        });


    }




}
