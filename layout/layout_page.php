<?php
/*
 * Если установлен плагин хлебных крошек, то выводим его
 * */
if (class_exists('BreadCrumbs')): ?>
    [brcr]
<?php endif; ?>

<!-- содержимое страниц из папки /views -->
<?php layout('content'); ?>
