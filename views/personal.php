<?php
/**
 *  Файл представления Personal - выводит сгенерированную движком информацию на странице личного кабинета.
 *  В этом файле доступны следующие данные:
 *   <code>
 *     $data['error'] => Сообщение об ошибке.
 *     $data['message'] =>  Информационное сообщение.
 *     $data['status'] => Статус пользователя.
 *     $data['userInfo'] => Информация о пользователе.
 *     $data['orderInfo'] => Информация о заказе.
 *     $data['currency'] => $settings['currency'],
 *     $data['paymentList'] => $paymentList,
 *     $data['meta_title'] => Значение meta тега для страницы,
 *     $data['meta_keywords'] => Значение meta_keywords тега для страницы,
 *     $data['meta_desc'] => Значение meta_desc тега для страницы
 *   </code>
 *
 *   Получить подробную информацию о каждом элементе массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php viewData($data['userInfo']); ?>
 *   </code>
 *
 *   Вывести содержание элементов массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php echo $data['message']; ?>
 *   </code>
 *
 *   <b>Внимание!</b> Файл предназначен только для форматированного вывода данных на страницу магазина. Категорически не рекомендуется выполнять в нем запросы к БД сайта или реализовывать сложную программную логику.
 * @author Авдеев Марк <mark-avdeev@mail.ru>
 * @package moguta.cms
 * @subpackage Views
 */
// Установка значений в метатеги title, keywords, description.
mgSEO($data);
?>

<?php switch ($data['status']) {
    // Доступ пользователя к личному кабинету блокирован
    case 1: ?>

        <?php echo lang('personalBlocked'); ?>

        <?php break;
    // Пользователь не подтвердил регистрацию
    case 2: ?>

        <?php echo lang('personalNotActivated'); ?>

        <!-- Форма повторной отправки подтверждения  -->
        <form action="<?php echo SITE ?>/registration"
              method="POST">
            <input name="activateEmail"
                   placeholder="Email"
                   required>
            <input type="submit"
                   name="reActivate"
                   value="<?php echo lang('send'); ?>">
        </form>

        <?php break;
    // Страница личного кабинета
    case 3:
        $userInfo = $data['userInfo']; ?>

        <?php
        // Имя пользователя
        echo $userInfo->name ?>


        <?php
        // Если есть сообщение, выводим его
        if ($data['message']): ?>
            <?php
            // Текст сообщения задаётся в разделе «Настройки/Шаблоны/Уведомления»
            echo $data['message'] ?>
        <?php endif; ?>

        <?php
        // Если ошибка отправки, то выводим эту её
        if ($data['error']): ?>
            <?php
            // Текст сообщения задаётся в разделе «Настройки/Шаблоны/Уведомления»
            echo $data['error'] ?>
        <?php endif; ?>


        <?php
        // Вкладки личного кабинета:
        // Список заказов, смена пароля, личные данные
        component('tabs', $data, 'tabs_personal');
        ?>

        <?php break;

    // Пользователь не авторизован
    default : ?>

        <?php echo lang('personalNotAuthorised'); ?>

    <?php } ?>
