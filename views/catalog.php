<?php
/**
 *  Файл представления Catalog - выводит сгенерированную движком информацию на странице сайта с каталогом товаров.
 *  В этом  файле доступны следующие данные:
 *   <code>
 *    $data['items'] => Массив товаров,
 *    $data['titleCategory'] => Название открытой категории,
 *    $data['cat_desc'] => Описание открытой категории,
 *    $data['pager'] => html верстка  для навигации страниц,
 *    $data['searchData'] => Результат поисковой выдачи,
 *    $data['meta_title'] => Значение meta тега для страницы,
 *    $data['meta_keywords'] => Значение meta_keywords тега для страницы,
 *    $data['meta_desc'] => Значение meta_desc тега для страницы,
 *    $data['currency'] => Текущая валюта магазина,
 *    $data['actionButton'] => Тип кнопки в мини карточке товара,
 *    $data['cat_desc_seo'] => SEO описание каталога,
 *    $data['seo_alt'] => Алтернативное подпись изображение категории,
 *    $data['seo_title'] => Title изображения категории
 *   </code>
 *
 *   Получить подробную информацию о каждом элементе массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php viewData($data['items']); ?>
 *   </code>
 *
 *   Вывести содержание элементов массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php echo $data['items']; ?>
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
// Если это не поиск, то выводим обычный заголовок
if (empty($data['searchData'])): ?>
    <!--  Заголовок каталога/категории  -->
    <h1>
        <?php echo $data['titleCategory'] ?>
    </h1>

<?php
// А если поиск, то выводим заголовок с результатми поиска
else: ?>

    <h1>
        <?php echo lang('search1'); ?>
        «<?php echo $data['searchData']['keyword'] ?>»
        <?php echo lang('search2'); ?>
            <?php
            echo mgDeclensionNum(
              $data['searchData']['count'],
              array(
                lang('search3-1'),
                lang('search3-2'),
                lang('search3-3')
              )
            );
            ?>
    </h1>

<?php endif; ?>

    <?php
    /*
    * Описание категории
     * Если описание не пустое или не стостоит только из пробелов, то выводим его
    * */
    if ($cd = str_replace("&nbsp;", "", $data['cat_desc'])): ?>

        <?php
        /*
         * Изображение категории
         * Если у категории есть изображение, выводим его
         * */
        if ($data['cat_img']): ?>
            <img src="<?php echo SITE . $data['cat_img'] ?>"
                 alt="<?php echo $data['seo_alt'] ?>"
                 title="<?php echo $data['seo_title'] ?>">
        <?php endif; ?>

    <?php endif; ?>


    <?php
    /*
     * Список подкатегорий, выводим, если разрешено в настройках
     * */
    if (MG::getSetting('picturesCategory') == 'true'): ?>
        <?php
        // Список категорий каталога
        component(
          'catalog/categories',
          $data['cat_id']
        );
        ?>
    <?php endif; ?>


    <?php
    // Список свойств, которые выбраны в фильтре
    component(
      'filter/applied',
      $data['applyFilter']
    );
    ?>

    <?php
    /*
     * Циклом выводим миникарточки товаров
     * */
    foreach ($data['items'] as $item) : ?>

        <?php
        // Миникарточка товара
        component(
          'catalog/item',
          ['item' => $item]
        ); ?>

    <?php endforeach; ?>

    <?php
    /*
     * Выводится, если на странице нет товаров
     * */
    if (count($data['items']) == 0 && $_GET['filter'] == 1) { ?>

        Нет товаров

    <?php } ?>

    <?php
    /*
     * Компонент постраничной навигации, если она требуется
     * */
    if (!empty($data['pager'])) {
        component('pagination', $data['pager']);
    } ?>

     <?php if (!empty($data['cat_desc_seo'])) { ?>
         <?php
        // Выводим дополнительное описание страницы, если оно заполнено в админке
        echo $data['cat_desc_seo'] ?>
    <?php } ?>

