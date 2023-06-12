const instances = {
    layout: false,
}
class Layout {
    constructor() {
        this.dom = {
            layout: window.document.querySelector(".layout"),
            layout__screen: window.document.querySelectorAll(".layout__screen"),
        }
    }
    switch(selector) {
        this.closeAll();
        const screen = window.document.querySelector(selector);
        this.open(screen);
        
    }
    closeAll() {
        for (let id = 0; id < this.dom.layout__screen.length; id++) {
            this.close(this.dom.layout__screen[id]);
        }
    }
    open(screen) {
        screen.style.height = "100%";
    }
    close(screen) {
        screen.style.height = "0";
    }
}
function start() {
    instances.layout = new Layout();
}
window.addEventListener("load", start);