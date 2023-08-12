class Buttons {
    constructor() {
        this.dom = {
            left: window.document.querySelector(".gallery__left"),
            right: window.document.querySelector(".gallery__right"),
        }
        this.opacityMin = "20%";
        this.opacityMax = "65%";
    }
    darkBacklightRight() {
        this.dom.right.style.opacity = this.opacityMin;
    }
    darkBacklightLeft() {
        this.dom.left.style.opacity = this.opacityMin;
    }
    lightBacklightRight() {
        this.dom.right.style.opacity = this.opacityMax;
    }
    lightBacklightLeft() {
        this.dom.left.style.opacity = this.opacityMax;
    }
}
class Gallery extends Buttons {
    constructor() {
        super();
        this.dom = {
            gallery: window.document.querySelector(".gallery"),
            wrap: window.document.querySelector(".gallery__wrap"),
            fullScreen: window.document.querySelector(".gallery__full-screen"),
            left: window.document.querySelector(".gallery__left"),
            right: window.document.querySelector(".gallery__right"),
        }
        this.scrollY = 0;
        this.scrollHeight = this.dom.wrap.scrollHeight;
        this.addEventsListenerAll();
    }
    addEventsListenerAll() {
        this.dom.fullScreen.addEventListener("click", () => {this.switchFullscreen()});
        this.dom.left.addEventListener("click", () => {this.scrollLeft()});
        this.dom.right.addEventListener("click", () => {this.scrollRight()});
    }
    scrollRight() {
        this.scrollY += 250;
        if (this.scrollY > (this.scrollHeight - 250)) {
            this.scrollY -= 250;
        } else {
            this.scroll(0, scrollY);
        }
        this.backlightButtons();
    }
    scrollLeft() {
        this.scrollY -= 250;
        if (this.scrollY < 0) {
            this.scrollY += 250;
        } else {
            this.scroll(0, scrollY);
        }
        this.backlightButtons();
    }
    scroll() {
        this.dom.wrap.scroll(this.scrollX, this.scrollY);
    }
    switchFullscreen() {
        if (document.fullscreenElement) {
            document.exitFullscreen();
        } else {
            this.dom.gallery.requestFullscreen();
        }
    }
    scrollIsStart() {
        if (this.scrollY === 0) {
            return true;
        }
        return false;
    }
    scrollIsEnd() {
        if (this.scrollY === (this.scrollHeight - 250)) {
            return true;
        }
        return false;
    }
    backlightButtons() {
        if (this.scrollIsStart()) {
            super.darkBacklightLeft();
            super.lightBacklightRight();
        } else if (this.scrollIsEnd()) {
            super.darkBacklightRight();
            super.lightBacklightLeft();
        } else {
            super.lightBacklightRight();
            super.lightBacklightLeft();
        }
    }
}

function startup() {
    new Gallery();
}
window.addEventListener("load", startup);