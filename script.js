class Animation {
    constructor(element, property, startValue, endValue, time, step) {
        this.element = element;
        this.property = property;
        this.startValue = startValue;
        this.endValue = endValue;
        this.time = time;
        this.step = step;
        this.value = startValue;
        if (startValue === endValue) {
            return;
        }
        if (startValue < endValue) {
            const duration = time / ((endValue - startValue) / step);
            this.interval = setInterval(() => { this.increaseValue() }, duration);
        }
        if (startValue > endValue) {
            const duration = time / ((startValue - endValue) / step);
            this.interval = setInterval(() => { this.decreaseValue() }, duration);
        }
    }
    increaseValue() {
        this.value += this.step;
        if (this.value > this.endValue) {
            clearInterval(this.interval);
            this.setProperty(this.endValue);
            return;
        }
        this.setProperty(this.value);
    }
    decreaseValue() {
        this.value -= this.step;
        if (this.value < this.endValue) {
            clearInterval(this.interval);
            this.setProperty(this.endValue);
            return;
        }
        this.setProperty(this.value);
    }
    setProperty(value) {
        if (this.property === "height: *px") {
            this.element.style.height = value + "px";
        }
    }
}
class Product {
    constructor() {
        this.product__list = window.document.querySelector(".product__list");
        this.product__more = window.document.querySelector(".product__more");
        this.product__more.addEventListener("click", () => {this.showMore()});
        if (this.product__list.childElementCount < 12) {
            this.product__more.setAttribute("hidden", "");
        }
    }
    showMore() {
        new Animation(this.product__list, "height: *px", 1230, 3690, 2000, 2000 / 60);
        this.product__more.setAttribute("hidden", "");
    }
}
new Product();