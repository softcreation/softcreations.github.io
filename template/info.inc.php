<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="<?=$config['encoding']?>" />
	<title><?=$title?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="<?=$keywords?>">
	<meta name="description" content="<?=$description?>">
	<link rel="stylesheet" href="<?=$config['sitelink']?>template/bootstrap/css/bootstrap.min.css" type="text/css" media="screen, projection">
	<link rel="stylesheet" href="<?=$config['sitelink']?>template/info.css" type="text/css" media="screen, projection">
	<link rel="stylesheet" href="<?=$config['sitelink']?>template/bootstrap/css/bootstrap-responsive.min.css" type="text/css" media="screen, projection">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0"/>
	<meta name="apple-mobile-web-app-capable" content="yes">

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!--[if lt IE 8]>
		<div style="height:80px; border: 1px solid #F7941D; background: #FEEFDA; text-align: center; clear: both; position: relative;">
			<div style="position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;">
				<a href="#" onclick="javascript:this.parentNode.parentNode.style.display='none'; return false;">
					<img src="http://www.ie6nomore.com/files/theme/ie6nomore-cornerx.jpg" style="border: none;" alt="Закрыть сообщение"/>
				</a>
			</div>
			<div style=" width: 640px; margin: 0 auto; text-align: left; padding: 0; overflow: hidden; color: black;">
				<div style="width: 75px; float: left;">
					<img src="http://www.ie6nomore.com/files/theme/ie6nomore-warning.jpg" alt="Warning!"/>
				</div>
				<div style="width: 275px; float: left; font-family: Arial, sans-serif;">
					<div style="font-size: 14px; font-weight: bold; margin-top: 12px;">Вы используете устаревший браузер</div>
					<div style="font-size: 12px; margin-top: 6px; line-height: 14px;">Для просмотра сайта в полной красе пожалуйста обновите ваш браузер</div>
				</div>
				<div style="width: 75px; float: left;"><a href="http://www.firefox.com" target="_blank">
					<img src="http://www.ie6nomore.com/files/theme/ie6nomore-firefox.jpg" style="border: none;" alt="Get Firefox 3.5"/></a>
				</div>
				<div style="width: 75px; float: left;">
					<a href="http://www.browserforthebetter.com/download.html" target="_blank"><img src="http://www.ie6nomore.com/files/theme/ie6nomore-ie8.jpg" style="border: none;" alt="Get Internet Explorer 8"/></a>
				</div>
				<div style="width: 73px; float: left;">
					<a href="http://www.apple.com/safari/download/" target="_blank"><img src="http://www.ie6nomore.com/files/theme/ie6nomore-safari.jpg" style="border: none;" alt="Get Safari 4"/></a>
				</div>
				<div style="float: left;">
					<a href="http://www.google.com/chrome" target="_blank"><img src="http://www.ie6nomore.com/files/theme/ie6nomore-chrome.jpg" style="border: none;" alt="Get Google Chrome"/></a>
				</div>
			</div>
		</div>
    <![endif]-->
	<!--[if lt IE 9]>
	<style type="text/css">
	
	.tooltip {
		background-color: transparent;
		padding:5px 4px 4px 4px;
	}
	
	.tooltip-inner {
		max-width: 200px;
		padding: 3px 8px;
		color: #ffffff;
		text-align: center;
		text-decoration: none;
		background-color: #000000;
		-webkit-border-radius: 5px 6px 8px 7px;
		-moz-border-radius: 5px 6px 8px 7px;
		border-radius: 5px 6px 8px 7px;
		behavior: url(PIE.htc);	  
	}
	/*
	.well {
		min-height: 20px;
		padding: 19px;
		margin-bottom: 20px;
		#background-color: whiteSmoke;
		border: 1px solid #E3E3E3;
		-webkit-border-radius: 5px 6px 8px 7px;
		-moz-border-radius: 5px 6px 8px 7px;
		border-radius: 5px 6px 8px 7px;
		-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
		-moz-box-shadow: inset 0 1px 1px rgba(0,0,0,0.05);
		box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
		behavior: url(PIE.htc);
	}
	
	.well-inverse {
		background-color: transparent;
	}
	*/
	.nav-pills > li > a {
		background-color: transparent;
		padding-top: 8px;
		padding-bottom: 8px;
		margin-top: 2px;
		margin-bottom: 2px;
		-webkit-border-radius: 6px 7px 9px 8px;
		-moz-border-radius: 6px 7px 9px 8px;
		border-radius: 6px 7px 9px 8px;
		behavior: url(PIE.htc);
	}
	</style>
	<![endif]-->
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
			<!--<a class="brand" href="<?=$config['sitelink']?>"><?= $config['sitename']?></a>-->
			
			<img src="<?=$config['sitelink']?>i/logo-small.png" alt="microText" class="pull-left" style="height:40px;">
			<a class="brand" href="<?=$config['sitelink']?>" title="<?=$config['sitename']?>"><span class="text-info">&nbsp;<?=$config['sitename']?></span></a>

			<div class="nav-collapse collapse">	
				<ul class="nav pull-right">
					<?=GetMenuItems($this_page, $mainmenu, $category)?>
				</ul>
			</div>
		</div>
	</nav>
</header>
<!--/header-->
<!--content-->			
	<section class="content container-fluid">
		<div class="share42init pull-right" data-url="<?= $config['sitelink'] . $page ?>.html" data-title="<?= $title ?>"></div>
		<h3 class="muted"><?=$config['slogan']?></h3>
		
		<div class="row-fluid">
			<article class="span9 well well-large well-inverse">
				<h1><?=$title;?></h1>
				<?=$content;?>
				
			</article><!--/span-->
			<aside class="span3">
				<?=$sidebar_nav?>
				<?=GetBlock($page_blocks, 'reviews', $reviews )?>
				<?=GetBlock($page_blocks, 'donate', $donate )?>
			</aside><!--/span-->
		</div><!--/row-->
	</section>
<!--/content-->		
<!--footer-->	
	<footer class="container-fluid">
		<div class="navbar centered-pills">
			<nav class="navbar-inner">
				<ul class="nav-pills" style="margin:5px 0 0 0;">
					<?=GetMenuItems($this_page, $footmenu, $category)?>
				</ul>
			</nav>
		</div>
			
		<p class="pull-right">
			Разработка студии <a href="http://sitestroy.com" title="SITESTROY.COM - Удобные решения для онлайн бизнеса" data-placement="left">sitestroy.com</a>
		</p>
		<p>
			<?=date('Y')?> © работает на <a href="http://microText.info" title="Суперлёгкий движок для сайтов microText" data-placement="right">microText</a>
		</p>
	</footer>
<!--/footer -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?= $config['sitelink']?>template/bootstrap/js/bootstrap.min.js"></script>
	
	<!--tooltips--->
	<script type="text/javascript">
	$(window).resize(function() {
		if ($(window).width() < 979) {
			$('aside a').tooltip('destroy');
			$('header ul.nav.pull-right li:last-child a').tooltip('destroy');
			$('aside a').tooltip({
				placement: "top"
			});
			$('header ul.nav.pull-right li:last-child a').tooltip({
				placement: "top"
			});
		}
		else {
			$('header ul.nav.pull-right li:last-child a').tooltip('destroy');
			$('aside a').tooltip('destroy');
			$('aside a').tooltip({
				placement: "left"
			});
			$('header ul.nav.pull-right li:last-child a').tooltip({
				placement: "bottom"
			});
		}
	});
	
	if ($(window).width() < 979) {
		$('aside a').tooltip({
			placement: "top"
		});
		$('header ul.nav.pull-right li:last-child a').tooltip({
			placement: "top"
		});
	}
	else {
		$('aside a').tooltip({
			placement: "left"
		});
	}
	$('header a').tooltip({
		placement: "bottom"
	});
	$('a,label,input').tooltip({});
	</script>
	<!--/tooltips--->

</body></html>