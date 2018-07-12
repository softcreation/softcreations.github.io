<?php

# HTML редактор BUEditor: http://drupal.org/project/bueditor
# Встраивается в ЛЮБУЮ страницу ЛЮБОГО сайта
# Оформление и доработка редактора: http://neverlex.com
# Скачать последнюю версию: http://microtext.info/download/bueditor.zip

# Необходимые настройки

  $site		= $config['sitelink']; # Реальный урл морды сайта
  $bueditor = 'admin/bueditor'; # Папка редактора BUEditor. Относительный адрес от корня
  $ifolder	= 'i'; # Папка для загрузки изображений. Относительный адрес от корня
  $ffolder	= 'files'; # Папка для загрузки файлов. Относительный адрес от корня
  $tmp		= 'admin/tmp'; # Папка временных файлов. Нужна для функции загрузки файлов на сервер. Относительный адрес от корня
  $isize	= '2097152'; # Максимальный размер изображения в байтах
  $fsize	= '2097152'; # Максимальный размер файла в байтах

# Далее следует изменять только функции кнопок

  $way = $site . $bueditor;
  
  $bueditor = <<<EOF
  
	<style type="text/css" media="all">@import "$way/bueditor.css";</style>
    <script type="text/javascript" src="$way/bueditor.js"></script>
    <script type="text/javascript" src="$way/library/default_buttons_functions.js"></script>
    <script type="text/javascript">
           editor.path="$way/"
           editor.buttons=[

  ['Жирный','<strong>%TEXT%</strong>','b.png','B'],
  ['Курсив','<em>%TEXT%</em>','i.png','I'],
  ['Подчёркнутый','<u>%TEXT%</u>','u.png','U'],
  ['Зачёркнутый','<span class="s">%TEXT%</span>','s.png','S'],
  ['tpl:','<img src=\"$way/icons/separator.png\" class=\"sep\">','',''],
  ['Ссылка','<a href="" title="">%TEXT%</a>', 'link.png', 'L'],
  ['Сcылка с nofollow','<a href="" title="" rel="nofollow">%TEXT%</a>','link_nofollow.png',''],
  ['Изображение','<img src="" alt="">','picture_link.png',''],
  ['Аплоад картинки','js: eDefUp("$way/up.php")','picture_up.png',''],
  ['Аплоад файла','js: eDefUp2("$way/up2.php")','attach.png',''],
  ['tpl:','<img src="$way/icons/separator.png" class="sep">','',''],
  ['Параграф','<p>%TEXT%</p>','p.png',''],
  ['Перенос строки','<br>','br.png',''],
  ['Заголовок H1','<h1>%TEXT%</h1>','h1.png',''],
  ['Заголовок H2','<h2>%TEXT%</h2>','h2.png',''],
  ['Заголовок H3','<h3>%TEXT%</h3>','h3.png',''],
  ['Нумерованный список','js: eDefSelProcessLines(\'<ol>\\\\n\',\'<li>\',\'</li>\',\'\\\\n</ol>\');','ol.png',''],
  ['Ненумерованный список','js: eDefSelProcessLines(\'<ul>\\\\n\',\'<li>\',\'</li>\',\'\\\\n</ul>\');','ul.png',''],
  ['Элемент списка','js: eDefSelProcessLines(\'\',\'<li>\',\'</li>\',\'\');','li.png',''],
  ['По левому краю','<div class="t-left">%TEXT%</div>','text_align_left.png',''],
  ['По центру','<div class="t-center">%TEXT%</div>','text_align_center.png',''],
  ['По правому краю','<div class="t-right">%TEXT%</div>','text_align_right.png',''],
  ['По ширине','<div class="t-justify">%TEXT%</div>','text_align_justify.png',''],
  ['Горизонтальная линия','<hr>','hr.png',''],
  ['tpl:','<img src="$way/icons/separator.png" class=\"sep\">','',''],
  ['Свой span','<span class="class_name">%TEXT%</span>','class.png',''],
  ['Свой div','<div class="class_name">%TEXT%</div>','class_red.png',''],
  ['Кавычки ёлочки','«%TEXT%»','noindex.png',''],
  ['tpl:','<img src="$way/icons/separator.png" class=\"sep\">','',''],
  ['Граница анонса','<!--more-->','more.png',''],
  ['Предпросмотр','js: eDefPreview();','preview.png','P'],
  ['Помощь','js: eDefHelp();','h.png','H']

              ];</script>
  
EOF;

?>