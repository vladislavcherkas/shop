class Document {
    disableScroll() {}
    enableScroll() {}
}
class BasketApp {
    functionBeforeStart = false;
    functionBeforeStop = false;
    start() {
        console.log("start");
    }
    stop() {
        console.log("stop");
    }
}
const script = {};
function start() {
    script.basketApp = new BasketApp();
    script.functionBeforeStart = disableScroll();
    script.functionBeforeStop = enableScroll();
}
window.addEventListener("load", start);