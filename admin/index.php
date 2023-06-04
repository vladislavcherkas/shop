<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/admin/admin.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/products.php");
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
if (isset($_FILES["favicon"])) {
    if ($_FILES["favicon"]["type"] === "image/png") {
        $name_target = $_SERVER["DOCUMENT_ROOT"] . "/images/favicon.png";
        move_uploaded_file($_FILES["favicon"]["tmp_name"], $name_target);
    } else {
        $error = "Пожалуйста используйте формат png";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Администрация</title>
    <link rel="icon" type="image/png" href="/images/favicon.png">
    <?php if ($screen === "login"): ?>
        <link rel="stylesheet" href="style.css">
    <?php elseif ($screen === "main"): ?>
        <link rel="stylesheet" href="style.css">
    <?php elseif ($screen === "products"): ?>
        <link rel="stylesheet" href="styles/products.css">
    <?php elseif ($screen === "categories"): ?>
        <link rel="stylesheet" href="styles/categories.css">
    <?php endif ?>
</head>
<body>
    <?php if ($screen === "login"): ?>
        <form method="post">
            <div class="login">
                <div class="login__logo"><img src="/images/favicon.png"></div>
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
            <form class="header__favicon" method="post" enctype="multipart/form-data">
                <label>
                    <input hidden type="file" name="favicon">
                    <img class="header__item" src="/images/favicon.png" width="30" height="30">
                </label>
                <button type="submit" name="favicon">
                    <img class="header__item" src="/images/replace.png" width="30" height="30">
                </button>
            </form>
        </div>
        <form class="functions" method="post">
            <div class="functions__item">
                <button type="submit" name="screen" value="products">
                    Товары</button>
            </div>
            <div class="functions__item">
                <button type="submit" name="screen" value="categories">
                    Категории</button>
            </div>
            <div class="functions__item">
                <button type="submit" name="screen" value="">
                    Статьи</button>
            </div>
            <div class="functions__item">
                <button type="submit" name="screen" value="">
                    Администраторы</button>
            </div>
        </form>
    <?php elseif ($screen === "products"): ?>
        <div class="header">
            <form method="post">
                <button type="submit" name="screen" value="main">
                    <img class="header__back" src="/images/close.png" width="30" height="30">
                </button>
            </form>
        </div>
        <div class="products">
            <div class="products__list">
                <a href="products/index.php?id=new">
                    <div class="products__create">Создать</div>
                </a>
                <?php foreach ((new Products)->getAll() as $product): ?>
                    <a href="products/index.php?id=<?php echo $product["id"] ?>">
                        <div class="products__item">
                            <div class="products__price"><?php echo $product["id"] ?></div>
                            <div class="products__title"><?php echo $product["id"] ?></div>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    <?php elseif ($screen === "categories"): ?>
        <div class="header">
            <form method="post">
                <button type="submit" name="screen" value="main">
                    <img class="header__back" src="/images/close.png" width="30" height="30">
                </button>
            </form>
            <div class="header__control">
                <a href="">
                    <img src="/images/create.png" class="header__item" width="30" height="30">
                </a>
                <a href="">
                    <img src="/images/edit.png" class="header__item" width="30" height="30">
                </a>
                <a href="">
                    <img src="/images/delete.png" class="header__item" width="30" height="30">
                </a>
            </div>
        </div>
        <div class="categories">
            <div class="categories__list">
                <div class="categories__back">Назад</div>
                <div class="categories__item">Назад</div>
                <div class="categories__item">d</div>
                <div class="categories__item">Назад</div>
            </div>
        </div>
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
    <?php if (!empty($error)): ?>
        <script>
            alert("<?php echo $error?>");
        </script>
    <?php endif ?>
</body>
</html>