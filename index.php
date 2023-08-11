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
            <div class="basket-app__screen">
                <div class="basket-app__notification">Зараз у компанії неробочий час. Ваше замовлення буде оброблено з 09:00 найближчого робочого дня (завтра, 27.07)</div>
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
                <div class="basket-app__resume-wrap">
                    <div class="basket-app__resume">
                        До оплати без доставки:
                        <span>3250 грн</span>
                    </div>
                    <div class="basket-app__continue-button basket-app__continue-button_dark">Оформити замовлення</div>
                    <div class="basket-app__continue-button">Продовжити покупки</div>
                </div>
            </div>
            <div class="basket-app__screen">
                <div class="basket-app__subtitle">
                    Контактні дані
                    <span>Змінити</span>
                </div>
                <div class="basket-app__block">
                    <div class="basket-app__field">
                        <div class="basket-app__field-signature">Телефон</div>
                        <input class="basket-app__field-input" type="text">
                    </div>
                    <div class="basket-app__field">
                        <div class="basket-app__field-signature">Прізвище</div>
                        <input class="basket-app__field-input" type="text">
                    </div>
                    <div class="basket-app__field">
                        <div class="basket-app__field-signature">Ім'я</div>
                        <input class="basket-app__field-input" type="text">
                    </div>
                </div>
                <div class="basket-app__subtitle">
                    Спосіб доставки
                    <span>Змінити</span>
                </div>
                <div class="basket-app__delivery">
                    <div class="basket-app__delivery-head">
                        <div>
                            <img src="/images/tick_white.png" width="20" heigth="20">
                            <span>Нова пошта</span>
                        </div>
                    </div>
                    <div class="basket-app__delivery-body">
                        <div class="basket-app__delivery-method">
                            <label class="basket-app__delivery-method" for="deliveryMethod1">
                                <input type="radio" name="deliveryMethod" id="deliveryMethod1" value="1">
                                <span>Нова пошта</span>
                            </label>
                            <div class="basket-app__delivery-more">
                                <label for="deliveryMore1">
                                    <input type="radio" name="deliveryMore" id="deliveryMore1" value="1">
                                    <span>У відделення</span>
                                </label>
                                <label for="deliveryMore2">
                                    <input type="radio" name="deliveryMore" id="deliveryMore2" value="2">
                                    <span>У поштомат</span>
                                </label>
                                <label for="deliveryMore3">
                                    <input type="radio" name="deliveryMore" id="deliveryMore3" value="3">
                                    <span>Кур'єром</span>
                                </label>
                                <div class="basket-app__delivery-field">
                                    <span>Місто</span>
                                    <div>
                                        <input type="text" placeholder="Вкажіть місто">
                                    </div>
                                </div>
                                <div class="basket-app__delivery-field">
                                    <span>Відділення</span>
                                    <div>
                                        <input type="text" placeholder="Номер відділення">
                                    </div>
                                </div>
                                <div class="basket-app__delivery-next">Продовжити</div>
                            </div>
                        </div>
                        <div class="basket-app__delivery-method">
                            <label class="basket-app__delivery-method" for="deliveryMethod2">
                                <input type="radio" name="deliveryMethod" id="deliveryMethod2" value="2">
                                <span>Укрпошта Стандарт</span>
                            </label>
                            <div class="basket-app__delivery-more">
                                <label for="deliveryMore1">
                                    <input type="radio" name="deliveryMore" id="deliveryMore1" value="1">
                                    <span>У відделення</span>
                                </label>
                                <label hidden for="deliveryMore2">
                                    <input hidden type="radio" name="deliveryMore" id="deliveryMore2" value="2">
                                    <span hidden>У поштомат</span>
                                </label>
                                <label for="deliveryMore3">
                                    <input type="radio" name="deliveryMore" id="deliveryMore3" value="3">
                                    <span>Кур'єром</span>
                                </label>
                                <div class="basket-app__delivery-field">
                                    <span>Місто</span>
                                    <div>
                                        <input type="text" placeholder="Вкажіть місто">
                                    </div>
                                </div>
                                <div class="basket-app__delivery-field">
                                    <span>Відділення</span>
                                    <div>
                                        <input type="text" placeholder="Індекс відділення">
                                    </div>
                                </div>
                                <div class="basket-app__delivery-next">Продовжити</div>
                            </div>
                        </div>
                        <div class="basket-app__delivery-method">
                            <label class="basket-app__delivery-method" for="deliveryMethod3">
                                <input type="radio" name="deliveryMethod" id="deliveryMethod3" value="3">
                                <span>Укрпошта Експрес</span>
                            </label>
                            <div class="basket-app__delivery-more">
                                <label for="deliveryMore1">
                                    <input type="radio" name="deliveryMore" id="deliveryMore1" value="1">
                                    <span>У відделення</span>
                                </label>
                                <label hidden for="deliveryMore2">
                                    <input hidden type="radio" name="deliveryMore" id="deliveryMore2" value="2">
                                    <span hidden>У поштомат</span>
                                </label>
                                <label for="deliveryMore3">
                                    <input type="radio" name="deliveryMore" id="deliveryMore3" value="3">
                                    <span>Кур'єром</span>
                                </label>
                                <div class="basket-app__delivery-field">
                                    <span>Місто</span>
                                    <div>
                                        <input type="text" placeholder="Вкажіть місто">
                                    </div>
                                </div>
                                <div class="basket-app__delivery-field">
                                    <span>Відділення</span>
                                    <div>
                                        <input type="text" placeholder="Індекс відділення">
                                    </div>
                                </div>
                                <div class="basket-app__delivery-next">Продовжити</div>
                            </div>
                        </div>
                        <div class="basket-app__delivery-method">
                            <label class="basket-app__delivery-method" for="deliveryMethod4">
                                <input type="radio" name="deliveryMethod" id="deliveryMethod4" value="4">
                                <span>Самовивіз</span>
                            </label>
                            <div class="basket-app__delivery-more">
                                <label hidden for="deliveryMore1">
                                    <input hidden type="radio" name="deliveryMore" id="deliveryMore1" value="1">
                                    <span></span>
                                </label>
                                <label hidden for="deliveryMore2">
                                    <input hidden type="radio" name="deliveryMore" id="deliveryMore2" value="2">
                                    <span></span>
                                </label>
                                <label hidden for="deliveryMore3">
                                    <input hidden type="radio" name="deliveryMore" id="deliveryMore3" value="3">
                                    <span></span>
                                </label>
                                <div hidden class="basket-app__delivery-field">
                                    <span></span>
                                    <div>
                                        <input type="text" placeholder="Вкажіть місто">
                                    </div>
                                </div>
                                <div hidden class="basket-app__delivery-field">
                                    <span></span>
                                    <div>
                                        <input type="text" placeholder="Номер відділення">
                                    </div>
                                </div>
                                <div class="basket-app__delivery-location">м. Кременчук</div>
                                <div class="basket-app__delivery-next">Продовжити</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="basket-app__subtitle">
                    Оплата
                    <span>Змінити</span>
                </div>
                <div class="basket-app__block">
                    <div class="basket-app__payment">
                        <div class="basket-app__payment-head">
                            <div>
                                <img src="/images/tick_white.png" width="20" heigth="20">
                                <span>Безготівкова оплата (потрібен дзвінок менеджера)</span>
                            </div>
                        </div>
                        <div class="basket-app__payment-body">
                            <label for="paymentMethod1">
                                <input type="radio" name="paymentMethod" id="paymentMethod1" value="1">
                                <span>Безготівкова оплата (потрібен дзвінок менеджера)</span>
                            </label>
                            <label for="paymentMethod2">
                                <input type="radio" name="paymentMethod" id="paymentMethod2" value="2">
                                <span>Післяплата "Нова Пошта"</span>
                            </label>
                            <label for="paymentMethod3">
                                <input type="radio" name="paymentMethod" id="paymentMethod3" value="3">
                                <span style="font-weight: bold">Отримати та оплатити замовлення у м.Нововолинськ (вул. Пирогова)</span>
                            </label>
                            <label for="paymentMethod4">
                                <input type="radio" name="paymentMethod" id="paymentMethod4" value="4">
                                <span>Безготівкова оплата (отримати рахунок БЕЗ дзвінка менеджера)</span>
                            </label>
                            <label for="paymentMethod5">
                                <input type="radio" name="paymentMethod" id="paymentMethod5" value="5">
                                <span>ОПЛАТА БЕЗ УТОЧНЕНЬ до замовлення (реквізити у розділі "Оплата і доставка")</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="basket-app__block">
                    <div class="basket-app__comment">
                        <div class="basket-app__comment-signature">Ваш коментар до замовлення</div>
                        <div class="basket-app__comment-show">
                            <img src="/images/arrow-right.png" width="8" height="12">
                        </div>
                        <div class="basket-app__comment-body">
                            <div class="basket-app__comment-field"><textarea></textarea></div>
                            <div class="basket-app__comment-limitation">Залишилось символів: <span>255</span></div>
                            <div class="basket-app__continue-button basket-app__comment-button">Зберегти</div>
                        </div>
                    </div>
                </div>
                <div class="basket-app__block">
                    <div class="basket-app__resume">
                        Вартість замовлення:
                        <span>350 грн</span>
                    </div>
                    <div class="basket-app__continue-button basket-app__continue-button_dark">Оформити замовлення</div>
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