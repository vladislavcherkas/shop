<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/php/products/products.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/php/products/products-photos.php");
$products = new Products();
$list_products = $products->getAll();
if (count($list_products) > 12) {
    array_slice($list_products, -12, 12);
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=720, initial-scale=1.0">
    <title>Пелюшки багаторазові</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <div class="header__top">
            <div class="header__description">Мы працюэмо з 8:00 до 20:00</div>
            <div class="header__title">
                <span>Багаторазові пелюшки виготовлені із якісних матеріалів, повністю непромокаємі.</span>
            </div>
        </div>
        <div class="header__wrap">
            <a href="menu"><img class="header__menu" src="images/menu.png"
                width="40" height="33"></a>
            <img class="header__call" src="images/call.png" width="40" height="40">
        </div>
    </div>
    <div class="product">
        <div class="product__title">Свiжi товари</div>
        <div class="product__list">
            <?php foreach ($list_products as $product): ?>
            <?php $photo = (new ProductsPhotos($product["id"]))->getMajor() ?>
            <?php $description = $product["description"] ?>
            <?php $existence = $product["existence"] ?>
            <?php $price = $product["price"] ?>
            <div class="product__item">
                <div class="product__photo">
                    <img src="<?php echo $photo ?>">
                </div>
                <div class="product__description"><?php echo $description ?></div>
                <div class="product__existence"><?php echo $existence ?></div>
                <div class="product__price">
                    <span class="product__value"><?php echo $price ?></span>
                    <span class="product__unit">грн</span>
                </div>
                <div class="product__open">Переглянути</div>
            </div>
            <?php endforeach ?>
        </div>
        <div class="product__more">Показати ще</div>
    </div>
    <div class="footer">
        <div class="footer__sections">
            <div class="footer__item">
                <div class="footer__title">Для споживачiв</div>
                <div class="footer__list">
                    <a class="footer__link" href="">Про нас</a>
                    <a class="footer__link" href="">Контакти</a>
                </div>
            </div>
            <div class="footer__item">
                <div class="footer__title">Контакти</div>
                <div class="footer__list">
                    <a class="footer__link" href="tel:+380971766257">
                        +380 97 176 62 57</a>
                    <a class="footer__link" href="https://t.me/pelyshkaglysobak"
                        target="_blank">Telegram</a>
                    <a class="footer__link" href="https://instagram.com/textile_cutefoxi?igshid=NTc4MTIwNjQ2YQ=="
                        target="_blank">Instagram</a>
                    <a class="footer__link" href="https://www.olx.ua/d/obyavlenie/mnogorazovye-nepromokaemye-pelenki-sobak-pelenka-zhivotnyh-podstilka-IDPkOLA.html"
                        target="_blank">Olx</a>
                </div>
            </div>
        </div>
        <div class="footer__neworks">
            <div class="networks">
                <a class="networks__item" href="https://t.me/pelyshkaglysobak"
                    target="_blank"><img src="/images/telegram.png"></a>
                <a class="networks__item" href="https://instagram.com/textile_cutefoxi?igshid=NTc4MTIwNjQ2YQ=="
                    target="_blank"><img src="/images/instagram.png"></a>
                <a class="networks__item" href="https://www.olx.ua/d/obyavlenie/mnogorazovye-nepromokaemye-pelenki-sobak-pelenka-zhivotnyh-podstilka-IDPkOLA.html"
                    target="_blank"><img src="/images/olx.png"></a>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>