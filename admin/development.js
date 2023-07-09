function send() {
    const request = new XMLHttpRequest();
    function receiver() {
        console.log(this.responseText);
    }
    request.addEventListener("load", receiver);
    request.open("POST", "php/development.php");
    request.setRequestHeader("Content-Type", "multipart/form-data");
    console.log(window.document.form.file.value);
    request.send(window.document.form.file.value);
}
function start() {

}
window.addEventListener("load", start);