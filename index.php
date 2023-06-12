<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/reader-products.php");
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
</head>
<body>
    <div class="header">
        <div class="header__title">Ми працюємо з 8:00 до 20:00</div>
        <div class="header__subtitle">
            Багаторазові пелюшки виготовлені із якісних матеріалів, повністю непромокаємі
        </div>
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
                    <div class="products__photo">
                        <img src="/images/products/<?php echo ReaderProducts::parsePhotos($product["photos"])[0] ?>">
                    </div>
                    <div class="products__title">
                        <?php echo $product["title"] ?>
                    </div>
                    <div class="products__existence">
                        <?php echo $product["existence"] ?>
                    </div>
                    <div class="products__price">
                        <?php echo $product["price"] ?>
                    </div>
                    <a href="/product?id=<?php echo $product["id"] ?>&path-past=/">
                        <div class="products__open">Переглянути</div>
                    </a>
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
</body>
</html>