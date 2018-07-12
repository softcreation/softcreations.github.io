<?php
$url= str_replace($config['sitelink'].'admin/','',strtolower (strtok($_SERVER['SERVER_PROTOCOL'],'/')).'://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title><?=$title?></title>
	<meta name="keywords" content="<?=(isset($keywords))?$keywords:''?>" />
	<meta name="description" content="<?=(isset($description))?$description:''?>" />
    <link rel="stylesheet" href="<?=$config['sitelink']?>template/bootstrap/css/bootstrap.css" type="text/css" media="screen, projection" />
	<link rel="stylesheet" href="<?=$config['sitelink']?>admin/style.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="<?=$config['sitelink']?>template/bootstrap/css/bootstrap-responsive.css" type="text/css" media="screen, projection" />
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?=$config['sitelink']?>template/bootstrap/js/bootstrap.min.js"></script>
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<link rel="icon" href="<?=$config['sitelink']?>favicon.ico" type="image/x-icon">
</head>
<body>
<!--header-->		
<header class="navbar navbar-fixed-top">
	<nav class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>

			<img src="<?=$config['sitelink']?>i/logo-small.png" alt="microText" class="pull-left" style="height:40px; #padding-top:5px;">
				<a class="brand" href="<?=$config['sitelink']?>" title="<?=$config['sitename']?>"><span class="text-info"><?=$config['sitename']?></span></a>

			<div class="nav-collapse collapse">					
				<ul class="nav">							
					<li <?=($url=='index.php')?' class="active"':''?>>
						<a href="<?=$config['sitelink'] . 'admin/'?>" title="Управление страницами"><i class='icon-file'></i>  Страницы</a></li>
					<li <?=($url=='menu.php')?' class="active"':''?>>
						<a href="<?=$config['sitelink'] . 'admin/menu.php'?>" title="Управление меню"><i class='icon-list'></i>  Меню</a>
					</li>
					<li <?=($url=='block.php')?' class="active"':''?>>
						<a href="<?=$config['sitelink'] . 'admin/block.php'?>" title="Управление блоками"><i class='icon-th-large'></i>  Блоки</a>
					</li>
					<li <?=($url=='settings.php')?' class="active"':''?>>
						<a href="<?=$config['sitelink'] . 'admin/settings.php'?>" title="Управление блоками"><i class='icon-wrench'></i>  Настройки</a>
					</li>
					<li <?=($url=='help.php')?' class="active dropdown"':' class="dropdown"'?>>
						<a title="Управление блоками" class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="<?=$config['sitelink'] . 'admin/help.php?help=install'?>"><i class='icon-info-sign'></i>  Справка</a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
							<li <?=($_SERVER['QUERY_STRING'] == 'help=install')?' class="active dropdown"':' class="dropdown"'?>>
								<a href="<?=$config['sitelink'] . 'admin/help.php?help=install'?>" title="Установка движка microText на хостинг">Установка</a>
							</li>
							<li <?=($_SERVER['QUERY_STRING'] == 'help=config')?' class="active dropdown"':' class="dropdown"'?>>
								<a href="<?=$config['sitelink'] . 'admin/help.php?help=config'?>" title="Настройки движка microText">Настройка</a>
							</li>
							<li <?=($_SERVER['QUERY_STRING'] == 'help=content')?' class="active dropdown"':' class="dropdown"'?>>
								<a href="<?=$config['sitelink'] . 'admin/help.php?help=content'?>" title="Наполнение сайта контентом">Наполнение</a>
							</li>
							<li <?=($_SERVER['QUERY_STRING'] == 'help=secret')?' class="active dropdown"':' class="dropdown"'?>>
								<a href="<?=$config['sitelink'] . 'admin/help.php?help=secret'?>" title="Секретная страница на базе microText">Ограничение доступа</a>
							</li>
						</ul>
					</li>
				</ul>
				<ul class="nav pull-right">
					<li>
						<a href="logout.php" onclick="return confirm('Вы действительно хотите выйти?')"><i class='icon-off'></i>  Выйти</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
<!--/header-->
<!--content-->
<section class="container-fluid">
	<article>
		<h1><?=$title?></h1>
		<?=$content?>
	</article>
</section>
<!--/content-->
<!--footer -->
<footer class="container-fluid">
	<p class="pull-right">
		Разработка студии <a href="http://sitestroy.com" title="Удобные решения для интернет бизнеса">sitestroy.com</a>
	</p>
	<p>
		<?=date('Y')?> @ работает на <a href="http://microText.info" title="Суперлёгкий движок для сайтов microText">microText</a>
	</p>
</footer>
<!--/footer -->

<script type="text/javascript">
$('#dLabel').append('<span class="caret"><span/>');
$('.dropdown-toggle').dropdown();
</script>
</body>
</html>