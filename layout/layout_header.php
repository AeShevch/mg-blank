<header>
    <?php
    /*
     * Метод MG::getSetting() возвращает значение из настроек движка
     * В качестве параметра принимает строку с названием настройки из поля option в таблице mg_setting
     * В данном случае (MG::getSetting('sitename')) функция вернёт название сайта
     * */
    ?>

    <?php
    /*
     * Функция mgLogo() вёрстку изображения логотипа:
     * <img src="Ссылка на картинку" alt="Название магазина" title="Название магазина" >
     * Если вы хотите использовать свою вёрстку, то можно не использовать эту функцию, а вставить вручную:
     *  <img src="<?php echo MG::getSetting('shopLogo'); ?>"
     *       alt="<?php echo MG::getSetting('shopName'); ?>"
     *       title="<?php echo MG::getSetting('shopName'); ?>">
     * */
    ?>

    <a class="c-logo"
       title="<?php echo MG::getSetting('sitename') ?>"
       href="<?php echo SITE ?>">
        <?php echo mgLogo(); ?>
    </a>

    <?php
    /*
     * Функция component() вставляет компонент из папки components в корне шаблона
     * @link - Подробнее http://wiki.moguta.ru/devhelp/templates/komponenty
     *
     * */

    // Компонент поиска
    component('search'); ?>

    <?php
    // Компонент выбора языка сайта – language_select
    component('select/lang'); ?>

    <?php
    // Компонент выбора валюты сайта – currency_select
    component('select/currency'); ?>

    <?php
    // Компонент меню страниц – menu/pages
    component('menu/pages', $data['menuPages']) ?>

    <?php
    // Компонент всплывающей мини-корзины
    component('cart/small', $data['cartData']);

    // Если в настройках включена опция
    // «Показывать покупателю сообщение о добавлении товара в корзину»,
    // то выводим компонент модального окна с шаблоном «modal_cart»
    if (MG::getSetting('popupCart') == 'true') {
        component('modal', $data['cartData'], 'modal_cart');
    };
    ?>
</header>
