<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/admin/admin.php");
class Login {
    public function __construct() {
        if (!$this->clientIsTrust()) {
            if ($this->fieldsIsSet()) {
                $response = $this->authorization();
                if ($response) {
                    setcookie("trust", "true");
                    $_COOKIE["trust"] = "true";
                }
            }
        }
    }
    public function clientIsTrust() {
        if (isset($_COOKIE["trust"])) {
            return true;
        }
        return false;
    }
    public function authorization() {
        $first_name = $_POST["first-name"];
        $last_name = $_POST["last-name"];
        $password = $_POST["password"];
        if ((new Admin())->login($first_name, $last_name, $password)) {
            return true;
        }
        return false;
    }
    public function fieldsIsSet() {
        return (
            isset($_POST["first-name"]) &&
            isset($_POST["last-name"]) &&
            isset($_POST["password"])
        );
    }
    public function out() {
        setcookie("trust", "");
    }
}
$login = new Login();
if ($login->clientIsTrust()) {
    if (isset($_POST["screen"])) {
        $screen = $_POST["screen"];
    } else {
        $screen = "main";
    }
} else {
    $screen = "login";
}
if (isset($_POST["out"])) {
    $login->out();
    $screen = "login";
}
if (isset($_POST["favicon"])) {
    var_dump($_FILES);
}
var_dump($_POST);
var_dump($_FILES);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Администрация</title>
    <link rel="icon" type="image/png" href="/images/favicon.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if ($screen === "login"): ?>
        <form method="post">
            <div class="login">
                <div class="login__logo"><img src="/images/logo.png"></div>
                <div class="login__title">Вход</div>
                <div class="login__field">
                    <div class="login__signature">Имя</div>
                    <input class="login__input" type="text" name="first-name">
                </div>
                <div class="login__field">
                    <div class="login__signature">Фамилия</div>
                    <input class="login__input" type="text" show="password" name="last-name">
                </div>
                <div class="login__field">
                    <div class="login__signature">Пароль</div>
                    <img class="login__eye" src="/images/eye.png">
                    <input class="login__input" type="password" name="password">
                </div>
                <div class="login__confirm button">Дальше</div>
            </div>
        </form>
        <script src="login.js"></script>
    <?php elseif ($screen === "main"): ?>
        <div class="header">
            <form method="post">
                <button type="submit" name="out">
                    <img class="header__item" src="/images/leave.png" width="30" height="30">
                </button>
            </form>
            <form method="post" enctype="multipart/form-data">
                <label>
                    <input hidden type="file" name="favicon">
                    <img class="header__item" src="/images/favicon.png" width="30" height="30">
                </label>
                <button type="submit">
                    <img class="header__item" src="/images/replace.png" width="30" height="30">
                </button>
            </form>
        </div>
        <form class="functions" method="post">
            <div class="functions__item">
                <button type="submit" name="screen" value="categories">
                    Товары</button>
            </div>
            <div class="functions__item">
                <button type="submit" name="screen" value="categories">
                    Категории</button>
            </div>
            <div class="functions__item">
                <button type="submit" name="screen" value="categories">
                    Статьи</button>
            </div>
            <div class="functions__item">
                <button type="submit" name="screen" value="categories">
                    Администраторы</button>
            </div>
        </div>
    <?php elseif ($screen === "products"): ?>
        products
    <?php elseif ($screen === "categories"): ?>
        <form method="post">
            <input type="text" name="screen" value="main">
            <button type="submit">back</button>
        </form>
        <form method="post" enctype="multipart/form-data">
            <label>
                <input hidden type="file" name="favicon">
                <img class="header__item" src="/images/favicon.png" width="30" height="30">
            </label>
            <button type="submit">
                <img class="header__item" src="/images/replace.png" width="30" height="30">
            </button>
        </form>
    <?php elseif ($screen === "articles"): ?>
        <form method="post">
            <input type="text" name="out">
            <button type="submit">Out</button>
        </form>
    <?php elseif ($screen === "admins"): ?>
        <form method="post">
            <input type="text" name="out">
            <button type="submit">Out</button>
        </form>
    <?php endif ?>
</body>
</html>