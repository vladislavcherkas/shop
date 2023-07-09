class Item {
    constructor() {
        this.dom = {
            item: window.document.querySelectorAll(".item"),
            item__close: window.document.querySelectorAll(".item__close"),
            item__name: window.document.querySelectorAll(".item__name"),
            item__title: window.document.querySelectorAll(".item__title"),
            item__subtitle: window.document.querySelectorAll(".item__subtitle"),
            item__p: window.document.querySelectorAll(".item__p"),
        }
        for (let id = 0; id < this.dom.item.length; id++) {
            this.dom.item__name[id].addEventListener("click", () => this.switch(id));
            this.dom.item__close[id].addEventListener("click", () => this.close(id));
        }

    }
    switch(id) {
        this.resetHeight();
        this.open(id);
    }
    open(id) {
        this.dom.item[id].style.height = "auto";
        this.dom.item[id].style.borderColor = "#000";
    }
    close(id) {
        this.dom.item[id].style.height = "2em";
    }
    resetHeight() {
        for (let id = 0; id < this.dom.item.length; id++) {
            this.dom.item[id].style.height = "2em";
            this.dom.item[id].style.borderColor = "#ccc";
        }
    }
}
function start() {
    new Item();
}
window.addEventListener("load", start);