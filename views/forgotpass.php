<?php
/**
 *  Файл представления Forgotpass - выводит сгенерированную движком информацию на странице восстановления пароля.
 *  В этом файле доступны следующие данные:
 *   <code>
 *    $data['error'] => Сообщение об ошибке.
 *    $data['message'] => Информационное сообщение.
 *    $data['form'] =>  Отображение формы,
 *    $data['meta_title'] => 'Значение meta тега для страницы '
 *    $data['meta_keywords'] => 'Значение meta_keywords тега для страницы '
 *    $data['meta_desc'] => 'Значение meta_desc тега для страницы '
 *   </code>
 *
 *   Получить подробную информацию о каждом элементе массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php viewData($data['message']); ?>
 *   </code>
 *
 *   Вывести содержание элементов массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php echo $data['message']; ?>
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
// Если форма уже отправлена, то выводим сообщение об успешной отправке
if ($data['message']): ?>
    <?php
    // Текст сообщения задаётся в разделе «Настройки/Шаблоны/Уведомления»
    echo $data['message'] ?>
<?php endif; ?>

<?php
// Если ошибка отправки формы, то выводим эту ошибку
if ($data['error']): ?>
    <?php
    // Текст сообщения задаётся в разделе «Настройки/Шаблоны/Уведомления»
    echo $data['error'] ?>
<?php endif; ?>

<?php switch ($data['form']) {
    // Форма ввода email, на который будет отправлена ссылка на восстановления пароля
    case 1: ?>

        <form action="<?php echo SITE ?>/forgotpass"
              method="POST">

            <input type="text"
                   name="email"
                   placeholder="Email"
                   required>

            <input type="submit"
                   name="forgotpass"
                   value="<?php echo lang('send'); ?>">

        </form>

        <?php break;
    // Форма для указания нового пароля, которая отобразится при переходе по ссылке восстановления пароля
    case 2: ?>

        <form action="<?php echo SITE ?>/forgotpass"
              method="POST">
            <input type="password"
                   name="newPass"
                   placeholder="<?php echo lang('forgotPass1'); ?>"
                   required>
            <input type="password"
                   name="pass2"
                   placeholder="<?php echo lang('forgotPass2'); ?>"
                   required>
            <input type="submit"
                   name="chengePass"
                   value="<?php echo lang('save'); ?>">
        </form>
    <?php } ?>
