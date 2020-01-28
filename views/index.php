<?php
/**
 *  Файл представления Index - выводит сгенерированную движком информацию на главной странице магазина.
 *  В этом файле доступны следующие данные:
 *   <code>
 *    $data['recommendProducts'] => Массив рекомендуемых товаров
 *    $data['newProducts'] => Массив товаров новинок
 *    $data['saleProducts'] => Массив товаров распродажи
 *    $data['titleCategory'] => Название категории
 *    $data['cat_desc'] => Описание категории
 *    $data['meta_title'] => Значение meta тега для страницы
 *    $data['meta_keywords'] => Значение meta_keywords тега для страницы
 *    $data['meta_desc'] => Значение meta_desc тега для страницы
 *    $data['currency'] => Текущая валюта магазина
 *    $data['actionButton'] => тип кнопки в мини карточке товара
 *   </code>
 *
 *   Получить подробную информацию о каждом элементе массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php viewData($data['saleProducts']); ?>
 *   </code>
 *
 *   Вывести содержание элементов массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php echo $data['saleProducts']; ?>
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

<?php
// Карусель новинок
component(
  'catalog/carousel',
  [
    'items' => $data['newProducts'],
    'link' => SITE . '/group?type=latest',
    'title' => lang('indexNew')
  ]
);
?>

<?php
// Карусель рекомендованных товаров
component(
  'catalog/carousel',
  [
    'items' => $data['recommendProducts'],
    'link' => SITE . '/group?type=recommend',
    'title' => lang('indexHit')
  ]
);
?>

<?php
// Карусель товаров со скидкой
component(
  'catalog/carousel',
  [
    'items' => $data['saleProducts'],
    'link' => SITE . '/group?type=sale',
    'title' => lang('indexSale')
  ]
);
?>

<?php
// Если включен плагин брендов, то выводим его
if (class_exists('Brands')): ?>
    [mg-brand]
<?php endif; ?>

<?php
// Если заполнено описание страницы, то выводим его
if (!empty($data['cat_desc'] )): ?>
    <?php echo $data['cat_desc'] ?>
<?php endif; ?>
