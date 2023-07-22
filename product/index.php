<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/navigation/path-past.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/reader-products.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/settings/reader-settings.php");
$product = ReaderProducts::getById($_GET["id"]);
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
            <?php
            $productId = $_GET['id'];
            if (isset($_GET['categoryId'])) {
                $categoryId = $_GET['categoryId'];
                $pastPath = urlencode("/product/index.php?id=$productId&path-past=/categories/index.php?id=$categoryId&categoryId=$categoryId");
            } else {
                $pastPath = urlencode("/product/index.php?id=$productId");
            }
            $callLink = "/call/index.php?path-past=$pastPath";
            ?>
            <a class="header__item" href="<?php echo $callLink ?>">
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
            <?php foreach (ReaderProducts::parsePhotos($product["photos"]) as $photo): ?>
                <div class="gallery__item">
                    <img src="/images/products/<?php echo $photo ?>">
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="common">
        <div class="common__title"><?php echo $product["title"] ?></div>
        <div class="common__existence">
            <?php
            if ($product["existence"] === "1") {
                echo '<span style="color: green">В наявності</span>';
            }
            if ($product["existence"] === "2") {
                echo '<span style="color: gray">Немає в наявності</span>';
            }
            if ($product["existence"] === "3") {
                echo '<span style="color: blue">Під замовлення</span>';
            }
            if ($product["existence"] === "4") {
                echo '<span style="color: gray">Невідомо</span>';
            }
            if ($product["existence"] === "5") {
                echo '<span style="color: red">Ошибка</span>';
            }
            ?>
        </div>
        <div class="common__price"><?php echo $product["price"] ?></div>
        <div class="common__wholesale"><?php echo ReaderSettings::get("Текст под ценой товара") ?></div>
        <div class="common__contacts">
            <a href="tel:<?php echo ReaderSettings::get("Номер телефона") ?>"><?php echo ReaderSettings::get("Номер телефона") ?></a>
            <a href="tel:<?php echo ReaderSettings::get("Номер телефона") ?>">Viber</a>
            <a href="<?php echo ReaderSettings::get("Ссылка на Telegram администратора") ?>">Telegram</a>
        </div>
    </div>
    <article>
        <section>
            <h2>Опис</h2>
            <pre><?php echo $product["description"] ?></pre>
        </section>
        <section>
            <h2>Характеристики</h2>
            <table>
                <tbody>
                    <?php foreach (json_decode($product["feature"], true) as $key => $value): ?>
                        <?php
                            if ($key === "") {
                                $key = "?";
                            }
                            if ($value === "") {
                                $value = "?";
                            }
                        ?>
                        <tr>
                            <td><?php echo $key ?></td>
                            <td><?php echo $value ?></td>
                        </tr>
                    <?php endforeach ?>
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
            <p><?php echo ReaderSettings::get("Условия возврата") ?></p>
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