<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/navigation/path-past.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пелюшки</title>
    <link rel="icon" type="image/png" href="/images/favicon.png">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
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
            <a class="header__item" href="/call?path-past=/product/?id=<?php echo $_GET["id"]?>">
                <img src="/images/call.png" width="25" height="25">
            </a>
        </div>
    </div>
    <div class="gallery">
        <div class="gallery__full-screen">
            <img src="/images/full-screen.png"  width="15" height="15">
        </div>
        <div class="gallery__left">
            <img src="/images/left_black.png"  width="15" height="15">
        </div>
        <div class="gallery__right">
            <img src="/images/right_black.png"  width="15" height="15">
        </div>
        <div class="gallery__wrap">
            <div class="gallery__item">
                <img src="/images/example.png">
            </div>
            <div class="gallery__item">
                <img src="/images/example1.png">
            </div>
            <div class="gallery__item">
                <img src="/images/example2.png">
            </div>
            <div class="gallery__item">
                <img src="/images/example3.png">
            </div>
        </div>
    </div>
    <div class="common">
        <div class="common__title">Пелюшка 70 х 100 см</div>
        <div class="common__existence">В наявності</div>
        <div class="common__price">340 грн</div>
        <div class="common__wholesale">Оптова ціна -10% від 10 одиниць</div>
        <div class="common__contacts">
            <a href="tel:380971918504">+380 97 191 85 04</a>
            <span>(Viber)</span>
            <a href="https://t.me/cutefoxi">(Telegram)</a>
        </div>
    </div>
    <article>
        <section>
            <h2>Опис</h2>
            <p>Короткий опис тут
                <br><br>
<strong>Приклад</strong><br>
<em>Приклад 2</em><br>
Звичайний текст<br>
Ще більше тексту<br>
<br><br>
<strong>Приклад</strong><br>
<em>Приклад 2</em><br>
Звичайний текст<br>
Ще більше тексту</p>
        </section>
        <section>
            <h2>Характеристики</h2>
            <table>
                <tbody>
                    <tr>
                        <td>Призначення</td>
                        <td>Все</td>
                    </tr>
                    <tr>
                        <td>Тканина</td>
                        <td>Бавовна</td>
                    </tr>
                    <tr>
                        <td>Призначення</td>
                        <td>Все</td>
                    </tr>
                    <tr>
                        <td>Тканина</td>
                        <td>Бавовна</td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section>
            <h2>Умови доставки</h2>
            <p>
                <img src="/images/delivery.png" width="20" height="20">
                <span>Самовивіз</span>
            </p>
            <br>
            <p>
                <img src="/images/ukrpochta.png" width="20" height="20">
                <span>Укрпошта</span>
            </p>
            <br>
            <p>
                <img src="/images/novaia-pochta.png" width="20" height="20">
                <span>Нова Пошта</span>
            </p>
        </section>
        <section>
            <h2>Умови оплати</h2>
            <p>
                <img src="/images/novaia-pochta.png" width="20" height="20">
                <span>Після оплата "Нова Пошта"</span>
            </p>
            <br>
            <p>
                <img src="/images/olx.png" width="20" height="20">
                <span>Olx</span>
            </p>
        </section>
        <section>
            <h2>Умови повернення</h2>
            <p>Повернення товару впродовж 14 днів за рахунок покупця</p>
        </section>
    </article>
    <div class="footer">
        <div class="footer__list">
            <div class="footer__item">
                <div class="footer__title">Для споживачів</div>
                <a href="/about">
                    <div class="footer__link">Про нас</div>
                </a>
                <a href="/contacts">
                    <div class="footer__link">Контакти</div>
                </a>
            </div>
            <div class="footer__item">
                <div class="footer__title">Контакти</div>
                <a href="tel:380971766257">
                    <div class="footer__link">+380 97 176 62 57</div>
                </a>
                <a href="https://t.me/cutefoxi">
                    <div class="footer__link">Telegram</div>
                </a>
                <a href="https://instagram.com/textile_cutefoxi?igshid=NTc4MTIwNjQ2YQ==">
                    <div class="footer__link">Instagram</div>
                </a>
                <a href="https://www.olx.ua/d/obyavlenie/mnogorazovye-nepromokaemye-pelenki-sobak-pelenka-zhivotnyh-podstilka-IDPkOLA.html">
                    <div class="footer__link">Olx</div>
                </a>
            </div>
        </div>
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