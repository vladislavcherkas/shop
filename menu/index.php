<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/navigation/path-past.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Меню</title>
    <link rel="icon" type="image/png" href="/images/favicon.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <div class="header__bar">
            <a class="header__item" href="<?php echo PathPast::get() ?>">
                <img src="/images/back.png" width="25" height="25">
            </a>
            <a class="header__item" href="/">
                <img src="/images/home_white.png" width="25" height="25">
            </a>
        </div>
    </div>
    <div class="menu">
        <a href="/categories/?path-past=/menu">
            <div class="menu__button menu__button_icon">
                <img src="/images/products_white.png" class="footer__contact" width="25" height="25">
                <span>Каталог товарів</span>
            </div>
        </a>
        <a href="/comments/?path-past=/menu">
            <div class="menu__button menu__button_icon">
                <img src="/images/comments.png" class="footer__contact" width="25" height="25">
                <span>Відгуки</span>
            </div>
        </a>
        <a href="/contacts/?path-past=/menu">
            <div class="menu__button">Контакти</div>
        </a>
        <a href="/about/?path-past=/menu">
            <div class="menu__button">Про нас</div>
        </a>
    </div>
    <div class="footer">
        <div class="footer__contacts">
            <a href="https://t.me/cutefoxi">
                <img src="/images/telegram.png" class="footer__contact" width="25" height="25">
            </a>
            <a href="https://www.olx.ua/d/obyavlenie/mnogorazovye-nepromokaemye-pelenki-sobak-pelenka-zhivotnyh-podstilka-IDPkOLA.html">
                <img src="/images/olx.png" class="footer__contact" width="25" height="25">
            </a>
            <a href="https://instagram.com/textile_cutefoxi?igshid=NTc4MTIwNjQ2YQ==">
                <img src="/images/instagram.png" class="footer__contact" width="25" height="25">
            </a>
        </div>
    </div>
</body>
</html>