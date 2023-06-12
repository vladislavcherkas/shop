<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/navigation/path-past.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Про нас</title>
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
        <div class="article__title">Про нас</div>
        <div class="article__body">
            <div class="article__description">
                
            </div>
        </div>
    </div>
    <div class="article">
        <div class="article__title" id="schedule">Графік роботи магазину</div>
        <div class="article__body">
            <div class="article__wrap">
                <table class="article__table">
                    <thead>
                        <tr>
                            <td>День</td>
                            <td>Час роботи</td>
                            <td>Терміни відправки замовлень</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Понеділок</td>
                            <td>08:00 — 20:00</td>
                            <td>Наступний день</td>
                        </tr>
                        <tr>
                            <td>Вівторок</td>
                            <td>08:00 — 20:00</td>
                            <td>Наступний день</td>
                        </tr>
                        <tr>
                            <td>Середа</td>
                            <td>08:00 — 20:00</td>
                            <td>Наступний день</td>
                        </tr>
                        <tr>
                            <td>Четвер</td>
                            <td>08:00 — 20:00</td>
                            <td>Наступний день</td>
                        </tr>
                        <tr>
                            <td>П'ятниця</td>
                            <td>08:00 — 20:00</td>
                            <td>Наступний день</td>
                        </tr>
                        <tr>
                            <td>Субота</td>
                            <td>08:00 — 20:00</td>
                            <td>Наступний день</td>
                        </tr>
                        <tr>
                            <td>Неділя</td>
                            <td>08:00 — 20:00</td>
                            <td>Наступний день</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <div class="article">
        <div class="article__title">Що у асортименті</div>
        <div class="article__body">
            <div class="article__wrap">
                <ul class="article__list">
                    <li>Час роботи</li>
                    <li>Час роботи</li>
                    <li>Час роботи</li>
                </ul>
                <a href="/categories">
                    <div class="menu__button menu__button_icon">
                        <img src="/images/products_white.png" class="footer__contact" width="25" height="25">
                        <span>Категорiї товарiв</span>
                    </div>
                </a>
            </div>
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