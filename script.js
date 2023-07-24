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
    script.functionBeforeStart = false;
    script.functionBeforeStop = false;
}
window.addEventListener("load", start);