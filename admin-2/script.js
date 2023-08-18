class OpacityAnimation {
    static play(selector, type) {
        const ELEMENT = window.document.querySelector(selector);
        return new Promise((resolve) => {
            let opacity = type ? 0 : 100;
            const INTERVAL = setInterval(() => {
                if (type ? opacity >= 100 : opacity <= 0) {
                    clearInterval(INTERVAL);
                    resolve();
                }
                type ? opacity += 10 : opacity -= 10;
                ELEMENT.style.opacity = opacity + '%';
            }, 20);
        });
    }
}
class Screen {
    static open(selector) {
        window.document.querySelector(selector).parentNode.style.height = '100%';
    }
    static close(selector) {
        window.document.querySelector(selector).parentNode.style.height = '0';
    }
    static show(selector) {
        return OpacityAnimation.play(selector, true);
    }
    static hide(selector) {
        return OpacityAnimation.play(selector, false);
    }
}
class Load {
    static #iconInterval;
    static #iconDeg = 0;
    static #progress = 2;
    static play() {
        const ICON = window.document.querySelector('.load__icon');
        let turn = 22.5;
        this.#iconInterval = setInterval(() => {
            this.#iconDeg += turn;
            if (this.#iconDeg > 360) {
                this.#iconDeg = turn;
            }
            ICON.style.transform = `rotate(${this.#iconDeg}deg)`;
        }, 50);
    }
    static pause() {
        clearInterval(this.#iconInterval);
    }
    static setProgress(progress) {
        const ELEMENT = window.document.querySelector('.load__decoration');
        const INTERVAL = setInterval(() => {
            this.#progress += (progress - this.#progress) / 15;
            ELEMENT.style.width = this.#progress + '%';
            if (this.#progress >= progress) {
                ELEMENT.style.width = progress + '%';
                clearInterval(INTERVAL);
            }
        }, 20);
    }
}
class App {
    static #timeout;
    static async start() {
        this.#setTimeout(120000);
        window.document.body.style.opacity = 1;
        Screen.open('.load');
        Load.play();
        Screen.show('.load');
        await this.#loadHTML();
        Load.setProgress(70);
        await this.#loadCSS();
        Load.setProgress(90);
        await this.#loadJS();
    }
    static async #loadHTML() {
        return new Promise((resolve) => {
            const xhr = new XMLHttpRequest();
            xhr.addEventListener('load', () => {
                const ADMIN = window.document.querySelector('.admin');
                ADMIN.insertAdjacentHTML('beforeend', xhr.responseText);
                resolve();
            });
            xhr.open('GET', 'admin.html');
            xhr.send();
        });
    }
    static async #loadCSS() {
        return new Promise((resolve) => {
            const LINK = window.document.createElement('link');
            LINK.rel = 'stylesheet';
            LINK.href = 'admin.css';
            window.document.head.appendChild(LINK);
            resolve();
        });
    }
    static async #loadJS() {
        return new Promise((resolve) => {
            const SCRIPT = window.document.createElement('script');
            SCRIPT.src = 'admin.js';
            window.document.body.appendChild(SCRIPT);
            resolve();
        });
    }
    static #setTimeout(time) {
        this.#timeout = setTimeout(() => {
            Screen.hide('.load').then(() => {
                Load.pause();
                Screen.close('.load');
                Screen.open('.error');
                Screen.show('.error');
            });
        }, time);
    }
    static killTimeout() {
        clearInterval(this.#timeout);
    }
}
window.addEventListener('load', () => App.start());