class Body {
    body = window.document.querySelector("body");
    disableScroll() {
        this.body.style.overflowY = "hidden";
    }
    enableScroll() {
        this.body.style.overflowY = "scroll";
    }
}
class BasketAppAnimation {
    frequencyPerSecond = 60;
    playAnimation(initialValue, finalValue, duration, setPropertyValue) {
        if (initialValue === finalValue) {
            setPropertyValue(finalValue);
            return;
        }
        if (duration === 0) {
            setPropertyValue(finalValue);
            return;
        }
        const stepDuration = 1000 / this.frequencyPerSecond;
        const numberOfSteps = duration / stepDuration;
        let value = initialValue;
        let step;
        let interval;
        if (finalValue > initialValue) {
            const valueRange = finalValue - initialValue;
            step = valueRange / numberOfSteps;
            interval = setInterval(increase, stepDuration);
        } else {
            const valueRange = initialValue - finalValue;
            step = valueRange / numberOfSteps;
            interval = setInterval(decrease, stepDuration);
        }
        function decrease() {
            setPropertyValue(value);
            value = value - step;
            if (value < finalValue) {
                setPropertyValue(finalValue);
                clearInterval(interval);
            }
        }
        function increase() {
            setPropertyValue(value);
            value = value + step;
            if (value > finalValue) {
                setPropertyValue(finalValue);
                clearInterval(interval);
            }
        }
    }
}
class BasketAppDOM extends BasketAppAnimation {
    DOM = {
        basketApp: window.document.querySelector(".basket-app"),
    };
}
class BasketAppGUI extends BasketAppDOM {
    showGUI() {
        this.playAnimation(100, 0, 200, (value) => this.DOM.basketApp.style.left = `${value}vw`);
    }
    hideGUI() {
        this.playAnimation(0, 100, 200, (value) => this.DOM.basketApp.style.left = `${value}vw`);
    }
}
class BasketApp extends BasketAppGUI {
    functionBeforeStart = false;
    functionBeforeStop = false;
    start() {
        this.functionBeforeStart();
        this.showGUI();
    }
    stop() {
        this.functionBeforeStop();
        this.hideGUI();
    }
}
const script = {};
function start() {
    script.body = new Body();
    script.basketApp = new BasketApp();
    script.basketApp.functionBeforeStart = () => script.body.disableScroll();
    script.basketApp.functionBeforeStop = () => script.body.enableScroll();

    // DEVELOPMENT
    script.basketApp.start();
}
window.addEventListener("load", start);