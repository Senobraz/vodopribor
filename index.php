<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("УралВодоПрибор");
?>

<div class="main-bg">
	<?  $APPLICATION->IncludeComponent(
		"bitrix:catalog.section.list",
		"slider",
		Array(
			"COMPONENT_TEMPLATE" => "objects",
			"IBLOCK_TYPE" => "ittian_content",
			"IBLOCK_ID" => "2",
			"SECTION_ID" => "",
			"SECTION_CODE" => "",
			"COUNT_ELEMENTS" => "Y",
			"TOP_DEPTH" => "2",
			"SECTION_FIELDS" => array("NAME","DESCRIPTION","PICTURE",""),
			"SECTION_USER_FIELDS" => array("","UF_DESCRIPTION",""),
			"VIEW_MODE" => "LINE",
			"SHOW_PARENT_NAME" => "Y",
			"SECTION_URL" => "",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "36000000",
			"CACHE_GROUPS" => "Y",
			"ADD_SECTIONS_CHAIN" => "Y"
		)
	);?>
	<div class="our">
		<div class="wrapper">
			<div class="big-title">
				<a href="/services/"><?= GetMessage("DEF_SERVICE_TITLE_BLOCK") ?></a>
			</div>
			<?  $APPLICATION->IncludeComponent(
				"bitrix:catalog.section.list",
				"services_main",
				Array(
					"COMPONENT_TEMPLATE" => "catalog_main",
					"IBLOCK_TYPE" => "ittian_content",
					"IBLOCK_ID" => "9",
					"SECTION_ID" => "",
					"SECTION_CODE" => "",
					"COUNT_ELEMENTS" => "Y",
					"TOP_DEPTH" => "2",
					"SECTION_FIELDS" => array("NAME","PICTURE",""),
					"SECTION_USER_FIELDS" => array(""),
					"VIEW_MODE" => "LINE",
					"SHOW_PARENT_NAME" => "Y",
					"SECTION_URL" => "",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"CACHE_GROUPS" => "Y",
					"ADD_SECTIONS_CHAIN" => "Y"
				)
			);?>
		</div>
	</div>
	<div class="products">
		<div class="wrapper">
			<div class="big-title">
				<a href="/catalog/"><?= GetMessage("DEF_CATALOG_TITLE_BLOCK") ?></a>
			</div>
			<?  $APPLICATION->IncludeComponent(
				"bitrix:catalog.section.list",
				"catalog_main",
				Array(
					"COMPONENT_TEMPLATE" => "catalog_main",
					"IBLOCK_TYPE" => "ittian_content",
					"IBLOCK_ID" => "1",
					"SECTION_ID" => "",
					"SECTION_CODE" => "",
					"COUNT_ELEMENTS" => "Y",
					"TOP_DEPTH" => "2",
					"SECTION_FIELDS" => array("NAME","PICTURE",""),
					"SECTION_USER_FIELDS" => array(""),
					"VIEW_MODE" => "LINE",
					"SHOW_PARENT_NAME" => "Y",
					"SECTION_URL" => "",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"CACHE_GROUPS" => "Y",
					"ADD_SECTIONS_CHAIN" => "Y"
				)
			);?>
			<?  $APPLICATION->IncludeComponent(
				"bitrix:catalog.section.list",
				"equipment_main",
				Array(
					"COMPONENT_TEMPLATE" => "catalog_main",
					"IBLOCK_TYPE" => "ittian_content",
					"IBLOCK_ID" => "13",
					"SECTION_ID" => "",
					"SECTION_CODE" => "",
					"COUNT_ELEMENTS" => "Y",
					"TOP_DEPTH" => "2",
					"SECTION_FIELDS" => array("NAME","PICTURE",""),
					"SECTION_USER_FIELDS" => array(""),
					"VIEW_MODE" => "LINE",
					"SHOW_PARENT_NAME" => "Y",
					"SECTION_URL" => "",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"CACHE_GROUPS" => "Y",
					"ADD_SECTIONS_CHAIN" => "Y"
				)
			);?>
		</div>
	</div>
	<div class="about">
		<div class="wrapper">
			<div class="big-title">
				<?				
					$APPLICATION->IncludeFile(SITE_DIR."/include/inc_main_text_title.php", Array(), Array(
						"MODE" => "html"	
						));
				?>
			</div>
				<?				
					$APPLICATION->IncludeFile(SITE_DIR."/include/inc_main_text_content.php", Array(), Array(
						"MODE" => "html"	
						));
				?>
		</div>
	</div>
	<div class="news">
		<div class="wrapper">
			<?$APPLICATION->IncludeComponent(
				"bitrix:news.list", 
				"news_main", 
				array(
					"IBLOCK_TYPE" => "ittian_content",
					"IBLOCK_ID" => "3",
					"NEWS_COUNT" => "3",
					"SORT_BY1" => "ACTIVE_FROM",
					"SORT_ORDER1" => "DESC",
					"SORT_BY2" => "SORT",
					"SORT_ORDER2" => "ASC",
					"FILTER_NAME" => "",
					"FIELD_CODE" => array(
						0 => "PREVIEW_PICTURE",
						1 => "",
					),
					"PROPERTY_CODE" => array(
						0 => "",				
					),
					"CHECK_DATES" => "Y",
					"DETAIL_URL" => "",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"AJAX_OPTION_HISTORY" => "N",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"PREVIEW_TRUNCATE_LEN" => "",
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"ADD_SECTIONS_CHAIN" => "N",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"PARENT_SECTION" => "",
					"PARENT_SECTION_CODE" => "",
					"INCLUDE_SUBSECTIONS" => "Y",
					"PAGER_TEMPLATE" => "main",
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"PAGER_TITLE" => "Новости",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "Y",
					"AJAX_OPTION_ADDITIONAL" => "",
					"SET_BROWSER_TITLE" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_META_DESCRIPTION" => "N",
					"DETAIL_PAGE_LIST" => "/o-kompanii/novosti/"
				),
				false
			);?>
		</div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>