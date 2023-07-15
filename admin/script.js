const instances = {}
class RequestPOST {
    constructor(file, data, receiver) {
        const body = this.convertToURL(data);
        const request = new XMLHttpRequest()
        function receiverNative() {
            receiver(this.responseText);
        }
        request.addEventListener("load", receiverNative);
        request.open("POST", file);
        request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        request.send(body);
    }
    convertToURL(data) {
        let url = "";
        for (let variable in data) {
            if (url !== "") {
                url = url.concat("&");
            }
            url = url.concat(variable, "=", data[variable]);
        }
        return url;
    }
}
class Authentication {
    constructor() {
        if (this.clientIsTrue()) {
            instances.layout.switch(".main");
        } else {
            instances.layout.switch(".login");
        }
    }
    clientIsTrue() {
        if (window.localStorage.getItem("is true") === "true") {
            return true;
        }
        return false;
    }
    authentication(firstName, lastName, password, receiver) {
        const data = {
            "first_name": firstName,
            "last_name": lastName,
            "password": password,
        }
        new RequestPOST("php/authentication.php", data, receiver);
    }
    setTrue() {
        window.localStorage.setItem("is true", "true");
    }
    unsetTrue() {
        window.localStorage.removeItem("is true");
    }
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
class Login {
    constructor() {
        this.styles = {
            colorWarning: "red",
            colorNormal: "#1a73e8",
        }
        this.dom = {
            login: window.document.querySelector(".login"),
            login__fail: window.document.querySelector(".login__fail"), 
            login__field: window.document.querySelectorAll(".login__field"), 
            login__signature: window.document.querySelectorAll(".login__signature"), 
            login__input: window.document.querySelectorAll(".login__input"), 
            login__eye: window.document.querySelector(".login__eye"),
            login__send: window.document.querySelector(".login__send"),
        }
        this.dom.login__send.addEventListener("click", () => { this.requestSending() });
        this.dom.login__eye.addEventListener("click", () => { this.switchPassword() });
    }
    requestSending() {
        this.resetBacklight();
        if (this.fieldsIsFilling()) {
            this.send();
        } else {
            this.scrollIntoViewFieldEmpty();
            this.highlightFieldsEmpty();
        }
    }
    fieldsIsFilling() {
        for (let id = 0; id < this.dom.login__field.length; id++) {
            if (this.dom.login__input[id].value === "") {
                return false;
            }
        }
        return true;
    }
    send() {
        instances.authentication.authentication(
            this.dom.login__input[0].value,
            this.dom.login__input[1].value,
            this.dom.login__input[2].value,
            (data) => {
                if (data === "true") {
                    instances.authentication.setTrue();
                    instances.layout.switch(".main");
                }
                if (data === "false") {
                    this.notifyFail();
                }
            },
        );
    }
    highlightFieldsEmpty() {
        for (let id = 0; id < this.dom.login__field.length; id++) {
            if (this.dom.login__input[id].value === "") {
                this.dom.login__signature[id].style.color = this.styles.colorWarning;
                this.dom.login__input[id].style.borderColor = this.styles.colorWarning;
            }
        }
    }
    resetBacklight() {
        for (let id = 0; id < this.dom.login__field.length; id++) {
            this.dom.login__signature[id].style.color = this.styles.colorNormal;
            this.dom.login__input[id].style.borderColor = this.styles.colorNormal;
        }
    }
    switchPassword() {
        const input = this.dom.login__input[2];
        const attribute = input.getAttribute("type");
        if (attribute === "password") {
            input.setAttribute("type", "text");
        }
        if (attribute === "text") {
            input.setAttribute("type", "password");
        }
        input.focus();
    }
    scrollIntoViewFieldEmpty() {
        for (let id = 0; id < this.dom.login__field.length; id++) {
            if (this.dom.login__input[id].value === "") {
                this.dom.login__input[id].scrollIntoView({block: "center", behavior: "smooth"});
                this.dom.login__input[id].focus();
                return true;
            }
        }
        return false;
    }
    notifyFail() {
        this.dom.login__fail.removeAttribute("hidden");
    }
}
class Main {
    constructor() {
        this.dom = {
            main: window.document.querySelector(".main"),
            main__header: window.document.querySelector(".main__header"),
            main__item: window.document.querySelectorAll(".main__item"),
            main__button: window.document.querySelectorAll(".main__button"),
        };
        this.dom.main__item[0].addEventListener("click", () => this.leave());
        this.dom.main__button[0].addEventListener("click", () => this.open(".products"));
        this.dom.main__button[1].addEventListener("click", () => this.open(".settings"));
        this.dom.main__button[2].addEventListener("click", () => this.open(".categories"));
        this.dom.main__button[3].addEventListener("click", () => this.open(".administrators"));
    }
    leave() {
        instances.authentication.unsetTrue();
        instances.layout.switch(".login");
    }
    open(selector) {
        instances.layout.switch(selector);
    }
}
class Administrators {
    dom = {};
    id = false;
    constructor() {
        this.unloadDom();
        this.setEventListenersDom();
        this.updateList();
    }
    unloadDom() {
        this.dom = {
            administrators__item: window.document.querySelectorAll(".administrators__item"),
            administrators__tbody: window.document.querySelector(".administrators__tbody"),
            administrators__row: window.document.querySelectorAll(".administrators__row"),
            administrators__rowINtd: window.document.querySelectorAll(".administrators__row>td"),
            administrators__window: window.document.querySelector(".administrators__window"),
        };
    }
    setEventListenersDom() {
        this.dom.administrators__item[0].addEventListener("click", () => this.back());
        this.dom.administrators__item[1].addEventListener("click", () => this.create());
    }
    back() {
        instances.layout.switch(".main");
    }
    create() {
        const file = "php/create/administrators.php";
        const data = {
            "firstName": "Нет",
            "lastName": "Нет",
            "password": "Нет",
        };
        const receiver = (data) => {
            this.updateList();
        };
        new RequestPOST(file, data, receiver);
    }
    open(id) {
        this.id = id;
        const data = [
            this.dom.administrators__rowINtd[id * 3 + 0].textContent,
            this.dom.administrators__rowINtd[id * 3 + 1].textContent,
            this.dom.administrators__rowINtd[id * 3 + 2].textContent,
        ];
        instances.administratorsWindow.open();
        instances.administratorsWindow.fillFields(data);
    }
    getListOfServer(receiver) {
        const file = "php/get/administrators.php";
        const data = {};
        function receiverNative(data) {
            receiver(JSON.parse(data));
        }
        new RequestPOST(file, data, receiverNative);
    }
    updateList() {
        const receiver = (data) => {
            this.updateListHtml(data.length);
            this.unloadDom();
            this.fillListHtml();
            for (let id = 0; id < this.dom.administrators__row.length; id++) {
                this.dom.administrators__row[id].addEventListener("click", () => this.open(id));
            }
        }
        this.getListOfServer(receiver);
    }
    resetListHtml() {
        // First forbidden delete (it is template)
        for (let id = 1; id < this.dom.administrators__row.length; id++) {
            this.dom.administrators__tbody.removeChild(this.dom.administrators__row[id]);
        }
    }
    updateListHtml(amountRows) {
        this.resetListHtml();
        for (let count = 1; count < amountRows; count++) {
            const newNode = this.dom.administrators__row[0].cloneNode(true);
            this.dom.administrators__tbody.appendChild(newNode);
        }
    }
    fillListHtml() {
        const receiver = (data) => {
            const fillColumn1 = () => {
                let idTd = 0;
                for (let id in data) {
                    this.dom.administrators__rowINtd[idTd].textContent = data[id].firstName;
                    idTd = idTd + 3;
                }
            };
            const fillColumn2 = () => {
                let idTd = 1;
                for (let id in data) {
                    this.dom.administrators__rowINtd[idTd].textContent = data[id].lastName;
                    idTd = idTd + 3;
                }
            };
            const fillColumn3 = () => {
                let idTd = 2;
                for (let id in data) {
                    this.dom.administrators__rowINtd[idTd].textContent = data[id].password;
                    idTd = idTd + 3;
                }
            };
            fillColumn1();
            fillColumn2();
            fillColumn3();
        }
        this.getListOfServer(receiver);
    }
    delete(firstName, lastName, password) {
        const file = "php/delete/administrators.php";
        const data = {
            "firstName": firstName,
            "lastName": lastName,
            "password": password,
        };
        const receiver = (data) => {
            this.updateList();
        };
        new RequestPOST(file, data, receiver);
    }
    next(firstName, lastName, password,
            firstNameNew, lastNameNew, passwordNew) {
        const file = "php/edit/administrators.php";
        const data = {
            "firstName": firstName,
            "lastName": lastName,
            "password": password,
            "firstNameNew": firstNameNew,
            "lastNameNew": lastNameNew,
            "passwordNew": passwordNew,
        };
        const receiver = (data) => {
            this.updateList();
        };
        new RequestPOST(file, data, receiver);
    }
}
class AdministratorsWindow {
    constructor() {
        this.dom = {
            administrators__window: window.document.querySelector(".administrators__window"),
            administrators__input: window.document.querySelectorAll(".administrators__input"),
            administrators__button: window.document.querySelectorAll(".administrators__button"),
        }
        this.dom.administrators__button[0].addEventListener("click", () => this.close());
        this.dom.administrators__button[1].addEventListener("click", () => this.delete());
        this.dom.administrators__button[2].addEventListener("click", () => this.next());
    }
    open() {
        this.dom.administrators__window.style.zIndex = 0;
    }
    close() {
        this.dom.administrators__window.style.zIndex = -1;
    }
    fillFields(data) {
        this.dom.administrators__input[0].value = data[0];
        this.dom.administrators__input[1].value = data[1];
        this.dom.administrators__input[2].value = data[2];
    }
    delete() {
        const firstName = this.dom.administrators__input[0].value;
        const lastName = this.dom.administrators__input[1].value;
        const password = this.dom.administrators__input[2].value;
        instances.administrators.delete(firstName, lastName, password);
        this.close();
    }
    next() {
        const id = instances.administrators.id;
        const firstName = instances.administrators.dom.administrators__rowINtd[id * 3 + 0].textContent;
        const lastName = instances.administrators.dom.administrators__rowINtd[id * 3 + 1].textContent;
        const password = instances.administrators.dom.administrators__rowINtd[id * 3 + 2].textContent;
        const firstNameNew = this.dom.administrators__input[0].value;
        const lastNameNew = this.dom.administrators__input[1].value;
        const passwordNew = this.dom.administrators__input[2].value;
        instances.administrators.next(firstName, lastName, password,
            firstNameNew, lastNameNew, passwordNew);
        this.close();
    }
}
class Categories {
    constructor() {
        this.dom = {
            categories__item: window.document.querySelectorAll(".categories__item"),
        };
        this.dom.categories__item[0].addEventListener("click", () => this.back());
    }
    back() {
        instances.layout.switch(".main");
    }
}
class Settings {
    dom = {};
    id = false;
    constructor() {
        this.unloadDom();
        this.setEventListenersDom();
        this.updateList();
    }
    unloadDom() {
        this.dom = {
            settings__item: window.document.querySelectorAll(".settings__item"),
            settings__tbody: window.document.querySelector(".settings__tbody"),
            settings__row: window.document.querySelectorAll(".settings__row"),
            settings__data: window.document.querySelectorAll(".settings__data"),
        };
    }
    setEventListenersDom() {
        this.dom.settings__item[0].addEventListener("click", () => this.back());
    }
    back() {
        instances.layout.switch(".main");
    }
    updateList() {
        const receiver = (data) => {
            this.updateListHtml(data.length);
            this.unloadDom();
            this.fillListHtml();
            for (let id = 0; id < this.dom.settings__row.length; id++) {
                this.dom.settings__row[id].addEventListener("click", () => this.open(id));
            }
        }
        this.getListOfServer(receiver);
    }
    updateListHtml(amountRows) {
        this.resetListHtml();
        for (let count = 1; count < amountRows; count++) {
            const newNode = this.dom.settings__row[0].cloneNode(true);
            this.dom.settings__tbody.appendChild(newNode);
        }
    }
    resetListHtml() {
        // First forbidden delete (it is template)
        for (let id = 1; id < this.dom.settings__row.length; id++) {
            this.dom.settings__tbody.removeChild(this.dom.settings__row[id]);
        }
    }
    fillListHtml() {
        const receiver = (data) => {
            const fillColumn1 = () => {
                let idTd = 0;
                for (let id in data) {
                    this.dom.settings__data[idTd].textContent = data[id].nameSetting;
                    idTd = idTd + 2;
                }
            };
            const fillColumn2 = () => {
                let idTd = 1;
                for (let id in data) {
                    this.dom.settings__data[idTd].textContent = data[id].valueSetting;
                    idTd = idTd + 2;
                }
            };
            fillColumn1();
            fillColumn2();
        }
        this.getListOfServer(receiver);
    }
    getListOfServer(receiver) {
        const file = "php/get/settings.php";
        const data = {};
        function receiverNative(data) {
            receiver(JSON.parse(data));
        }
        new RequestPOST(file, data, receiverNative);
    }
    next(nameSetting, valueSettingNew) {
        const file = "php/edit/settings.php";
        const data = {
            "nameSetting": nameSetting,
            "valueSettingNew": valueSettingNew,
        };
        const receiver = (data) => {
            this.updateList();
        };
        new RequestPOST(file, data, receiver);
    }
    open(id) {
        this.id = id;
        const data = [
            this.dom.settings__data[id * 2 + 1].textContent,
        ];
        instances.settingsWindow.open();
        instances.settingsWindow.fillFields(data);
    }
}
class SettingsWindow {
    constructor() {
        this.dom = {
            settings__window: window.document.querySelector(".settings__window"),
            settings__input: window.document.querySelectorAll(".settings__input"),
            settings__button: window.document.querySelectorAll(".settings__button"),
        }
        this.dom.settings__button[0].addEventListener("click", () => this.close());
        this.dom.settings__button[1].addEventListener("click", () => this.next());
    }
    open() {
        this.dom.settings__window.style.zIndex = 0;
    }
    close() {
        this.dom.settings__window.style.zIndex = -1;
    }
    fillFields(data) {
        this.dom.settings__input[0].value = data[0];
    }
    next() {
        const id = instances.settings.id;
        const nameSetting = instances.settings.dom.settings__data[id * 2 + 0].textContent;
        const valueSettingNew = this.dom.settings__input[0].value;
        instances.settings.next(nameSetting, valueSettingNew);
        this.close();
    }
}
class Products {
    dom = {};
    id = false;
    data = false;
    constructor() {
        this.unloadDom();
        this.setEventListenersDom();
        this.updateList();
    }
    unloadDom() {
        this.dom = {
            products__item: window.document.querySelectorAll(".products__item"),
            products__tbody: window.document.querySelector(".products__tbody"),
            products__row: window.document.querySelectorAll(".products__row"),
            products__data: window.document.querySelectorAll(".products__data"),
        };
    }
    setEventListenersDom() {
        this.dom.products__item[0].addEventListener("click", () => this.back());
        this.dom.products__item[1].addEventListener("click", () => this.create());
    }
    back() {
        instances.layout.switch(".main");
    }
    create() {
        const receiver = (data) => {
            this.updateList();
        };
        new RequestPOST("php/create/products.php", {}, receiver);
    }
    resetListHtml() {
        // First forbidden delete (it is template)
        for (let id = 1; id < this.dom.products__row.length; id++) {
            this.dom.products__tbody.removeChild(this.dom.products__row[id]);
        }
    }
    getListOfServer(receiver) {
        const file = "php/get/products.php";
        const data = {};
        function receiverNative(data) {
            receiver(JSON.parse(data));
        }
        new RequestPOST(file, data, receiverNative);
    }
    updateList() {
        const receiver = (data) => {
            this.updateListHtml(data.length);
            this.unloadDom();
            this.fillListHtml();
            for (let id = 0; id < this.dom.products__row.length; id++) {
                this.dom.products__row[id].addEventListener("click", () => this.open(id));
            }
        }
        this.getListOfServer(receiver);
    }
    updateListHtml(amountRows) {
        this.resetListHtml();
        for (let count = 1; count < amountRows; count++) {
            const newNode = this.dom.products__row[0].cloneNode(true);
            this.dom.products__tbody.appendChild(newNode);
        }
    }
    fillListHtml() {
        const receiver = (data) => {
            const fillColumn1 = () => {
                let idData = 0;
                for (let id in data) {
                    this.dom.products__data[idData].textContent = data[id].id;
                    idData = idData + 3;
                }
            };
            const fillColumn2 = () => {
                let idData = 1;
                for (let id in data) {
                    this.dom.products__data[idData].textContent = data[id].title;
                    idData = idData + 3;
                }
            };
            const fillColumn3 = () => {
                let idData = 2;
                for (let id in data) {
                    this.dom.products__data[idData].textContent = data[id].price;
                    idData = idData + 3;
                }
            };
            fillColumn1();
            fillColumn2();
            fillColumn3();
        }
        this.getListOfServer(receiver);
    }
    open(id) {
        this.id = id;
        const receiver = (data) => {
            this.data = data;
            instances.productsWindow.open();
            instances.productsWindow.fill(data[id]);
        };
        this.getListOfServer(receiver);
    }
    getId() {
        return instances.products.data[instances.products.id].id;
    }
}
class ProductsWindow {
    photoPicked = false;
    idInDOMPickedPhoto = false;
    constructor() {
        this.dom = {
            products__window: window.document.querySelector(".products__window"),
            products__button: window.document.querySelectorAll(".products__button"),
            products__signature: window.document.querySelectorAll(".products__signature"),
            products__select: window.document.querySelector(".products__select"),
            products__input: window.document.querySelectorAll(".products__input"),
            products__inputPhotos: window.document.querySelector(".products__input-photos"),
        }
        this.dom.products__button[0].addEventListener("click", () => this.close());
        this.dom.products__button[1].addEventListener("click", () => this.delete());
        this.dom.products__button[4].addEventListener("click", () => this.dom.products__inputPhotos.click());
        this.dom.products__inputPhotos.addEventListener("change", () => this.sendPhotos());
        this.dom.products__input[0].addEventListener("input", () => this.addBacklightTitleInput());
        this.dom.products__input[0].addEventListener("change", () => this.requestEditTitle());
        this.dom.products__select.addEventListener("input", () => this.addBacklightSelectInput());
        this.dom.products__select.addEventListener("change", () => this.requestEditSelect());
        this.dom.products__input[1].addEventListener("input", () => this.addBacklightPriceInput());
        this.dom.products__input[1].addEventListener("change", () => this.requestEditPrice());
    }
    open() {
        this.dom.products__window.style.zIndex = 0;
    }
    close() {
        instances.products.updateList();
        this.unpickAllPhotos();
        this.dom.products__window.style.zIndex = -1;
    }
    delete() {
        const receiver = (data) => {
            new RequestPOST(
                "php/delete/products.php",
                {
                    "id": data[instances.products.id].id,
                },
                (data) => {
                    instances.products.updateList();
                    this.close();
                },
            );
        };
        instances.products.getListOfServer(receiver);
    }
    fill(data) {
        instances.productsWindowFiller.fillAll(data);
    }
    sendPhotos() {
        const files = this.dom.products__inputPhotos.files;
        const body = new FormData();
        body.append("id_product", instances.products.data[instances.products.id].id);
        for (let id_file in files) {
            body.append(id_file, files[id_file]);
        }
        const options = {
            method: "POST",
            body: body,
        };
        fetch("php/create/products-photos.php", options)
            .then(response => response.text())
            .then(text => {
                for (let namePhoto of JSON.parse(text)) {
                    instances.productsWindowFiller.createPhoto(namePhoto);
                }
            });
    }
    pickPhoto(idPhotoInDOM) {
        if (this.photoPicked && (idPhotoInDOM === this.idInDOMPickedPhoto)) {
            this.unpickPhoto(idPhotoInDOM);
            this.photoPicked = false;
            this.idInDOMPickedPhoto = false;
            return false;
        }
        this.photoPicked = true;
        this.idInDOMPickedPhoto = idPhotoInDOM;
        const photos = window.document.querySelectorAll(".products__photo");
        this.resetColorBorderPhotos(photos);
        photos[idPhotoInDOM].style.borderColor = "#ff9900";
        this.deleteAllButtonsOnPhoto();
        this.glueButtonsOnPhoto(idPhotoInDOM);
    }
    unpickPhoto(idPhotoInDOM) {
        // No recommended use or use next view:
        // unpickPhoto(idPhotoInDOM)
        // this.photoPicked = false
        // this.idInDOMPickedPhoto = false
        const photos = window.document.querySelectorAll(".products__photo");
        photos[idPhotoInDOM].style.borderColor = "#1a73e8";
        this.deleteAllButtonsOnPhoto();
    }
    unpickAllPhotos() {
        const photos = window.document.querySelectorAll(".products__photo");
        this.resetColorBorderPhotos(photos);
        this.photoPicked = false;
        this.idInDOMPickedPhoto = false;
        this.deleteAllButtonsOnPhoto();
    }
    resetColorBorderPhotos(photos) {
        for (let photo of photos) {
            photo.style.borderColor = "#1a73e8";
        }
    }
    glueButtonsOnPhoto(idPhotoInDOM) {
        const panel = window.document.createElement("div");
        const buttonDelete = window.document.createElement("img");
        const buttonSetMain = window.document.createElement("img");
        panel.className = "products__panel-photo";
        buttonDelete.className = "products__button-photo";
        buttonSetMain.className = "products__button-photo";
        buttonDelete.src = "/images/delete_red.png";
        buttonSetMain.src = "/images/home_darkviolet.png";
        buttonDelete.addEventListener("click", () => this.deletePhoto(idPhotoInDOM));
        buttonSetMain.addEventListener("click", () => this.setMainPhoto(idPhotoInDOM));
        const gallery = window.document.querySelector(".products__gallery");
        const photo = window.document.querySelectorAll(".products__photo")[idPhotoInDOM];
        gallery.insertBefore(panel, photo);
        panel.appendChild(buttonSetMain);
        panel.appendChild(buttonDelete);
    }
    setMainPhoto(idPhotoInDOM) {
        this.getPhotoList(photoNames => {
            const photoName = photoNames[idPhotoInDOM];
            this.requestSetMainPhotoByName(photoName, () => {
                this.unpickAllPhotos();
                instances.products.getListOfServer(data => {
                    instances.productsWindowFiller.photos(data[instances.products.id].photos);
                });
            });
        });
    }
    deletePhoto(idPhotoInDOM) {
        this.getPhotoList(photoNames => {
            const photoName = photoNames[idPhotoInDOM];
            this.requestDeletionPhotoByName(photoName, () => {
                this.unpickAllPhotos();
                instances.products.getListOfServer(data => {
                    instances.productsWindowFiller.photos(data[instances.products.id].photos);
                });
            });
        });
    }
    getPhotoList(output) {
        const body = new FormData();
        body.append("idProduct", instances.products.data[instances.products.id].id);
        const options = {
            method: "POST",
            body: body,
        };
        fetch("php/get/products-photo-names.php", options)
            .then(response => response.text())
            .then(photoNames => output(JSON.parse(photoNames)));
    }
    requestSetMainPhotoByName(name, output) {
        const body = new FormData();
        body.append("idProduct", instances.products.data[instances.products.id].id);
        body.append("name", name);
        const options = {
            method: "POST",
            body: body,
        };
        fetch("php/edit/products-set-main-photo.php", options)
            .then(() => output());
    }
    requestDeletionPhotoByName(name, output) {
        const body = new FormData();
        body.append("idProduct", instances.products.data[instances.products.id].id);
        body.append("name", name);
        const options = {
            method: "POST",
            body: body,
        };
        fetch("php/delete/products-photo.php", options)
            .then(() => output());
    }
    requestEditTitle() {
        const body = new FormData();
        body.append("productId", instances.products.data[instances.products.id].id);
        body.append("title", this.dom.products__input[0].value);
        fetch("php/edit/products-title.php", {method: "POST", body: body})
            .then(response => response.text())
            .then(title => {
                if (this.dom.products__input[0].value === title) {
                    this.removeBacklightTitleInput();
                }
            });
    }
    requestEditSelect() {
        const body = new FormData();
        body.append("productId", instances.products.data[instances.products.id].id);
        body.append("existence", this.dom.products__select.value);
        fetch("php/edit/products-existence.php", {method: "POST", body: body})
            .then(response => response.text())
            .then(existence => {
                if (this.dom.products__select.value === existence) {
                    this.removeBacklightSelectInput();
                }
            });
    }
    requestEditPrice() {
        const body = new FormData();
        body.append("productId", instances.products.data[instances.products.id].id);
        body.append("price", this.dom.products__input[1].value);
        fetch("php/edit/products-price.php", {method: "POST", body: body})
            .then(response => response.text())
            .then(price => {
                if (this.dom.products__input[1].value === price) {
                    this.removeBacklightPriceInput();
                }
            });
    }
    addBacklightTitleInput() {
        this.dom.products__signature[0].style.color = "#ff9900";
        this.dom.products__input[0].style.borderColor = "#ff9900";
    }
    addBacklightSelectInput() {
        this.dom.products__select.style.borderColor = "#ff9900";
    }
    addBacklightPriceInput() {
        this.dom.products__signature[1].style.color = "#ff9900";
        this.dom.products__input[1].style.borderColor = "#ff9900";
    }
    removeBacklightTitleInput() {
        this.dom.products__signature[0].style.color = "#1a73e8";
        this.dom.products__input[0].style.borderColor = "#1a73e8";
    }
    removeBacklightSelectInput() {
        this.dom.products__select.style.borderColor = "#1a73e8";
    }
    removeBacklightPriceInput() {
        this.dom.products__signature[1].style.color = "#1a73e8";
        this.dom.products__input[1].style.borderColor = "#1a73e8";
    }
    deleteAllButtonsOnPhoto() {
        const panels = window.document.querySelectorAll(".products__panel-photo");
        for (let panel of panels) {
            panel.parentNode.removeChild(panel);
        }
    }
}
class ProductsWindowFillerUtility {
    setExistence(existence) {
        this.dom.products__select.value = existence;
    }
    existenceVerification(existence) {
        if (this.existenceValues.includes(existence)) {
            return "true";
        } else {
            if (existence === "") {
                return "warning";
            } else {
                return "false";
            }
        }
    }
}
class ProductsWindowFiller extends ProductsWindowFillerUtility {
    existenceValues = ["1", "2", "3", "4", "5"];
    constructor() {
        super();
        this.dom = {
            products__select: window.document.querySelector(".products__select"),
            products__input: window.document.querySelectorAll(".products__input"),
            products__textarea: window.document.querySelector(".products__textarea"),
        };
    }
    fillAll(data) {
        this.title(data.title);
        this.existence(data.existence);
        this.price(data.price);
        this.description(data.description);
        this.photos(data.photos);
    }
    title(title) {
        this.dom.products__input[0].value = title;
    }
    existence(existence) {
        const verification = this.existenceVerification(existence);
        if (verification === "warning") {
            existence = "4";
        }
        if (verification === "false") {
            existence = "5";
        }
        this.setExistence(existence);
    }
    price(price) {
        this.dom.products__input[1].value = price;
    }
    description(description) {
        this.dom.products__textarea.value = description;
    }
    photos(data) {
        this.deleteAllPhotos();
        function filter(item) {
            if ((item === " ") || (item === "")) {
                return false;
            } else {
                return true;
            }
        }
        const photos = data.split(" ");
        this.createPhotos(photos.filter(filter));
    }
    deleteAllPhotos() {
        const products__gallery = window.document.querySelector(".products__gallery");
        const products__photo = window.document.querySelectorAll(".products__photo");
        for (let photo of products__photo) {
            products__gallery.removeChild(photo);
        }
    }
    createPhotos(photos) {
        for (let namePhoto of photos) {
            this.createPhoto(namePhoto);
        }
    }
    createPhoto(name) {
        const products__gallery = window.document.querySelector(".products__gallery");
        const photo = window.document.createElement("img");
        photo.src = "/images/products/" + name;
        photo.className = "products__photo";
        products__gallery.appendChild(photo);
        const idPhotoInDOM = window.document.querySelectorAll(".products__photo").length - 1;
        photo.addEventListener("click", () => instances.productsWindow.pickPhoto(idPhotoInDOM));
    }
}
class Features {
    selectorList = {
        buttonDelete: ".products__image",
        tableBody: ".products__table-body",
        tableRow: ".products__table-row",
        tableData: ".products__table-data",
        tableInput: ".products__table-input",
        buttonAdd: "button-add-product-feature",
        buttonRemain: "button-remain-product-feature",
    };
    features = false;
    featuresLength = false;
    colorList = {
        active: "#ff9900",
        inactive: "#00000000",
    };
    setEventListeners() {
        const dom = this.getDOM(true);
        dom.buttonAdd.addEventListener("click", () => {console.log("add")});
        dom.buttonRemain.addEventListener("click", () => {console.log("remain")});
        // Buttons for deletion
        let id = 1;
        let rowId = 1;
        let columnId = 1;
        for (let tableData of dom.tableData) {
            if (rowId > 1) {
                if (columnId === 1) {
                    const constId = id++;
                    tableData.addEventListener("click", () => this.delete(constId));
                }
            }
            rowId = (columnId === 3) ? rowId + 1 : rowId;
            columnId = (columnId === 3) ? 1 : columnId + 1; 
        }
        // Fields
        id = 1;
        let absoluteId = 0;
        for (let tableInput of dom.tableInput) {
            if (absoluteId > 1) {
                const constId = id;
                const constAbsoluteId = absoluteId;
                tableInput.addEventListener("change", () => this.edit(constAbsoluteId, constId));
                id++;
            }
            absoluteId++;
        }
    }
    setContent() {
        this.erase();
        this.uploadFeaturesOfServer(() => {
            this.createHTML();
            this.insertInHTML();
            this.setEventListeners();
        });
    }
    erase() {
        const rowList = this.getDOM("tableRow").tableRow;
        let permit = false;
        for (let row of rowList) {
            if (permit) {
                row.parentNode.removeChild(row)
            } else {
                permit = true
            }
        }
    }
    getDOM(elementName) {
        if (elementName === false) {
            return false;
        }
        const DOM = {};
        if ((elementName === "tableBody") || (elementName === true)) {
            DOM.tableBody = window.document.querySelector(this.selectorList.tableBody);
        }
        if ((elementName === "tableRow") || (elementName === true)) {
            DOM.tableRow = window.document.querySelectorAll(this.selectorList.tableRow);
        }
        if ((elementName === "tableData") || (elementName === true)) {
            DOM.tableData = window.document.querySelectorAll(this.selectorList.tableData);
        }
        if ((elementName === "tableInput") || (elementName === true)) {
            DOM.tableInput = window.document.querySelectorAll(this.selectorList.tableInput);
        }
        if ((elementName === "buttonAdd") || (elementName === true)) {
            DOM.buttonAdd = window.document.getElementById(this.selectorList.buttonAdd);
        }
        if ((elementName === "buttonRemain") || (elementName === true)) {
            DOM.buttonRemain = window.document.getElementById(this.selectorList.buttonRemain);
        }
        if ((elementName === "buttonDelete") || (elementName === true)) {
            DOM.buttonDelete = window.document.querySelectorAll(this.selectorList.buttonDelete);
        }
        return DOM;
    }
    createHTML() {
        if (this.featuresLength === false) {
            return false;
        }
        const tableBody = this.getDOM("tableBody").tableBody;
        const template = this.getDOM("tableRow").tableRow[0];
        let length = this.featuresLength;
        while (length--) {
            const copy = template.cloneNode(true);
            copy.removeAttribute("hidden");
            tableBody.appendChild(copy);
        }
    }
    uploadFeaturesOfServer(returnAsync) {
        const body = new FormData();
        body.append("productId", instances.products.getId());
        const options = {
            method: "POST",
            body: body,
        };
        fetch("php/get/features.php", options)
            .then(response => response.text())
            .then(text => {
                console.log(`"${text}"`);
                const features = JSON.parse(text);
                if (this.verification(features)) {
                    this.save(features);
                    returnAsync();
                }
            });
    }
    verification(features) {
        try {
            let empty = true;
            for (let key in features) {
                empty = false;
                let value = features[key];
                if ((typeof key !== "string")
                        || (typeof value !== "string")) {
                    return false;
                }
            }
            if (empty) {
                return false;
            }
        } catch (e) {
            return false;
        }
        return true;
    }
    save(features) {
        let length = 0;
        for (let key in features) {length += 1}
        if (length === 0) {
            this.featuresLength = false;
            this.features = false;
        } else {
            this.featuresLength = length;
            this.features = features;
        }
    }
    insertInHTML() {
        if (this.featuresLength === false) {
            return false;
        }
        const content = this.getPreparedHtmlContent();
        console.log(content);
        for (let tableInput of this.getDOM("tableInput").tableInput) {
            const contentItem = content.shift();
            if (contentItem !== false) {
                tableInput.value = contentItem;
            }
        }
    }
    getPreparedHtmlContent() {
        const dataContent = [];
        dataContent.push(false);
        dataContent.push(false);
        for (let key in this.features) {
            dataContent.push(key);
            dataContent.push(this.features[key]);
        }
        return dataContent;
    }
    addBacklightInput(id) {
        this.getDOM("tableInput").tableInput[id].style.borderColor = this.colorList.active;
    }
    removeBacklightInput(id) {
        this.getDOM("tableInput").tableInput[id].style.borderColor = this.colorList.inactive;
    }
    addBacklightDeleteButton(id) {
        this.getDOM("buttonDelete").buttonDelete[id].style.borderColor = this.colorList.active;
    }
    delete(id) {
        const newFeatures = {};
        let i = 1;
        for (let key in this.features) {
            if (i !== id) {
                newFeatures[key] = this.features[key];
            }
            i++;
        }
        this.addBacklightDeleteButton(id);
        this.uploadToServer(newFeatures, () => {
            this.setContent();
        });
    }
    edit(absoluteId, id) {
        this.addBacklightInput(absoluteId);
        const body = new FormData();
        body.append("type", "single");
        body.append("id", id);
        body.append("features", this.getSingle(id));
        const options = {
            method: "POST",
            body: body,
        };
        fetch("php/edit/features.php", options)
            .then(response => response.text())
            .then(text => {
                if (text === "true") {
                    this.removeBacklightInput(absoluteId);
                }
            });
    }
    uploadToServer(newFeatures, output) {
        const body = new FormData();
        body.append("type", "all");
        body.append("features", JSON.stringify(newFeatures));
        const options = {
            method: "POST",
            body: body,
        };
        fetch("php/edit/features.php", options)
            .then(response => response.text())
            .then(text => {
                if (text === "true") {
                    output();
                }
            });
    }
    getSingle(id) {
        // DEVELOPMENT
        return {"d": "ds"};
    }
}
const app = {};
function start() {
    instances.layout = new Layout();
    instances.login = new Login();
    instances.authentication = new Authentication();
    instances.main = new Main();
    instances.administrators = new Administrators();
    instances.administratorsWindow = new AdministratorsWindow();
    instances.categories = new Categories();
    instances.settings = new Settings();
    instances.settingsWindow = new SettingsWindow();
    instances.products = new Products();
    instances.productsWindow = new ProductsWindow();
    instances.productsWindowFiller = new ProductsWindowFiller();
    instances.productsWindowFillerUtility = new ProductsWindowFillerUtility();
    instances.features = new Features();
}
window.addEventListener("load", start);