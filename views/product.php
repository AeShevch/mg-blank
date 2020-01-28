<?php
/**
 *  Файл представления Product - выводит сгенерированную движком информацию на странице карточки товара.
 *  В этом файле доступны следующие данные:
 *   <code>
 *   $data['category_url'] => URL категории в которой находится продукт
 *   $data['product_url'] => Полный URL продукта
 *   $data['id'] => id продукта
 *   $data['sort'] => порядок сортировки в каталоге
 *   $data['cat_id'] => id категории
 *   $data['title'] => Наименование товара
 *   $data['description'] => Описание товара
 *   $data['price'] => Стоимость
 *   $data['url'] => URL продукта
 *   $data['image_url'] => Главная картинка товара
 *   $data['code'] => Артикул товара
 *   $data['count'] => Количество товара на складе
 *   $data['activity'] => Флаг активности товара
 *   $data['old_price'] => Старая цена товара
 *   $data['recommend'] => Флаг рекомендуемого товара
 *   $data['new'] => Флаг новинок
 *   $data['thisUserFields'] => Пользовательские характеристики товара
 *   $data['images_product'] => Все изображения товара
 *   $data['currency'] => Валюта магазина.
 *   $data['propertyForm'] => Форма для карточки товара
 *     $data['liteFormData'] => Упрощенная форма для карточки товара
 *   $data['meta_title'] => Значение meta тега для страницы,
 *   $data['meta_keywords'] => Значение meta_keywords тега для страницы,
 *   $data['meta_desc'] => Значение meta_desc тега для страницы,
 *   $data['wholesalesData'] => Информация об оптовых скидках,
 *   $data['storages'] => Информация о складах,
 *   $data['remInfo'] => Информация при отсутсвии товара,
 *   </code>
 *
 *   Получить подробную информацию о каждом элементе массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php viewData($data['thisUserFields']); ?>
 *   </code>
 *
 *   Вывести содержание элементов массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php echo $data['thisUserFields']; ?>
 *   </code>
 *
 *   <b>Внимание!</b> Файл предназначен только для форматированного вывода данных на страницу магазина. Категорически не рекомендуется выполнять в нем запросы к БД сайта или реализовывать сложную программную логику логику.
 * @author Авдеев Марк <mark-avdeev@mail.ru>
 * @package moguta.cms
 * @subpackage Views
 */
// Установка значений в метатеги title, keywords, description.
mgSEO($data);
?>

<div class="c-product product-details-block">
    <div class="l-row" itemscope itemtype="http://schema.org/Product">
        <div class="l-col min-0--12">
            <div class="product-status js-product-page">

                <?php if (class_exists('BreadCrumbs')): ?>
                    [brcr]
                <?php endif; ?>

                <div class="l-row">

                    <div class="l-col min-0--12 min-768--6">
                        <?php
                        // Карусель изображений товара
                        component(
                            'product/images',
                            $data
                        );
                        ?>
                    </div>

                    <div class="l-col min-0--12 min-768--6">

                        <div class="c-product__content buy-block">
                            <div class="buy-block-inner">
                                <div class="product-bar">
                                    <div class="c-product__row">
                                        <h1 class="c-title" itemprop="name">
                                            <?php echo $data['title'] ?>
                                        </h1>
                                    </div>

                                    <div class="c-product__row">
                                        <div class="c-product__block">
                                            <div class="c-product__block--left">
                                                <div class="c-product__row">

                                                    <?php
                                                    // Блок с артикулом товара
                                                    component(
                                                        'product/code',
                                                        $data['code']
                                                    );
                                                    ?>

                                                    <div class="available">
                                                        <?php
                                                        // Блок с количеством товара
                                                        component(
                                                            'product/count',
                                                            $data
                                                        );
                                                        ?>
                                                    </div>

                                                </div>

                                                <?php if (class_exists('NonAvailable')): ?>
                                                    <div class="c-product__row">
                                                        [non-available id="<?php echo $data['id'] ?>"]
                                                    </div>
                                                <?php endif; ?>

                                                <div class="c-product__row">
                                                    <ul class="product-status-list">
                                                        <li style="display:<?php echo (!$data['weight']) ? 'none' : 'block'; ?>">
                                                            <?php echo lang('productWeight1'); ?>
                                                            <span class="label-black weight">
                                                                <?php echo $data['weightCalc'] ?>
                                                            </span>
                                                            <?php echo lang('weightUnit_' . $data['weightUnit']); ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="c-product__block--right">
                                                <div class="c-product__row">
                                                    <div class="default-price">
                                                        <div class="product-price">
                                                            <ul itemprop="offers" itemscope
                                                                itemtype="http://schema.org/Offer"
                                                                class="product-status-list">

                                                                <li>
                                                                    <div class="c-product__price c-product__price--current normal-price">
                                                                        <div class="c-product__price--title">
                                                                            <?php echo lang('productPrice'); ?>
                                                                        </div>
                                                                        <span class="c-product__price--value price js-change-product-price">
                                                                            <span itemprop="price"
                                                                                  content="<?php echo MG::numberDeFormat($data['price']); ?>">
                                                                                <?php echo $data['price'] ?>
                                                                            </span>
                                                                            <span itemprop="priceCurrency"
                                                                                  content="<?php echo MG::getSetting('currencyShopIso'); ?>">
                                                                                <?php echo $data['currency']; ?>
                                                                            </span>

                                                                            <?php
                                                                            if ($data['count'] === 0 || $data['count'] === '0') {
                                                                                $availability = "OutOfStock";
                                                                            } else {
                                                                                $availability = "InStock";
                                                                            }
                                                                            ?>
                                                                            <meta itemprop="availability"
                                                                                  content="http://schema.org/<?php echo $availability ?>">
                                                                            <link itemprop="url"
                                                                                  href="<?php echo SITE . URL::getClearUri() ?>">

                                                                        </span>
                                                                    </div>
                                                                </li>

                                                                <li style="display:<?php echo (!$data['old_price']) ? 'none' : 'block'; ?>">
                                                                    <div class="c-product__price c-product__price--old old">
                                                                        <div class="c-product__price--title">
                                                                            <?php echo lang('productOldPrice'); ?>
                                                                        </div>
                                                                        <s class="c-product__price--value old-price">
                                                                            <?php echo MG::numberFormat($data['old_price']) . " " . $data['currency']; ?>
                                                                        </s>
                                                                    </div>
                                                                </li>

                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="c-product__row">

                                                    <?php if (class_exists('Rating')): ?>
                                                        <div class="c-product__row">
                                                            [rating id ="<?php echo $data['id'] ?>"]
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if (class_exists('ProductCommentsRating')): ?>
                                                        <div class="c-product__row">
                                                            [mg-product-rating id="<?php echo $data['id'] ?>"]
                                                        </div>
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="c-product__row product-opfields-data">
                                        <?php
                                        // Дополнительные поля товара
                                        component(
                                            'product/opfields',
                                            $data
                                        );
                                        ?>
                                    </div>

                                    <div class="c-product__row wholesales-data">
                                        <?php
                                        // Оптовые цены
                                        component(
                                            'product/wholesales',
                                            $data['wholesalesData']
                                        );
                                        ?>
                                    </div>

                                    <div class="c-product__row">
                                        <?php
                                        // Оптовые цены
                                        component(
                                            'product/storages',
                                            $data
                                        );
                                        ?>


                                        <form action="<?php echo SITE . $data['liteFormData']['action'] ?>"
                                              method="<?php echo $data['liteFormData']['method'] ?>"
                                              class="property-form js-product-form <?php echo $data['liteFormData']['catalogAction'] ?>"
                                              data-product-id='<?php echo $data['liteFormData']['id'] ?>'>

                                            <div class="c-goods__footer">
                                                <div class="c-form">
                                                    <?php
                                                    // Варианты товара
                                                    component(
                                                        'product/variants',
                                                        $data
                                                    );
                                                    ?>

                                                    <?php
                                                    // Сложные характеристики – чекбоксы, радиокнопки, селекты
                                                    component(
                                                        'product/html-properties',
                                                        $data['propertyForm']['htmlProperty']
                                                    );
                                                    ?>

                                                </div>

                                                <div class="c-buy js-product-controls">

                                                    <?php
                                                        component(
                                                            'amount',
                                                            [
                                                                'id' => $data['id'],
                                                                'maxCount' => $data['liteFormData']['maxCount'],
                                                                'count' => '1',
                                                            ]
                                                        );
                                                    ?>

                                                    <div class="c-buy__buttons">
                                                        <?php
                                                        // Кнопка добавления товара в корзину
                                                        component(
                                                            'cart/btn/add',
                                                            $data
                                                        );
                                                        ?>

                                                        <?php
                                                        if (
                                                            (EDITION == 'gipermarket' || EDITION == 'market') &&
                                                            ($data['liteFormData']['printCompareButton'] == 'true')
                                                        ) {
                                                            // Кнопка добавления товара в сравнение
                                                            component(
                                                                'compare/btn/add',
                                                                $data
                                                            );
                                                        }
                                                        ?>


                                                        <!-- Плагин купить одним кликом-->
                                                        <?php if (class_exists('BuyClick')): ?>
                                                            [buy-click id="<?php echo $data['id'] ?>"]
                                                        <?php endif; ?>
                                                        <!--/ Плагин купить одним кликом-->

                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="l-col min-0--12">
                        <?php
                        component('tabs', $data, 'tabs_product');
                        ?>
                    </div>

                </div>

            </div>
        </div>

        <?php
        // Карусель «С этим товаром покупают»
        component(
            'catalog/carousel',
            [
                'items' => $data['related']['products'],
                'title' => lang('relatedAdd'),
                'currency' => $data['related']['currency']
            ]
        );
        ?>

        <?php if (class_exists('RecentlyViewed')) { ?>
            <div class="l-col min-0--12">
                <div class="c-carousel__title">
                <span class="c-carousel__title--span">
                    <?php echo lang('RecentlyViewed'); ?>
                </span>
                </div>
                [recently-viewed countPrint=4 count=5 random=1]
            </div>
        <?php } ?>

        <div class="l-col min-0--12">
            <?php if (class_exists('SetGoods')): ?>
                [set-goods id="<?php echo $data['id'] ?>"]
            <?php endif; ?>
        </div>
    </div>
</div>
