<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);

$isMainPage = $APPLICATION->GetCurPage() === SITE_DIR;

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
	
	<link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH ?>/favicon.ico" type="image/x-icon">
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
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery.form.js')?>
	
	<?  
	if(LANG_CHARSET == 'windows-1251') :
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/action-v2.js');
	else:
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/action.js');
	endif 
	?>	
	
	<?$APPLICATION->ShowHead()?>
</head> 
<body>
<?$APPLICATION->ShowPanel()?>
<div class="main">	
	<header class="<?= $isMainPage ? "" : "inner" ?>">
		<div class="top-nav">
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
				<a href="/" class="logo">
					<?				
					$APPLICATION->IncludeFile(SITE_DIR."inc_logo.php", Array(), Array(
						"MODE" => "html",                             
						"NAME" => GetMessage("DEF_LOGO"),					
						));
					?>
				</a>
				<div class="logo-desc">		
					
					<?				
					$APPLICATION->IncludeFile(SITE_DIR."inc_slogan.php", Array(), Array(
						"MODE" => "html",                             
						"NAME" => GetMessage("DEF_SLOGAN"),					
						));
					?>				
				</div>
			</div>
			<a class="top-addr" href="/contacts/"><span><?=  GetMessage("DEF_MAP_LINK") ?></span></a>
			<div class="top-phone">
				<?				
					$APPLICATION->IncludeFile(SITE_DIR."inc_phone.php", Array(), Array(
						"MODE" => "html",                             
						"NAME" => GetMessage("DEF_PHONE"),					
						));
				?>	
			</div>
		</div>
	</header>
	<? if ( !$isMainPage ) : ?>
	<div class="content">
		<div class="wrapper">
			<ul class="breadcrumps">
			<?$APPLICATION->IncludeComponent(
				"bitrix:breadcrumb",
				"main",
				Array(
					"START_FROM" => "0",
					"PATH" => "",
					"SITE_ID" => "-"
				),
				false
			);?>
			</ul>			
			<h1><?$APPLICATION->ShowTitle(false)?></h1>
			<div class="cont-wrap">
				<div class="cont-left">					
					<?$APPLICATION->IncludeComponent(
						"bitrix:menu",
						"left",
						Array(
							"ROOT_MENU_TYPE" => "left",
							"MAX_LEVEL" => "3",
							"CHILD_MENU_TYPE" => "inleft",
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
					<div class="right-info">
						<?				
							$APPLICATION->IncludeFile(SITE_DIR."/include/inc_info_left_column.php", Array(), Array(
								"MODE" => "html"	
								));
						?>
					</div>
				</div>
				<div class="cont-right">			
	<? endif; ?>
