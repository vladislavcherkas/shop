<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/categories/categories.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/categories/reader-categories-for-categories.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/categories/reader-categories-for-products.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/categories/reader-categories-root.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/navigation/path-past.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/reader-products.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог товарів</title>
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
    <?php if(isset($_GET["id"])): ?>
        <div class="poster">
            <div class="poster__photo">
                <img src="/images/categories-root/<?php echo ReaderCategoriesRoot::getByIdChild($_GET["id"])["photo"] ?>">
            </div>
            <div class="poster__title">
                <?php echo ReaderCategoriesRoot::getByIdChild($_GET["id"])["title"] ?>
            </div>
        </div>
        <div class="categories">
            <div class="categories__control">
                <?php if(Categories::isCategoryRoot($_GET["id"])): ?>
                    <a class="categories__back" href="?path-past=<?php echo PathPast::get() ?>">
                        <img src="/images/past_white.png" width="15" height="15">
                    </a>
                <?php else: ?>
                    <a class="categories__back" href="?id=<?php echo Categories::getIdParentById($_GET["id"]) ?>&path-past=<?php echo PathPast::get() ?>">
                        <img src="/images/past_white.png" width="15" height="15">
                    </a>
                <?php endif ?>
                <div class="categories__name">
                    <span><?php echo Categories::getById($_GET["id"])["title"] ?></span>
                </div>
            </div>
            <div class="categories__list">
                <?php foreach (ReaderCategoriesForProducts::getByIdParent($_GET["id"]) as $category): ?>
                    <a class="categories__button categories__button_transparent"
                            href="?id=<?php echo $category["id"] ?>&path-past=<?php echo PathPast::get() ?>">
                        <?php echo $category["title"] ?>
                    </a>
                <?php endforeach ?>
                <?php foreach (ReaderCategoriesForCategories::getByIdParent($_GET["id"]) as $category): ?>
                    <a class="categories__button"
                            href="?id=<?php echo $category["id"] ?>&path-past=<?php echo PathPast::get() ?>">
                        <?php echo $category["title"] ?>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
        <div class="products">
            <?php foreach (Categories::getProductsByIdParent($_GET["id"]) as $product): ?>
                <a class="products__item" href="/product/?id=<?php echo $product["id"] ?>&path-past=/categories/?id=<?php echo $_GET["id"] ?>">
                    <div class="products__photo">
                        <img src="/images/products/<?php echo ReaderProducts::parsePhotos($product["photos"])[0] ?>">
                    </div>
                    <div class="products__title"><?php echo $product["title"] ?></div>
                    <div class="products__existence"><?php echo $product["existence"] ?></div>
                    <div class="products__price"><?php echo $product["price"] ?></div>
                </a>
            <?php endforeach ?>
        </div>
    <?php else: ?>
        <?php foreach (ReaderCategoriesRoot::getAll() as $category): ?>
            <a href="?id=<?php echo $category["id"]?>&path-past=<?php echo PathPast::get() ?>">
                <div class="poster">
                    <div class="poster__photo">
                        <img src="/images/categories-root/<?php echo $category["photo"] ?>">
                    </div>
                    <div class="poster__title"><?php echo $category["title"] ?></div>
                </div>
            </a>
        <?php endforeach ?>
    <?php endif ?>
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