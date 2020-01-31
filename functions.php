<?php

/**
 * Файл может содержать ряд пользовательских фунций влияющих на работу движка.
 * В данном файле можно использовать собственные обработчики
 * перехватывая функции движка, аналогично работе плагинов.
 *
 * @author Авдеев Марк <mark-avdeev@mail.ru>
 * @package moguta.cms
 * @subpackage File
 */
if (!function_exists('seoMeta')) {
  function seoMeta($args)
  {
    $settings = MG::get('settings');
    $args[0]['title'] = !empty($args[0]['title']) ? $args[0]['title'] : '';
    $title = !empty($args[0]['meta_title']) ? $args[0]['meta_title'] : $args[0]['title'];
    MG::set('metaTitle', $title . ' | ' . $settings['sitename']);
  }
}

mgAddActionOnce('mg_seometa', 'seoMeta', 1);

/*
Этой функцией можно отключать ненужные css и js подключаемые плагинами и движком
mgExcludeMeta(
  array(
   '/mg-plugins/rating/css/rateit.css',
   '/mg-plugins/rating/js/rating.js',
   '/mg-core/script/standard/css/layout.agreement.css'
 )
);
*/

/**
 * Функция возвращает массив с полными ссылками на оригинал и все миниатюры изображений товара
 * <code>
 *   $res = getThumbsFromUrl('product/000/16/product-image.jpg');
 *   viewData($res);
 * </code>
 * @param string $url Ссылка на изображение товара
 * @param string $id id товара
 * @return array
 */
function getThumbsFromUrl($url, $id)
{
  $pathToProductImages = 'uploads/product/' . floor($id / 100) . '00' . '/' . $id . '/';
  $url = str_replace(DS, '/', $url);

  if (strpos($url, '/thumbs/') !== false) {
    $url = str_replace(
      [
        'thumbs/30_',
        'thumbs/70_'
      ],
      '',
      $url
    );
  }

  $tmp = explode('/', $url);
  $imgName = end($tmp);
  $noImgUrl = SITE . '/uploads/no-img.jpg';

  $orig = (is_file(SITE_DIR . $pathToProductImages . $imgName) ? SITE . '/' . $pathToProductImages . $imgName : $noImgUrl);
  $thumb30 = (is_file(SITE_DIR . $pathToProductImages . 'thumbs/30_' . $imgName) ? SITE . '/' . $pathToProductImages . 'thumbs/30_' . $imgName : $noImgUrl);
  $thumb30_2x = (is_file(SITE_DIR . $pathToProductImages . 'thumbs/2x_30_' . $imgName) ? SITE . '/' . $pathToProductImages . 'thumbs/2x_30_' . $imgName : $thumb30);
  $thumb70 = (is_file(SITE_DIR . $pathToProductImages . 'thumbs/70_' . $imgName) ? SITE . '/' . $pathToProductImages . 'thumbs/70_' . $imgName : $noImgUrl);
  $thumb70_2x = (is_file(SITE_DIR . $pathToProductImages . 'thumbs/2x_70_' . $imgName) ? SITE . '/' . $pathToProductImages . 'thumbs/2x_70_' . $imgName : $thumb70);

  $thumbsArr = [
    'orig' => $orig,
    30 => [
      'main' => $thumb30,
      '2x' => $thumb30_2x,
    ],
    70 => [
      'main' => $thumb70,
      '2x' => $thumb70_2x,
    ]
  ];

  return $thumbsArr;
}

function getMainStyleLink() {
// Если включено объединение css/js, то для minify-css.css
  if ((MG::getSetting('cacheCssJs') == true)) {
    $docRoot = URL::getDocumentRoot();
    $controller = str_replace('controllers_', '', MG::get('controller'));
    $dirCache = $docRoot . PATH_TEMPLATE . DS . 'cache' . DS . $controller . DS;
    $decodeDirCache = urldecode($dirCache);
    if (file_exists($decodeDirCache . DS . 'minify-css.css')) {
      $styleDir = $docRoot . PATH_TEMPLATE . DS . 'cache' . DS . $controller . DS . 'minify-css.css';
      return PATH_SITE_TEMPLATE . '/cache/' . $controller . '/minify-css.css?rev=' . filemtime($styleDir);
    }
  } else {
    // Если нет, то для style.css
    return PATH_SITE_TEMPLATE . '/css/style.css';
  }
}

function console_log($var) {
    $str = str_replace('&nbsp;', '', json_encode($var, true));
    echo "<script>window.str={$str};console.log(str);</script>";
}

