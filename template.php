<?php /*
Template Name: Template name
Author: Name
Version: 1.0.0
*/ ?>

<!DOCTYPE html>
<?php
/**
 * Функция getHtmlAttributes() вставляет атрибут lang в зависимости от языка сайта,
 * а также атрибут для openGraph
 * */
?>
<html <?php getHtmlAttributes() ?>>
<head>
    <meta name="format-detection"
          content="telephone=no">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
    /**
    * Добавляем предзагрузку файла стилей
    * @link https://developer.mozilla.org/ru/docs/Web/HTML/Preloading_content
    * */
    $mainStyleUrl = getMainStyleLink();
    if ($mainStyleUrl !== '') {
        ?>
        <link rel="preload"
              href="<?php echo $mainStyleUrl ?>"
              as="style">
    <?php } ?>

    <?php
    // Полифил для css-переменных
    mgAddMeta('lib/css-vars-ponyfill.js'); ?>

    <?php
    /**
     * Как подключать css/js
     * @link http://wiki.moguta.ru/devhelp/templates/podklyuchenie-css-js
     * */
    ?>

    <?php
    /*
     * Теги title, mata description, keywords не использовать – они подставятся движком
     * */
    ?>

    <?php
    /**
     *   Для указания адреса вы можете использовать готовые константы:
     *   PATH_TEMPLATE — путь относительно корня сайта к папке используемого щаблона mg-templates/mytempl;
     *   PATH_SITE_TEMPLATE — http ссылка на папку используемого щаблона (http://www.testsite.ru/mg-templates/mytempl);
     *   SITE - http ссылка на главную страницу (http://www.testsite.ru);
     *   SCRIPT —  ссылка на папку /mg-core/script/
     *   SITE_DIR — путь к корневой папке сайта /var/www/html/;
     *   CORE_DIR — путь относительно корня сайта к папке ядра mg-core/;
     *   CORE_LIB — путь относительно корня сайта к папке библиотек mg-core/lib/;
     *   CORE_JS — путь относительно корня сайта к папке скриптов mg-core/script/;
     *   ADMIN_DIR — путь относительно корня сайта к папке админки mg-admin/;
     *   PLUGIN_DIR — путь относительно корня сайта к папке с плагинами mg-plugins/;
     *   PAGE_DIR — путь относительно корня сайта к папке пользовательских скриптов mg-pages/;
     *
     * @link Подробнее: http://wiki.moguta.ru/devhelp/templates/direktivy-dvijka
     */
    ?>

    <?php
    // Выводим метатеги страницы, стили шаблона и плагинов, подключенные через mgAddMeta,
    // а также jquery из mg-core/scripts
    mgMeta("meta", "css", "jquery"); ?>

</head>

<?php
/**
 * Функция MG::addBodyClass() добавляет тегу body класс body__[открытая страница]
 * Эти классы вы можете использовать, если необходимо сделать разные стили для разных страниц.
 * Параметром функции задаётся префикс к классу (namespace)
 *
 * Функция backgroundSite() добавляет тегу body атрибут style c фоном, указанным пользователем в админке
 * */
?>
<body class="<?php MG::addBodyClass('l-'); ?>" <?php backgroundSite(); ?>">



<?php
// Шапка сайта
// layout/layout_header.php
layout('header', $data);
?>

<?php
// Проверяем подключен ли плагин слайдера и выводим его шорткод
if (class_exists('Slider')) {
// Параметр id в шорткоде плагина может отличаться
// Скопируйте шорткод из слайдера, который вы хотите вставить
    ?>
    [mgslider id="1"]
<?php } ?>

<?php
// Сайдбар
// layout/layout_sidebar.php
layout('sidebar');
?>

<?php
// Главный контейнер с контентом страницы
// layout/layout_page.php
layout('page'); ?>

<?php
// Шапка сайта
// layout/layout_footer.php
layout('footer');
?>

<?php
// Подключение общего скрипта шаблона
mgAddMeta('js/script.js'); ?>

<?php
// Подключение всех js-скриптов движка, плагинов, компонентов
// а также всех скриптов, подключенных через функции addScript и mgAddMeta
mgMeta('js'); ?>
</body>

</html>
