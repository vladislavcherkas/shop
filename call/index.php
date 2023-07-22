<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/navigation/path-past.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/settings/reader-settings.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Дзвінок</title>
    <link rel="icon" type="image/png" href="/images/favicon.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <div class="header__bar">
            <?php
            if (isset($_GET['categoryId'])) {
                $categoryId = $_GET['categoryId'];
                $callLink = PathPast::get() . "&categoryId=$categoryId";
            } else {
                $callLink = PathPast::get();
            }
            ?>
            <a class="header__item" href="<?php echo $callLink ?>">
                <img src="/images/back.png" width="25" height="25">
            </a>
        </div>
    </div>
    <div class="call">
        <div class="call__title">Дзвінок адміністратору</div>
        <div class="call__body">
            <div class="call__description">
                <?php echo ReaderSettings::get("Дзвінок адміністратору") ?>
                <a class="call__schedule" href="/about/?path-past=/call#schedule">
                    <br>Повний графік роботи
                </a>
            </div>
            <a href="tel:<?php echo ReaderSettings::get("Номер телефона") ?>">
                <div class="call__button"><?php echo ReaderSettings::get("Номер телефона") ?></div>
            </a>
            <a href="https://t.me/cutefoxi">
                <div class="call__button call__button_icon">
                    <img src="/images/telegram.png" class="footer__contact" width="25" height="25">
                    <span>Відправити повідомлення</span>
                </div>
            </a>
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