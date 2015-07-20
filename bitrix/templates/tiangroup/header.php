<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
<!doctype html>  
<html>
<head> 
	<title><?$APPLICATION->ShowTitle()?></title> 
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	
	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/assets/css/style.css")?>
	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/assets/css/selectizit.css")?>
	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/assets/css/jquery.bxslider.css")?>
	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/assets/css/jquery.fancybox.css")?>
	
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
	
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery-1.11.1.min.js')?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery.fancybox.js')?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/smoothscroll.js')?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery.mask.min.js')?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery.validate.js')?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery.bxslider.min.js')?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery.bxslider.min.js')?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery.dotdotdot.min.js')?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/pretty.js')?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery.fitvids.js')?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/selectize.js')?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery.mask.min.js')?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/action.js')?>
	<?$APPLICATION->ShowHead()?>
</head> 
<body>
<?$APPLICATION->ShowPanel()?>
<div class="main">	
	<header>
		<div class="top-nav">
<!--			<ul>
				<li><a href="">О компании</a>
					<ul>
						<li><a href="">История</a></li>
						<li><a href="">Объекты</a></li>
						<li><a href="">Видеогалерея</a></li>
						<li><a href="">Партнеры</a></li>
						<li><a href="">Вакансии</a></li>
						<li><a href="">Свидетельства</a></li>
					</ul>
				</li>
				<li><a href="">Производство</a></li>
				<li><a href="">Услуги</a></li>
				<li><a href="">Комплектация</a></li>
				<li><a href="">Опросные листы</a></li>
				<li><a href="">Цены</a></li>
				<li><a href="">Полезная информация</a></li>
				<li><a href="">Контакты </a></li>
			</ul>-->
			<?$APPLICATION->IncludeComponent(
				"bitrix:menu",
				"top",
				Array(
					"ROOT_MENU_TYPE" => "top",
					"MAX_LEVEL" => "3",
					"CHILD_MENU_TYPE" => "left",
					"USE_EXT" => "Y",
					"DELAY" => "N",
					"ALLOW_MULTI_SELECT" => "N",
					"MENU_CACHE_TYPE" => "A",
					"MENU_CACHE_TIME" => "3600",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"MENU_CACHE_GET_VARS" => array()
				),
				false
			);?>
		</div>
		<div class="middle-head">
			<div class="logo-wrap">
				<a href="" class="logo"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/logo.png"></a>
				<div class="logo-desc">
					<b>Энергоэффективные системы</b> <br> разработка и внедрение, <br> обслуживание и ремонт
				</div>
			</div>
			<a class="top-addr" href=""><span>Карта проезда</span></a>
			<div class="top-phone">+7 (351) 729-99-01</div>
		</div>
	</header>