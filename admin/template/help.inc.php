<? if ($_GET['help'] == 'install')
{
$title = 'Установка microText';

# Содержание страницы
$content		= <<<EOF
<div class="well well-inverse">
<p>Установить этот движок не просто, а очень просто. Несмотря на то, что нет ни инсталлятора, ни баз данных, ни админки.</p>
<h2>Полный процесс установки</h2>
<ol>
<li>1. <a href="http://microtext.info/download.html" title="Скачайте прямо сейчас, если ещё не сделали этого">Скачать дистрибутив</a> с данного сайта и распаковать.</li>
<li>2. Закачать файлы дистрибутива на сервер в папку установки.</li>
<li>3. Прописать в <strong>config.inc.php</strong> адрес главной страницы. Со слэшем на конце.</li>
<li>4. Прописать в <strong>.htaccess</strong> путь от корня сайта до папки, в которой он лежит. По умолчанию стоит <strong>RewriteBase /</strong>, то есть, предполагается, что движок будет ложиться в корень. Если бросаете движок в папку <strong>test/</strong>, то прописать следует <strong>RewriteBase /test/</strong>.</li>
</ol>
<p>Далее следует приступить к детальной <a href="{$config['sitelink']}/admin/help.php?help=config" title="Настройка скрипта">настройке</a>.</p>
<h2>Видео</h2>
<p>Смотрим на установку в реал-тайме.</p>
<p class="t-center">
<iframe width="640" height="360" src="http://www.youtube.com/embed/B7JAdg-w3sE?rel=0" frameborder="0" allowfullscreen></iframe>
</p>
</div>
EOF;
}

elseif ($_GET['help'] == 'config')
{
# Данные о странице
$title = 'Детальная настройка microText';

# Содержание страницы
$content = '
<div class="well well-inverse">
<p>На третьем шаге установки, вы уже прописали в файле <strong>config.inc.php</strong> адрес главной страницы сайта. Поздравляю. Вы сделали уже довольно большой кусок работы.</p>

<h2>Настройка вывода меню</h2>

<p>Нужно открыть файл <strong>menu.inc.php</strong> (находится в папке <strong>template/</strong>) и прописать нужные элементы меню в виде массивов.</p>
<p>Менюшек может быть сколько угодно. Не забудьте вставить переменную в шаблон дизайна.</p>

<h2>Натягиваем шаблон на движок</h2>

<p>Весь дизайн прописан в файле <strong>design.inc.php</strong> (также находится в папке <strong>template/</strong>). Просто замените дефолтный шаблон своим и поставьте на место основные переменные (<strong>$config[\'sitelink\']</strong> и <strong>$config[\'sitename\']</strong>), меню (пример, <strong>GetMenuItems($this_page, $mainmenu)</strong>) и дополнительные блоки.</p>
<p>Оформление меню можно изменить в файле <strong>func.inc.php</strong> (находится в корне). Смотрите функцию <strong>GetMenuItems()</strong>. По умолчанию ссылка активной страницы выделяется классом <strong>selected</strong>.</p>

<h2>Вставляем дополнительные блоки</h2>

<p>Открываем файл <strong>blocks.inc.php</strong> (также в папке <strong>template/</strong>) и добавляем содержимое переменных.Не забудьте вставить переменные в дизайн.</p>
<p>Можно приступать к <a href="' . $config['sitelink'] . 'admin/help.php?help=content" title="Наполнение сайта контентом">наполнению</a>.</p>
</div>
';
}
elseif ($_GET['help'] == 'content')
{
# Данные о странице
$title			= 'Наполнение сайта контентом';

# Содержание страницы
$content		= '
<link rel="stylesheet" href="http://yandex.st/highlightjs/7.3/styles/default.min.css">
<script src="http://yandex.st/highlightjs/7.3/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>

<div class="well well-inverse">
<p>Все данные сайта лежат в папке <strong>content/</strong>.</p>

<h2>Добавление страниц</h2>

<p>Добавить новые страницы очень просто. Сделайте копию любой страницы и замените содержимое переменных. Основные переменные страницы:</p>

<pre>
<code class="php">
$title = \'Заголовок\';
$keywords = \'ключевые слова\';
$description = \'Описание страницы\';
$template = \'info\';
$page_blocks = \'reviews, donate\';
$content = \'Тут контент страницы\';
</code>
</pre>

<p>Хотя переменными <strong>$keywords</strong> и <strong>$description</strong> можно смело пожертвовать.</p>

<p>В переменной <strong>$content</strong> нужно помещать содержание страницы уже в формате HTML.</p>

<p>Имя <strong>*.inc.php</strong> файла страницы – это адрес html страницы в браузере.</p>

<h2>Особенности наполнения</h2>

<p>Можете добавлять переменные. Только не забудьте их вывести в дизайн или где-нибудь использовать.</p>

<p>Можете наполнять переменные постепенно. Например, так.</p>

<pre>
<code class="php">
$content  = \'содержимое\';
$content .= "содержимое";
</code>
</pre>

<p>Переменные, заданные на контентной странице, могут участвовать в формировании блоков или меню, а не только контента. А также всячески влиять на отображение сайта. Используйте это.</p>

<p><strong>Внимание!</strong> Не забывайте экранировать одинарные кавычки (\') с помощью слэшей (\). Если таковых много, можете брать содержимое в двойные кавычки. Или наполнять переменные частями (в двойных и одинарных кавычках). Пример можете наблюдать чуть выше.</p>

<h2>Вывод переменных в контенте</h2>

<p>Если выводите в одинарных кавычках:</p>

<pre>
<code class="php">
$content = \'содержимое \' . $title . \' содержимое\';
</code>
</pre>

<p>Если в двойных:</p>

<pre>
<code class="php">
$content = "содержимое $title содержимое";
</code>
</pre>
</div>
';
}
elseif ($_GET['help'] == 'secret')
{
# Данные о странице
$title = 'Секретная страница на движке microText';

# Содержание страницы
$content = '

<link rel="stylesheet" href="http://yandex.st/highlightjs/7.3/styles/default.min.css">
<script src="http://yandex.st/highlightjs/7.3/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>

<div class="well well-inverse">
<p>Страница с ограниченным доступом на базе движка microText. Авторизация реализована на основе самого простого и надёжного метода – HTTP авторизации.</p>
<p>Проверка доступа происходит на сервере. Эта функция должна быть включена.</p>

<h2>Настройка доступа</h2>

<p>Если хотите задать логин и пароль из конфига, то добавьте в <strong>config.inc.php</strong>:</p>

<pre>
<code class="php">
# Настройки доступа
$config[\'access_login\'] = \'demo\';
$config[\'access_password\'] = \'demo\';
</code>
</pre>

<p>В самое начало страницы (например, <strong>content/secret.inc.php</strong>) сразу после <strong>&lt;?php</strong> нужно добавить код:</p>

<pre>
<code class="php">
# Ограничение доступа
if (!CheckLogin($config[\'access_login\'], $config[\'access_password\']))
	die(\'Доступ запрещён.\');
</code>
</pre>

<p>Если хотите задать отдельный логин/пароль для страницы, пропишите их в параметрах функции.</p>

<h2>Пример закрытой страницы</h2>

<p>Зайдите <a href="' . $config['sitelink'] . 'secret/auth.html" title="Не забудьте ввести пароль :)">сюда</a>. Для доступа введите логин/пароль: demo/demo.</p>
</div>
';
}