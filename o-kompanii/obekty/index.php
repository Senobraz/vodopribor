<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Îáúåêòû");
?><?$isSections = $APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"objects",
	Array(
		"COMPONENT_TEMPLATE" => "objects",
		"IBLOCK_TYPE" => "ittian_content",
		"IBLOCK_ID" => "7",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => $_REQUEST["SECTION_CODE"],
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
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>