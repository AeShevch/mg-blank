<?php
/**
 *  Файл представления Payment - выводит результат работы с оплатой.
 *  В этом файле доступны следующие данные:
 *   <code>
 *    $data['status'] => 'статус ответа шлюза оплаты';
 *    $data['message'] => 'тело ответа шлюза оплаты';
 *   </code>
 * 
 *   <b>Внимание!</b> Файл предназначен только для форматированного вывода данных на страницу магазина. Категорически не рекомендуется выполнять в нем запросы к БД сайта или реализовывать сложую программную логику.
 * @author Авдеев Марк <mark-avdeev@mail.ru>
 * @package moguta.cms
 * @subpackage Views
 */
    switch($data['status']){
        case 'success':
            echo '<div class="c-alert c-alert--green">'.$data['message'].'</div>';
            break;

        case 'fail':
            echo '<div class="c-alert c-alert--red">'.$data['message'].'</div>';
            break;

        case 'result':
            echo '<div class="c-alert c-alert--blue">'.$data['message'].'</div>';
    }
?>