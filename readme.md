#Для полноценной работы с шаболоном вам потребуются: 
 - Prettier - автоформатирование: \
   Phpstorm - https://www.jetbrains.com/help/phpstorm/prettier.html '\
   VS Code - https://github.com/prettier/prettier-vscode \

 - Stylelint: \
 Vs Code https://marketplace.visualstudio.com/items?itemName=stylelint.vscode-stylelint

htmlhint:
VS Code: https://github.com/Microsoft/vscode-htmlhint
Sublime: https://github.com/htmlhint/SublimeLinter-contrib-htmlhint
Webpack: https://github.com/htmlhint/htmlhint-loader
Gulp: https://github.com/htmlhint/gulp-htmlhint-inline

#Полезная информация 

- Для удобства чтения этой страницы установить в свой редактор/IDE плагин Markdown

- Шорткоды плагинов необходимо оборачивать проверкой, например
```
<?php if (class_exists('BackRing')): ?>
     [back-ring]
<?php endif; ?>
```

В функции `class_exists()` указывается класс плагина, 
который вы можете посмотреть на первых строках файла index.php в корневой папке плагина

- Как выводить элемент только на заданной странице?
http://wiki.moguta.ru/

- Константы движка 
http://wiki.moguta.ru/devhelp/templates/direktivy-dvijka

- Где брать данные для шаблона?
В каждом представлении (/views) доступен массив $data, 
содержаший доступные на странице данные из базы данных.

Посмотреть содержание массива можно, используя две php-функции:

`viewData($data)` - выведет содержания массива на страницу;
`console_log($data)` - выведет содержания массива в консоль;

Обе функции принимают параметром массив или его элемент.

- Функционал некоторых элементов содержится только в определённой редакции движка,
поэтому имеет смысл делать проверку на редакцию.

К таким элементам относятся:

- Сравнение (Гипермаркет, Маркет)
- Избранное (Гипермаркет) ??
- Оптовые цены (Гипермаркет)
- Кастомная форма заказа (Гипермаркет)
- Список в работе...

Проверка:
```
<?php if (in_array(EDITION, array('market', 'gipermarket'))) {
....
} ?>
```

- При разработке шаблона вы должны учитывать настройки, который пользовать может задать. \
Для того, чтобы получить значение настроки, необходимо использовать метод `MG::getSetting('')`. \
Параметром функции является строка, соответствующее значению поля `option` данной настройки в таблице `mg_setting` в базе данных.

Настройки, которые вам могут пригодиться:
- `shopPhone` - телефон магазина;
- `shopLogo` - ссылка на логотип сайта;
- `sitename` - название сайта;
- `shopName` - название компании;
- `shopAddress` - адрес;
- `currency` - текущая валюта;
- `buttonCompareName` - текст на кнопке «Сравнить»;
- `printCompareButton` - Выводить кнопку сравнения;
- `sitename` - название сайта;
- `printQuantityInMini` - показывать ввод количества товара в миникарточке;
- `printVariantsInMini` - показывать вариант в миникарточке;
- `useCaptcha` - использовать captcha;
- `timeWork` - время работы магазина;
- `printCurrencySelector` - Показывать выбор валюты;
- `catalogIndex` - Выводить каталог на главной странице;
- `mainPageIsCatalog` - Показывать на главной странице товары из групп «Новинки», «Рекомендуемые», «Распродажа»;
- `countNewProduct` - Количество товаров в блоке «Новинки» на главной странице;
- `countRecomProduct` - Количество товаров в блоке «Рекомендуемые» на главной странице;
- `countSaleProduct` - Количество товаров в блоке «Распродажа» на главной странице;
- `popupCart` - показывать всплывающую корзину после нажатия на кнопку купить;
- `showCountInCat` - показывать список вложенных категорий на страницах каталога товаров;
- `picturesCategory` - Выводить список подкатегорий;
- `actionInCatalog` - Показывать кнопку «Купить» в миникарточках товаров;
- `useFavorites` - Включить избранное;
- `picturesCategory` - Выводить список подкатегорий;

#Для полноценной работы с шаболоном вам потребуются: 
 - Prettier - автоформатирование: \
   Phpstorm - https://www.jetbrains.com/help/phpstorm/prettier.html '\
   VS Code - https://github.com/prettier/prettier-vscode \

 - Stylelint: \
 Vs Code https://marketplace.visualstudio.com/items?itemName=stylelint.vscode-stylelint

htmlhint:
VS Code: https://github.com/Microsoft/vscode-htmlhint
Sublime: https://github.com/htmlhint/SublimeLinter-contrib-htmlhint
Webpack: https://github.com/htmlhint/htmlhint-loader
Gulp: https://github.com/htmlhint/gulp-htmlhint-inline

#Полезная информация 

- Для удобства чтения этой страницы установить в свой редактор/IDE плагин Markdown

- Шорткоды плагинов необходимо оборачивать проверкой, например
```
<?php if (class_exists('BackRing')): ?>
     [back-ring]
<?php endif; ?>
```

В функции `class_exists()` указывается класс плагина, 
который вы можете посмотреть на первых строках файла index.php в корневой папке плагина

- Как выводить элемент только на заданной странице?
http://wiki.moguta.ru/

- Константы движка 
http://wiki.moguta.ru/devhelp/templates/direktivy-dvijka

- Где брать данные для шаблона?
В каждом представлении (/views) доступен массив $data, 
содержаший доступные на странице данные из базы данных.

Посмотреть содержание массива можно, используя две php-функции:

`viewData($data)` - выведет содержания массива на страницу;
`console_log($data)` - выведет содержания массива в консоль;

Обе функции принимают параметром массив или его элемент.

- Функционал некоторых элементов содержится только в определённой редакции движка,
поэтому имеет смысл делать проверку на редакцию.

К таким элементам относятся:

- Сравнение (Гипермаркет, Маркет)
- Избранное (Гипермаркет) ??
- Оптовые цены (Гипермаркет)
- Кастомная форма заказа (Гипермаркет)
- Список в работе...

Проверка:
```
<?php if (in_array(EDITION, array('market', 'gipermarket'))) {
....
} ?>
```

- При разработке шаблона вы должны учитывать настройки, который пользовать может задать. \
Для того, чтобы получить значение настроки, необходимо использовать метод `MG::getSetting('')`. \
Параметром функции является строка, соответствующее значению поля `option` данной настройки в таблице `mg_setting` в базе данных.

> __Лайфак.__ Чтобы узнать значение строки `option` не заходя в базу, вы можете в настройках посмотреть id чекбокса(инпута, селекта и тд) этой опции.

Настройки, которые вам могут пригодиться:
- `shopPhone` - телефон магазина;
- `shopLogo` - ссылка на логотип сайта;
- `sitename` - название сайта;
- `shopName` - название компании;
- `shopAddress` - адрес;
- `currency` - текущая валюта;
- `buttonCompareName` - текст на кнопке «Сравнить»;
- `printCompareButton` - Выводить кнопку сравнения;
- `sitename` - название сайта;
- `printQuantityInMini` - показывать ввод количества товара в миникарточке;
- `printVariantsInMini` - показывать вариант в миникарточке;
- `useCaptcha` - использовать captcha;
- `timeWork` - время работы магазина;
- `printCurrencySelector` - Показывать выбор валюты;
- `catalogIndex` - Выводить каталог на главной странице;
- `mainPageIsCatalog` - Показывать на главной странице товары из групп «Новинки», «Рекомендуемые», «Распродажа»;
- `countNewProduct` - Количество товаров в блоке «Новинки» на главной странице;
- `countRecomProduct` - Количество товаров в блоке «Рекомендуемые» на главной странице;
- `countSaleProduct` - Количество товаров в блоке «Распродажа» на главной странице;
- `popupCart` - показывать всплывающую корзину после нажатия на кнопку купить;
- `showCountInCat` - показывать список вложенных категорий на страницах каталога товаров;
- `picturesCategory` - Выводить список подкатегорий;
- `actionInCatalog` - Показывать кнопку «Купить» в миникарточках товаров;
- `useFavorites` - Включить избранное;
- `picturesCategory` - Выводить список подкатегорий;


## Настройки движка, которые должны поддерживаться шаблоном
### Настройки отображения сайта:
- Название сайта / Название компании `shopName`/`sitename`
- Логотип сайта `shopLogo`
- Фон сайта / Цвет фона сайта `<?php backgroundSite(); ?>` к body
- Телефон `shopPhone`
- Адрес `shopAddress`
- Время работы:
```
<?php
$workTime = explode(',', MG::getSetting('timeWork'));
$workTimeDays = explode(',', MG::getSetting('timeWorkDays'));
foreach ($workTime as $key => $time) { ?>
  <div class="c-contact__row">
    <div class="c-contact__schedule">
          <span class="c-contact__span">
              <?php echo !empty($workTimeDays[$key]) ? htmlspecialchars($workTimeDays[$key]) : ''; ?>
          </span>
      <?php echo htmlspecialchars($workTime[$key]); ?>
    </div>
  </div>
<?php } ?>
```
- Запрашивать подтверждение пользовательского соглашения `printAgreement`

### Фильтры по сайту
- Выводить фильтры в корне каталога:
`if(MG::getSetting('filterCatalogMain') != "true" && $_REQUEST['category_id'] === 0)`
Всё остальное в фильтрах, если используется стандартный компонент, должно работать, но всё равно нужно проверять.

### Опции сайта
- Показывать покупателю сообщение о добавлении товара в корзину
- Увеличивать изображение карточки товара при наведении курсора
- Включить возможность сравнивать товары 
- Выводить каталог на главной странице
- Показывать список вложенных категорий на страницах каталога товаров
- Показывать кнопку «Купить» в миникарточках товаров
- Показывать варианты товара в миникарточке
- Показывать поле для ввода количества товара в миникарточках
- Включить избранное
- Соответствие текстовой надписи и количества товара. 
Для вывода используйте:
`<?php echo !empty($data['count_hr'] ? $data['count_hr'] : $data['count'] . ' ' . $data['category_unit']); ?>`
- Показывать на главной странице товары из групп «Новинки», «Рекомендуемые», «Распродажа»

### Безопасность
- Использовать капчу
- Использовать капчу на странице заказа
- Использовать reCAPTCHA V2

Тестовыые ключи: \
Ключ `6LdG3LMUAAAAAGHzNUrD1ujyn545mxffTF5AEuAh` \
Секретный ключ `6LdG3LMUAAAAAC5haZ08mt_uYpQryhUdcWUkovJj`

```
<?php
// Подключаем captcha, если reCaptcha отключена в настройках
if (
    MG::getSetting('useCaptcha') == "true" &&
    MG::getSetting('useReCaptcha') != 'true'
): ?>
    <div class="c-form__row">
        <b><?php echo lang('captcha'); ?></b>
    </div>

    <div class="c-form__row">
        <img style="background: url('<?php echo PATH_TEMPLATE ?>/images/cap.png');"
             alt="captcha"
             src="captcha.html"
             width="140" height="36">
    </div>

    <div class="c-form__row">
        <input type="text"
               aria-label="capcha"
               name="capcha"
               class="captcha"
               required>
    </div>
<?php endif; ?>

<?php
// Подключаем ReCaptcha, если включено в настройках
echo MG::printReCaptcha(); ?>
```
