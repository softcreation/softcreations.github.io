<?php
# microText ver 0.6
# http://microText.info

# Вывод ошибок
error_reporting(E_ALL); // Уровень вывода ошибок
ini_set('display_errors', 'on'); // Вывод ошибок включён
ini_set('log_errors', 'on'); //Вкл логирование ошибок
ini_set('error_log', dirname(__FILE__). '/error_log.txt'); //Куда писать лог

# Абсолютный путь
$path = dirname(__FILE__) . '/';

# Подключение конфигов
include_once $path . '../config.inc.php';
include_once $path . 'func.inc.php';

#Извлечение
$templates = GetTemplates();
$blocks = GetBlocksNames();

# Заголовок кодировки
header('Content-type: text/html; charset=' . $config['encoding']);

# Ограничение доступа
if (!CheckLogin($config['login'], $config['password']))
	die('Доступ запрещён.');

# Обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	# Удаление
	if (isset($_POST['delete']))
		unlink($path . '../content/' . $_POST['dir'] . $_POST['oldpage'] . '.inc.php');

	# Сохранение
	if (isset($_POST['save']))
	{
		$page_content = array();
		# Обработка данных
		$page = trim($_POST['page']);
		$dir = trim($_POST['dir']);
		$page_content['title'] = trim($_POST['title']);
		$page_content['keywords'] = (isset($_POST['keywords'])) ? trim($_POST['keywords']) : '';
		$page_content['description'] = (isset($_POST['description'])) ? trim($_POST['description']) : '';
		$page_content['content'] = trim($_POST['content']);
		$page_content['template'] = $_POST['template'];
		$page_content['page_blocks'] = '';
		if (isset($_POST['page_blocks']) && is_array($_POST['page_blocks']))
		{
			foreach($_POST['page_blocks'] as $i => $block)
			{
			if($i!=0)
				$page_content['page_blocks'] .=	', ';
			$page_content['page_blocks'] .= $block;	
			}
		}
		
		if ($_POST['oldpage'] == 'new')
		{
			# Обёртка данных шаблоном страницы
			ob_start();
			include_once $path . 'template/template_page.inc.php';
			$content = ob_get_clean();
			# Сохранение новой страницы
			SavePHP($path . "../content/$dir$page.inc.php", $content);
		}
		else
		{
			$oldpage = ($_POST['oldpage'] != $page) ? $_POST['oldpage'] : $page;
			# Сохранение существующей страницы
			SavePHP1($path, $page_content, $oldpage, $page, $dir);
			# При переименовании файла, старая страница удаляется
			if ($_POST['oldpage'] != $page)
				unlink($path . '../content/' . $dir . $_POST['oldpage'] . '.inc.php');
		}
		
		
	}
	# Перенаправление на страницу раздела
	$dir_dir = (isset($_POST['dir']) && $_POST['dir'] != '/' && $_POST['dir'] != '') ? '?dir=' . $_POST['dir'] : '';
	header('Location: ' . $config['sitelink'] . 'admin/' . $dir_dir);
	die;
}
else
{
	# Создание раздела
	if (isset($_GET['new_dir']))
	{
		if (!is_dir($path . '/../content/' . $_GET['new_dir']))
			mkdir($path . '/../content/' . $_GET['new_dir']);
		header ('Location: ' . $config['sitelink'] . 'admin/');
		die;
	}

	# Удаление раздела
	if (isset($_GET['delete_dir']))
	{
		CleanDir($path . '/../content/' . $_GET['delete_dir']);
		rmdir($path . '/../content/' . $_GET['delete_dir']);
		header ('Location: ' . $config['sitelink'] . 'admin/');
		die;
	}

	# Вывод страницы
	if (isset($_GET['page']))
	{
		$page = $_GET['page'] . '.inc.php';
		$dir = (isset($_GET['dir']) && $_GET['dir'] != '/') ? trim($_GET['dir'], '/') . '/' : '';
		$form['oldpage'] = $form['page'] = $_GET['page'];

		$form['title'] = GetContent($page, 'title', $dir);
		$form['keywords'] = GetContent($page, 'keywords', $dir);
		$form['description'] = GetContent($page, 'description', $dir);
		$form['template'] = GetContent($page, 'template', $dir);
		$form['row'] = file_get_contents($path . '../content/' . $dir . $form['oldpage'] . '.inc.php');

		$page_blocks = GetContent($page, 'page_blocks', $dir);
		if ($page_blocks!='')
		{
			$tmp_bolcks = explode(', ', $page_blocks);
			foreach($tmp_bolcks as $i=>$block)
			{
				$form['page_blocks'][$i] = $block;
			}
		}
		$dir_dir = ($dir != '') ? '?dir=' . $dir : '';
		$content = '<p><i class="icon-chevron-left"></i>  <a href="' . $config['sitelink'] . 'admin/' . $dir_dir . '">Вернуться к списку страниц</a></p>
		<h2>Редактирование страницы</h2>';

		$file = file_get_contents($path . '../content/' . $dir . $form['oldpage'] . '.inc.php');
		$form['content'] = GetContentFromEOF($file);
	}
	elseif (isset($_GET['dir']))
	{
		$dir = trim($_GET['dir'], '/') . '/';
		# Выбор всех страниц в папке content/
		$pages = GetPages($dir);
		
		# Описание страницы
		$page_content = '
		<h3>Раздел ' . $dir . ' </h3>
		<p><i class="icon-chevron-left"></i> <a href="' . $config['sitelink'] . 'admin/">Вернуться в Корневой раздел</a></p>
		<p>Здесь можно редактировать и удалять существующие страницы, а также добавлять новые.<br>
		<span class="attention">Используйте админку только для шаблонных информационных страниц.</span><br>
		Pаботать здесь со сложными PHP конструкциями и дополнительными параметрами не получится.</p>
		<h2>Список страниц</h2><ul class="unstyled well well-inverse">';

		# Вывод списка страниц с учётом исключений
		foreach ($pages as $i => $page)
		{
			$title = GetContent($page, 'title', $dir);
			$page_content .= "<li><i class='icon-chevron-right'></i>  <a href='?page=$i&dir=$dir'>$title</a></li>";
		}
		
		if (empty($pages))
			$page_content .= '<li>В этом разделе нет страниц.</li>';
		
		$content = $page_content . '
		<li>
		<br>
		<form method="get">
			<input type="hidden" name="delete_dir" value="' . $dir . '">
			<button type="submit" class="btn btn-danger" onclick="return confirm(\'Вы действительно хотите удалить раздел со всеми страницами?\')">Удалить</button>
		</form>
		</li>
		</ul><h2>Добавить новую страницу в раздел ' . $dir . '</h2>';
	}
	# Вывод списка страниц
	else
	{
		# Выбор всех страниц и разделов в папке content/
		$pages = GetPages();
		$dirs = GetDirs();

		# Описание страницы
		$dir_content = '
		<p>Здесь можно редактировать и удалять существующие страницы, а также добавлять новые.<br>
		<span class="attention">Используйте админку только для шаблонных информационных страниц.</span><br>
		Pаботать здесь со сложными PHP конструкциями и дополнительными параметрами не получится.</p>
		
		<h2>Разделы</h2>
		<p>Страницы раздела будут иметь адреса второй вложенности вроде http://site.ru/<strong>razdel</strong>/page.html.</p>
		<ul class="unstyled well well-inverse">';
		
		# Вывод разделов
		if (!empty($dirs))
		{
			foreach ($dirs as $i => $dir)
				$dir_content .= "<li><i class='icon-chevron-right'></i>  <a href='?dir=$dir/'>$dir</a></li>";
		}
		else
			$dir_content .= '<li>Разделов нет.</li>';
			
		$dir_content .= '<li><h4>Добавить новый раздел</h4></li>
		<li>
		<form mathod="get" class="form-inline">
			<input type="text" name="new_dir">
			<button type="submit" class="btn">Создать</button>
			<span class="text-info">Только латинские буквы любого регистра, цифры, минус и подчёркивание</span>
		</form>
		</li>';

		# Вывод списка страниц с учётом исключений
		$page_content = '</ul><h2>Список страниц</h2><ul class="unstyled well well-inverse">';
		
		foreach ($pages as $i => $page)
		{
			$title = GetContent($page, 'title');
			$page_content .= "<li><i class='icon-chevron-right'></i>  <a href='?page=$i'>$title</a></li>";
		}
		
		$content = $dir_content . $page_content . '</ul><h2>Добавить новую страницу в Корневой раздел</h2>';
	}
	
	# Подключение редактора
	include_once $path . 'bueditor/bueditor.php';

	# Шаблон формы
	ob_start();
	include_once $path . 'template/form.inc.php';
	$content .= ob_get_clean();

	# Параметры страницы
	$title = 'Управление страницами';

	# Вывод дизайна на экран
	ob_start();
	include_once $path . 'template/design.inc.php';
	ob_end_flush();
}