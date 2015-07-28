<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/poleznaya-informatsiya/faq/([0-9a-zA-Z\\-]+)(\\\\?(.*))#",
		"RULE" => "SECTION_CODE=\$1&\$2",
		"ID" => "",
		"PATH" => "/poleznaya-informatsiya/faq/index.php",
	),
	array(
		"CONDITION" => "#^/o-kompanii/novosti/([0-9a-zA-Z\\-]+)(\\\\?(.*))#",
		"RULE" => "ELEMENT_ID=\$1&\$2",
		"ID" => "",
		"PATH" => "/o-kompanii/novosti/detail.php",
	),
	array(
		"CONDITION" => "#^/o-kompanii/obekty/([0-9a-zA-Z\\-]+)(\\\\?(.*))#",
		"RULE" => "SECTION_CODE=\$1&\$2",
		"ID" => "",
		"PATH" => "/o-kompanii/obekty/index.php",
	),
	array(
		"CONDITION" => "#^/services/([0-9a-zA-Z\\-]+)(\\\\?(.*))#",
		"RULE" => "SECTION_CODE=\$1&\$2",
		"ID" => "",
		"PATH" => "/services/detail.php",
	),
	array(
		"CONDITION" => "#^/bitrix/services/ymarket/#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/bitrix/services/ymarket/index.php",
	),
	array(
		"CONDITION" => "#^/catalog/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/equipment/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/equipment/index.php",
	),
);

?>