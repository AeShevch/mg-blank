<?php
// Компонент фильтра
// Выводим только на странице каталога и если это не поиск(поиск показывается на странице каталога,
// так что нужно отдельно проверять)
//
// Подробнее о том, как выводить контент только на определённой странице
// @link http://wiki.moguta.ru/faq/rabota-s-produktom/kak-vyvodit-kontent-tolko-na-zadannoy-stranitse
if (MG::get('controller') == "controllers_catalog" && !isSearch()) {
    component('filter');
}
?>
