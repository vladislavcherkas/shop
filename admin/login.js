class Login {
    constructor() {
        this.form = window.document.querySelector("form");
        this.login__signature = window.document.querySelectorAll(".login__signature");
        this.login__eye = window.document.querySelector(".login__eye");
        this.login__input = window.document.querySelectorAll(".login__input");
        this.login__confirm = window.document.querySelector(".login__confirm");
        this.addEventListeners();
    }
    addEventListeners() {
        this.login__eye.addEventListener("click", () => {this.switchType()});
        this.login__confirm.addEventListener("click", () => {this.confirm()});
    }
    switchType() {
        if (this.login__input[2].getAttribute("type") === "password") {
            this.login__input[2].setAttribute("type", "text");
        } else {
            this.login__input[2].setAttribute("type", "password");
        }
        this.login__input[2].focus();
    }
    confirm() {
        this.resetColorFields();
        if (this.fieldsIsEmpty()) {
            this.scrollToEmptyField();
            this.highlightEmptyField()
        } else {
            this.form.submit();
        }
    }
    scrollToEmptyField() {
        this.login__input[this.getEmptyField()].scrollIntoView(
            {behavior: "smooth", block: "center"});
    }
    getEmptyField() {
        for (let id = 0; id < this.login__input.length; id++) {
            if (this.fieldIsEmpty(id)) {
                return id;
            }
        }
    }
    fieldIsEmpty(id) {
        if (this.login__input[id].value === "") {
            return true;
        } else {
            return false;
        }
    }
    fieldsIsEmpty() {
        for (let id = 0; id < this.login__input.length; id++) {
            if (this.fieldIsEmpty(id)) {
                return true;
            }
        }
        return false;
    }
    highlightEmptyField() {
        this.login__input[this.getEmptyField()].style.borderColor = "red";
        this.login__input[this.getEmptyField()].focus();
        this.login__signature[this.getEmptyField()].style.color = "red";
    }
    resetColorFields() {
        for (let id = 0; id < this.login__input.length; id++) {
            this.login__input[id].style.borderColor = "#1a73e8";
            this.login__signature[id].style.color = "#1a73e8";
        }
    }
}
new Login();