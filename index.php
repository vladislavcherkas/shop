<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/reader-products.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/settings/reader-settings.php");
$products = array_reverse(ReaderProducts::getAll());
if (count($products) > 12) {
    $products = array_slice($products, 0, 12);
}
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
        <div class="header__title"><?php echo ReaderSettings::get("Шапка текст 1") ?></div>
        <div class="header__subtitle"><?php echo ReaderSettings::get("Шапка текст 2") ?></div>
        <div class="header__bar">
            <a class="header__item" href="/menu/?path-past=/"><img src="/images/menu.png" width="25" height="25">
            </a>
            <a class="header__item" href="/call/?path-past=/"><img src="/images/call.png" width="25" height="25">
            </a>
        </div>
    </div>
    <div class="products">
        <div class="products__name">
            Свіжі товари
            <a href="/categories/?path-past=/">Всі товари</a>
        </div>
        <div class="products__list">
            <?php foreach ($products as $product): ?>
                <div class="products__item">
                    <div class="products__wrap">
                            <a class="products__link" href="/product?id=<?php echo $product["id"] ?>&path-past=/">
                                <div class="products__photo">
                                    <img src="/images/products/<?php echo ReaderProducts::parsePhotos($product["photos"])[0] ?>">
                                </div>
                                <div class="products__title">
                                    <?php echo $product["title"] ?>
                                </div>
                                <div class="products__existence">
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
                                <div class="products__price">
                                    <?php echo $product["price"] ?>
                                </div>
                            </a>
                            <div class="products__open">Купити</div>
                        </div>
                    </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="footer" id="footer">
        <div class="footer__list">
            <div class="footer__item">
                <div class="footer__title">Для споживачів</div>
                <a href="/about/index.php?path-past=/">
                    <div class="footer__link">Про нас</div>
                </a>
                <a href="/contacts/index.php?path-past=/">
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

    <!-- Basket app -->
    <div class="basket-app">
        <div class="basket-app__body">
            <div class="basket-app__notification">Зараз у компанії неробочий час. Ваше замовлення буде оброблено з 09:00 найближчого робочого дня (завтра, 27.07)</div>
            <div class="basket-app__screen">
                <div class="basket-app__product-list">
                    <div class="basket-app__product">
                        <div class="basket-app__photo">
                            <img src="/images/products/1.jpeg">
                        </div>
                        <div class="basket-app__data">
                            <div class="basket-app__name">Новый товар больше не нужен из-за чрезмерно длинного заголовка</div>
                            <div class="basket-app__existence">В наявності</div>
                            <div class="basket-app__price">300 грн</div>
                        </div>
                        <div class="basket-app__total-alone">947 грн</div>
                        <div class="basket-app__amount-bar">
                            <img class="basket-app__amount-button" src="/images/minus.png" width="15" height="15">
                            <div class="basket-app__amount">3</div>
                            <img class="basket-app__amount-button" src="/images/plus.png" width="15" height="15">
                        </div>
                        <img class="basket-app__delete-button" src="/images/delete_black.png" width="20" height="20">
                    </div>
                    <div class="basket-app__product">
                        <div class="basket-app__photo">
                            <img src="/images/products/1.jpeg">
                        </div>
                        <div class="basket-app__data">
                            <div class="basket-app__name">Новый товар больше не нужен из-за чрезмерно длинного заголовка</div>
                            <div class="basket-app__existence">В наявності</div>
                            <div class="basket-app__price">300 грн</div>
                        </div>
                        <div class="basket-app__total-alone">947 грн</div>
                        <div class="basket-app__amount-bar">
                            <img class="basket-app__amount-button" src="/images/minus.png" width="15" height="15">
                            <div class="basket-app__amount">3</div>
                            <img class="basket-app__amount-button" src="/images/plus.png" width="15" height="15">
                        </div>
                        <img class="basket-app__delete-button" src="/images/delete_black.png" width="20" height="20">
                    </div>
                    <div class="basket-app__product">
                        <div class="basket-app__photo">
                            <img src="/images/products/1.jpeg">
                        </div>
                        <div class="basket-app__data">
                            <div class="basket-app__name">Новый товар больше не нужен из-за чрезмерно длинного заголовка</div>
                            <div class="basket-app__existence">В наявності</div>
                            <div class="basket-app__price">300 грн</div>
                        </div>
                        <div class="basket-app__total-alone">947 грн</div>
                        <div class="basket-app__amount-bar">
                            <img class="basket-app__amount-button" src="/images/minus.png" width="15" height="15">
                            <div class="basket-app__amount">3</div>
                            <img class="basket-app__amount-button" src="/images/plus.png" width="15" height="15">
                        </div>
                        <img class="basket-app__delete-button" src="/images/delete_black.png" width="20" height="20">
                    </div>
                    <div class="basket-app__product">
                        <div class="basket-app__photo">
                            <img src="/images/products/1.jpeg">
                        </div>
                        <div class="basket-app__data">
                            <div class="basket-app__name">Новый товар больше не нужен из-за чрезмерно длинного заголовка</div>
                            <div class="basket-app__existence">В наявності</div>
                            <div class="basket-app__price">300 грн</div>
                        </div>
                        <div class="basket-app__total-alone">947 грн</div>
                        <div class="basket-app__amount-bar">
                            <img class="basket-app__amount-button" src="/images/minus.png" width="15" height="15">
                            <div class="basket-app__amount">3</div>
                            <img class="basket-app__amount-button" src="/images/plus.png" width="15" height="15">
                        </div>
                        <img class="basket-app__delete-button" src="/images/delete_black.png" width="20" height="20">
                    </div>
                </div>
            </div>
        </div>
        <div class="basket-app__header">
            <img class="basket-app__close" src="/images/back.png" width="25" height="25">
            <div class="basket-app__title">Кошик</div>
        </div>
    </div>
</body>
</html>