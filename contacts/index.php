<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/navigation/path-past.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/settings/reader-settings.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакти</title>
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
    <div class="article">
        <div class="article__title">Контакти</div>
        <div class="article__body article__body_first">
            <h3 class="article__subtitle">Телефони</h3>
            <p class="article__p">
                <img src="/images/telephone.png" width="20" height="20">
                <span><?php echo ReaderSettings::get("Номер телефона") ?></span>
            </p>
        </div>
        <div class="article__body">
            <h3 class="article__subtitle">Адреса</h3>
            <p class="article__p">
                <img src="/images/address.png" width="20" height="20">
                <span><?php echo ReaderSettings::get("Адрес") ?></span>
            </p>
        </div>
        <div class="article__body">
            <h3 class="article__subtitle">Назва</h3>
            <p class="article__p">
                <img src="/images/instagram_black.png" width="20" height="20">
                <span><?php echo ReaderSettings::get("Название") ?></span>
            </p>
        </div>
        <div class="article__body">
            <h3 class="article__subtitle">Контактна особа</h3>
            <p class="article__p">
                <img src="/images/people.png" width="20" height="20">
                <span><?php echo ReaderSettings::get("Контактное лицо") ?></span>
            </p>
        </div>
        <div class="article__body">
            <h3 class="article__subtitle">Email</h3>
            <p class="article__p">
                <img src="/images/email.png" width="20" height="20">
                <span><?php echo ReaderSettings::get("Email") ?></span>
            </p>
        </div>
        <div class="article__body">
            <h3 class="article__subtitle">Telegram</h3>
            <p class="article__p">
                <img src="/images/telegram_black.png" width="20" height="20">
                <span><?php echo ReaderSettings::get("Telegram") ?></span>
            </p>
        </div>
        <div class="article__body">
            <h3 class="article__subtitle">Viber</h3>
            <p class="article__p">
                <img src="/images/viber_black.png" width="20" height="20">
                <span><?php echo ReaderSettings::get("Viber") ?></span>
            </p>
        </div>
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